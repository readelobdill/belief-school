import ModuleSection from 'modules/module-section';
import $ from 'jquery';
import Text from './text';
import serialize from 'util/serializeForm';
import client from 'sources/ModuleClient';
import {showRawError, hideRawError} from 'util/errors';

export default class YouToYou extends Text {
    letterChosen = false;
    setupEventListeners() {
        super.setupEventListeners();
        this.section.on('submit', 'form', (e) => {
            e.preventDefault();
            this.submit()
        });
        this.section.on('click', '[data-save-module]', (e) => {
            e.preventDefault();
            this.submit();
        });
        this.section.on('change', '.upload-video [name=video]', e => {
            if(e.currentTarget.files.length > 0) {
                $(e.currentTarget).closest('.video').addClass('has-video');
            } else {
                $(e.currentTarget).closest('.video').removeClass('has-video');
            }
        });

        this.section.on('click', '.letter-trigger', e => {
            this.section.find('.either-or').toggleClass('letter-chosen');
            this.letterChosen = !this.letterChosen;
        })
    }

    submit() {
        let errors = this.validate();
        if(errors === true) {
            this.section.find('.error-container').hide().html('');;
            let url = this.module.getUpdateUrl();
            let videoInput = this.section.find('.upload-video [name=video]')[0];
            if(videoInput.files.length > 0) {
                client.saveVideo(url, videoInput.files[0]).then(e => {
                    this.module.nextSection();
                }, error => {

                }, progress => {
                    this.setProgress(progress);
                });
            } else {
                let data = serialize(this.section.find('form.letter'));
                client.saveModule(url, data).then(() => {
                    this.module.nextSection();
                });
            }
        } else {
            this.section.find('.error-container').show().html(errors);
        }

    }

    setProgress(progress) {
        this.section.find('.actions .percentage').html(Math.floor(progress) + '%');
    }

    validate() {
        if(this.letterChosen) {
            let letter = this.section.find('textarea[name=letter]');
            if(letter.val() == '') {
                return 'Your letter must not be empty';
            }
        } else {
            let video = this.section.find('.upload-video [name=video]');
            if(video[0].files.length === 0) {
                return 'You must select a video to upload';
            }
        }

        return true;
    }
}

