import ModuleSection from 'modules/module-section';
import $ from 'jquery';
import Text from './text';
import serialize from 'util/serializeForm';
import client from 'sources/ModuleClient';
import {showRawError, hideRawError} from 'util/errors';
import MediaUploader from 'util/vimeo-uploader';
import {showGlobalError} from 'ui/globalError';

const maxFileSize = 1024*1024*1024;

export default class YouToYou extends Text {
    letterChosen = false;
    submitted = false;
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
            let $parent = $(e.currentTarget).closest('.video')
            if(e.currentTarget.files.length > 0) {
                $parent.addClass('has-video');
                $parent.find('.upload-status').html('Selected: ' + e.currentTarget.files[0].name);
            } else {
                $parent.removeClass('has-video');
                $parent.find('.upload-status').html('Upload your video');
            }
        });


    }

    submit() {

        let validity = this.validate();
        if(validity === true) {
            if(this.submitted) {
                return;
            }
            this.submitted = true;
            this.section.find('.error-container').hide().html('');
            let url = this.module.getUpdateUrl();
            let $videoInput = this.section.find('.upload-video [name=video]');
            let videoInput = $videoInput[0];
            let $letterInput = this.section.find('form.letter [name=letter]');

            if(videoInput.files.length > 0) {
                if(videoInput.files[0].size > maxFileSize) {
                    showGlobalError('Please choose an video with a filesize less then 1GB');
                    return false;
                }
                this.section.find('.actions .button .button-title').html('Starting Upload');
                client.getVimeoUploadData($videoInput.data('vimeo-upload-url')).then(response => {
                    this.section.find('.actions .button .button-title').html('Uploading');
                    let uploader = new MediaUploader({
                        file: videoInput.files[0],
                        url: response.upload_link_secure,
                        ticket_id: response.ticket_id,
                        complete_url: response.complete_uri,
                        onComplete: complete_uri => {
                            let data = {complete_uri};
                            if($letterInput.val() !== '') {
                                data['letter'] = $letterInput.val();
                            }
                            client.saveModule(url, data).then(response => {
                                var url = this.module.getCompleteUrl();
                                return client.completeModule(url).then(() => {
                                    this.section.find('.actions .button').html('Done!');
                                    this.module.nextSection();
                                });
                            })
                        },
                        onProgress: oEvent => {
                            if (oEvent.lengthComputable) {
                                let percentComplete = oEvent.loaded / oEvent.total;
                                this.setProgress(percentComplete);
                            }
                        }
                    });
                    uploader.upload();
                })
            } else {
                let data = serialize(this.section.find('form.letter'));
                client.saveModule(url, data, this.step).then(() => {
                    var url = this.module.getCompleteUrl();
                    return client.completeModule(url).then(() => this.module.nextSection());
                });
            }
        } else {
            this.section.find('.error-container').show().html(validity);
        }

    }

    setProgress(progress) {
        this.section.find('.actions .percentage').html(Math.floor(progress * 100) + '%');
        if(progress == 1) {
            this.section.find('.actions .button').html('Processing Video');
        }
    }

    validate() {
        let video = this.section.find('.upload-video [name=video]');
        let letter = this.section.find('textarea[name=letter]');

        if(letter.val() == '' && video[0].files.length === 0) {
            return 'You must record a video and/or write a letter';
        }


        return true;
    }
}

