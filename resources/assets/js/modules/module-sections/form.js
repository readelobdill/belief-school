import ModuleSection from 'modules/module-section';
import $ from 'jquery';
import Text from './text';
import serialize from 'util/serializeForm';
import client from 'sources/ModuleClient';

export default class Form extends Text {

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
        let data = serialize(this.section.find('form'));
        client.saveModule(url, data).then(() => {
            this.module.nextSection();
        })
    }
}


