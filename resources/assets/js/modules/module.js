import Video from "modules/video";
import createSection from 'modules/module-section';
import $ from 'jquery';

class Module {
    constructor(container) {
        this.container = $(container);
        this.sections = this.container.find('section').map(function(index, section) {
            return createSection(section);
        }).get();

        var currentPart = this.container.data('part');
        var newIndex = this.container.find('[data-part="'+currentPart+'"]').index()
        this.goToSection(0).then(() => {
            return this.goToSection(newIndex);
        })
        this.setupEventListeners();
    }

    nextSection() {
        this.goToSection(this.currentSection + 1);
    }
    previousSection() {
        this.goToSection(this.currentSection - 1);
    }
    goToSection(section) {
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
        this.container.on('click', '.next-section', this.nextSection.bind(this));
    }

}


module.exports = Module;