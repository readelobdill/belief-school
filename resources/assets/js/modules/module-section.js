import $ from 'jquery';
import TweenMax from "gsap/src/uncompressed/TweenMax";
import TimelineLite from "gsap/src/uncompressed/TimelineLite";
import config from 'config';
import animate from 'modules/animate';
import Q from "q";
import "modules/arctext";
import Accordion from './accordion';



class ModuleSection {
    constructor(section, module) {
        this.section = $(section);
        this.module = module;
        this.setupEventListeners();
        this.accordian = new Accordion(this.section.find('.accordion'), this);
    }

    open() {

        this.setup();
        var deferred = Q.defer();
        var t = new TimelineLite({onComplete: () => {
            deferred.resolve()
        }});
        t.to(this.section, config.defaultAnimationSpeed, {autoAlpha: 1});
        t.fromTo(this.section.find('.inner'), config.defaultAnimationSpeed, {y: -40}, {autoAlpha: 1, y: 0}, '-=0.4');
        return deferred.promise;

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

