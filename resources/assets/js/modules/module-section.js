import $ from 'jquery';
import TweenMax from "gsap/src/uncompressed/TweenMax";
import TimelineLite from "gsap/src/uncompressed/TimelineLite";
import config from 'config';
import animate from 'modules/animate';
import Q from "q";
import "modules/arctext";



class ModuleSection {
    constructor(section, module) {
        this.section = $(section);
        this.module = module;
        this.setupEventListeners();
    }

    open() {

        this.setup();
        return new Promise((yes, no) => {
            TweenMax.to(this.section, config.defaultAnimationSpeed, {autoAlpha: 1, onComplete: () => {

                yes();
            }});
        })

    }

    close() {
        return new Promise((yes, no) => {
            TweenMax.to(this.section, config.defaultAnimationSpeed, {autoAlpha: 0, onComplete: () => {
                this.teardown();
                yes();
            }});
        })
    }

    setup() {
        window.scrollTo(0,0);
        this.section.find('[data-arc]').each(function() {
            var arc = parseInt($(this).data('arc'));
            $(this).arctext({radius: arc});
        })
    }

    teardown() {

    }

    setupEventListeners() {
        this.section.on('click', '[data-next-section]', (e) => {
           this.module.nextSection();
        });
    }
}

module.exports = ModuleSection;

