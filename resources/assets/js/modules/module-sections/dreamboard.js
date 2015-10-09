import ModuleSection from 'modules/module-section';
import $ from 'jquery';
import Text from './text';
import client from 'sources/ModuleClient';
import TweenMax from "gsap/src/uncompressed/TweenMax";
import TimelineLite from "gsap/src/uncompressed/TimelineLite";
import {ImageCrop} from 'util/cropper';
import 'remodal';

export default class Dreamboard extends Text {



    setupEventListeners() {
        super.setupEventListeners();
        this.section.on('change', '.image input', (e) => {
            if(e.currentTarget.files.length > 0) {
                //this.submitImage(e.currentTarget.files[0], $(e.currentTarget).attr('name'));
                this.showCropper(e.currentTarget.files[0],$(e.currentTarget).attr('name'), e.currentTarget);

            }
        });

        this.section.on('click', '[data-save-module]', (e) => {
            e.preventDefault();
            this.submit();
        });
    }

    submitImage(image, imageName, dimensions) {
        let url = this.module.getUpdateUrl();
        let $image = this.section.find('.'+imageName);
        let $loader = $image.find('.loader');
        $image.addClass('is-loading')
        client.addImage(url, image, imageName, dimensions).then((response) => {
            $image.removeClass('is-loading').addClass('has-image').find('img').attr('src', response.imageUrl);
            this.toggleSubmit();
        }, false, (progress) => {
            $loader.html(Math.floor(progress*100)+'%');
        });
    }

    submit() {
        let url = this.module.getUpdateUrl();
        let data = {};
        if(this.section.find('.has-image').length == 13) {
            if(this.submitting) {
                return false;
            }
            this.submitting = true;
            client.saveModule(url, data).then(() => {
                this.module.nextSection();
            });
        }
    }

    toggleSubmit() {
        if(this.section.find('.has-image').length == 13) {
            this.section.find('[data-save-module]').removeClass('is-disabled')
        } else {
            this.section.find('[data-save-module]').addClass('is-disabled')
        }
    }

    showComplete() {
        const timeline = new TimelineLite();
        timeline.to(this.section.find('.overlay'), 0.3, {autoAlpha: 1}, 0);
        timeline.to(this.section.find('.modal'), 0.3, {autoAlpha: 1}, 0);
        timeline.to(this.section.find('.social'), 0.3, {autoAlpha: 1}, 0);

    }

    showCropper(file, name, input) {
        let url = URL.createObjectURL(file);
        let $modal = $('<div></div>')
            .addClass('remodal')
            .addClass('cropper-modal');
        let cropper;
        let $close = $('<button></button>').addClass('remodal-close');
        let $done = $('<button>Done</button>').addClass('done-button');
        $modal.append($close);
        $modal.append($done);

        $('body').append($modal);


        let api = $modal.remodal();


        let image = new Image();
        $(image).one('load', e => {
            $modal.one('opened', e => {
                cropper = new ImageCrop(image, $modal);
            });
        });

        api.open();

        image.src = url;


        $modal.on('closed', e => {
            cropper.destroy();
            api.destroy();
            $(input).replaceWith($(input).clone());
        });

        $close.on('click', e => {
            api.close();
        });
        $done.on('click', e => {
            let data = cropper.getData();
            api.close();
            this.submitImage(file, name, data);
        })


    }
}

