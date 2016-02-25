import ModuleSection from 'modules/module-section';
import $ from 'jquery';
import Text from './text';
import client from 'sources/ModuleClient';

export default class Boomerang extends Text {
    setupEventListeners() {
        super.setupEventListeners();
        this.section.on('click', '[data-update-module]', this.updateModule.bind(this));
    }

    updateModule(e) {

        if(this.submitting) {
            return false;
        }
        this.submitting = true;

        let url = this.module.getUpdateUrl();
        let data = {'email': true}
        return client.saveModule(url, data, this.step).then(() => {
            this.module.nextSection();
            this.submitting = false;
        });
    }

    submit() {
        this.updateModule();
    }
}

