import ModuleSection from 'modules/module-section';
import $ from 'jquery';
import Text from './text';
import client from 'sources/ModuleClient';

export default class Dreamboard extends Text {



    setupEventListeners() {
        super.setupEventListeners();

        this.section.on('change', '.image input', (e) => {
            if(e.currentTarget.files.length > 0) {
                this.submitImage(e.currentTarget.files[0], $(e.currentTarget).attr('name'));
            }
        });

        this.section.on('click', '[data-save-module]', (e) => {
            e.preventDefault();
            this.submit();
        })
    }

    submitImage(image, imageName) {
        let url = this.module.getUpdateUrl();
        client.addImage(url, image, imageName).then((response) => {
            this.section.find('.'+imageName).addClass('has-image').find('img').attr('src', response.imageUrl);
        });
    }

    submit() {
        let url = this.module.getUpdateUrl();
        let data = {};
        client.saveModule(url, data).then(() => {
            this.module.nextSection();
        });
    }
}

