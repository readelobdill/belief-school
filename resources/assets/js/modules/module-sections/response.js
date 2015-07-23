import ModuleSection from 'modules/module-section';
import $ from 'jquery';
import Text from './text';
import serialize from 'util/serializeForm';
import client from 'sources/ModuleClient';

export default class Affirmations extends Text {
    setupEventListeners() {
        super.setupEventListeners();
        this.section.on('submit', 'form', (e) => {
            e.preventDefault();
            this.submit();
        });
    }

    submit() {
        let data = serialize(this.section.find('form'));
        let url = this.module.getUpdateUrl();
        client.saveModule(url, data).then(() => {
            this.module.nextSection();
        });

    }
}

