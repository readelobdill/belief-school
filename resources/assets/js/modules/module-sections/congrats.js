import ModuleSection from "modules/module-section";
import animate from 'modules/animate';
import $ from 'jquery';

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
}