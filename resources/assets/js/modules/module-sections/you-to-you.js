import ModuleSection from 'modules/module-section';
import $ from 'jquery';
import Text from './text';
import serialize from 'util/serializeForm';
import client from 'sources/ModuleClient';

export default class YouToYou extends Text {
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
    }

    submit() {
        let url = this.module.getUpdateUrl();
        let videoInput = this.section.find('.upload-video [name=video]')[0];
        if(videoInput.files.length > 0) {
            client.saveVideo(url, videoInput.files[0]);
        } else {
           let data = serialize(this.section.find('form.letter'));
           client.saveModule(url, data).then(() => {
               this.module.nextSection();
           });
        }
    }
}

