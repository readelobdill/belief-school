import Video from "modules/video";
import createSection from 'modules/module-section-factory';
import $ from 'jquery';

let $body = $('body');

class Module {
    constructor(container) {
        this.container = $(container);
        this.sections = this.container.find('section').map((index, section) => {
            return createSection(section, this);
        }).get();

        var currentStep = this.container.data('step');
        var currentPart = this.container.data('part');
        var newIndex = this.container.find('[data-step="'+currentStep+'"]').index();
        if(newIndex > 0) {
            this.sections[0].jump();
        }
        this.goToSection(newIndex);



        this.setupEventListeners();
    }

    nextSection() {
        this.goToSection(this.currentSection + 1);
    }
    previousSection() {
        this.goToSection(this.currentSection - 1);
    }
    goToSection(section) {
        $body.attr('data-current-section', section);
        if(this.currentSection !== section && this.sections[section]) {
            if(this.sections[this.currentSection]) {
               return this.sections[this.currentSection].close().then(() => {
                    this.currentSection = section;
                    return this.sections[this.currentSection].open();
                });
            } else {
                this.currentSection = section;
                return this.sections[this.currentSection].open();
            }
        }

    }

    setupEventListeners() {

    }

    getUpdateUrl() {
        return this.container.data('update-url');
    }

    getCompleteUrl() {
        return this.container.data('complete-url');
    }

}


module.exports = Module;

