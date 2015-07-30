import ModuleSection from "modules/module-section";
import animate from 'modules/animate';
import $ from 'jquery';
import client from 'sources/ModuleClient';

export default class CongratsSection extends ModuleSection {
    open() {
        return super.open().then(() => {
            return animate.to(this.section.find('.inner'), 0.7, {autoAlpha: 1});
        })
    }

    setup() {
        super.setup();
        $('body').css('min-height', 0);
    }


    setupEventListeners() {
        this.section.on('click','[data-complete-module]', this.completeModule.bind(this))
    }

    completeModule() {
        if(this.submitting) {
            return false;
        }
        this.submitting = true;

        var url = this.module.getCompleteUrl();
        client.completeModule(url).then(this.showNext);
    }

    showNext() {

    }
}