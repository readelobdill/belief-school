import $ from 'jquery';
import client from 'sources/ModuleClient';
import Text from 'modules/module-sections/text';

export default class CongratsSection extends Text {


    setupEventListeners() {
        super.setupEventListeners();
        this.section.on('click','[data-complete-module]', this.completeModule.bind(this))
    }

    completeModule() {
        var url = this.module.getCompleteUrl();
        client.completeModule(url);
    }
}