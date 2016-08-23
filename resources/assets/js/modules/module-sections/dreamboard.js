import ModuleSection from 'modules/module-section';
import $ from 'jquery';
import Text from './text';
import client from 'sources/ModuleClient';
import TweenMax from "gsap/src/uncompressed/TweenMax";
import TimelineLite from "gsap/src/uncompressed/TimelineLite";
import {ImageCrop} from 'util/cropper';
import 'remodal';
import Q from 'q';
import 'blueimp-load-image/js/load-image.all.min.js';
import {showGlobalError} from 'ui/globalError';

const allowedMimes = ['image/jpeg', 'image/png'];
const maxFileSize = 1024*1024*15;
const backgrounds = ['black', 'birds', 'blue-rocks', 'wings'];
export default class Dreamboard extends Text {
    constructor(section, module){
        super(section, module);
        this.innerSection = this.section.find('.content');
        while(!this.innerSection.hasClass(backgrounds[0])){
            backgrounds.push(backgrounds.shift());
        }
    }



    setupEventListeners() {
        super.setupEventListeners();
        this.section.on('change', '.image input', (e) => {
            if(e.currentTarget.files.length > 0) {
                //this.submitImage(e.currentTarget.files[0], $(e.currentTarget).attr('name'));
                this.showCropper(e.currentTarget.files[0],$(e.currentTarget).attr('name'), e.currentTarget);

            }
        });


        // let $board = this.section.find('.board');
        // this.section.on('click', '.image-outline-selector input', (e) => {
        //     $board.removeClass('hexagon rectangle circle');
        //     $board.addClass($(e.currentTarget).val());
        // });

        this.section.on('click', '.background-image-selector button', (e) => {
            this.innerSection.removeClass(backgrounds.join(' '));
            var $button = $(e.currentTarget);
            if ($button.hasClass('next')){
                backgrounds.push(backgrounds.shift());
            } else if ($button.hasClass('previous')){
                backgrounds.unshift(backgrounds.pop());
            }
            this.innerSection.addClass(backgrounds[0]);
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
        let data = {
            background: backgrounds[0]
        };
        if(this.section.find('.has-image').length == 13) {
            if(this.submitting) {
                return false;
            }
            this.submitting = true;
            client.saveModule(url, data, this.step).then(() => {
                this.module.nextSection();
                this.submitting = false;
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

        if(allowedMimes.indexOf(file.type) === -1) {
            $(input).replaceWith($(input).clone());
            showGlobalError("Please choose an image that has an extension of .jpg, .jpeg or .png");
            return;
        }
        if(file.size > maxFileSize) {
            $(input).replaceWith($(input).clone());
            showGlobalError('Please choose an image with a filesize less then 15M');
            return;
        }


        let url = URL.createObjectURL(file);
        let $modal = $('<div></div>')
            .addClass('remodal')
            .addClass('cropper-modal');
        let cropper;
        let $close = $('<button></button>').addClass('remodal-close');
        let $done = $('<button>Done</button>').addClass('done-button');
        let $spinner = $('<div></div>').addClass('spinner');
        $modal.append($close);
        $modal.append($done);
        $modal.append($spinner);

        $('body').append($modal);
        $modal.addClass('is-loading');


        let api = $modal.remodal();


        let image;
        let imageLoaded = Q.defer();
        let modalOpened = Q.defer();
        let options = {canvas: true}

        loadImage.parseMetaData(file, function (data) {
            if (data.exif) {
                options.orientation = data.exif.get('Orientation');
            }
            loadImage(file, function(img) {
                image = img;
                imageLoaded.resolve(img);
            }, options)
        });



        $modal.one('opened', e => {
            modalOpened.resolve($modal);
        });

        Q.all([imageLoaded.promise, modalOpened.promise]).then(() => {
            cropper = new ImageCrop(image, $modal);
            //$modal.append(image);
            $modal.removeClass('is-loading');
        })

        api.open();



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



