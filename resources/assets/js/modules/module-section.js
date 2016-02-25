import $ from 'jquery';
import TweenMax from "gsap/src/uncompressed/TweenMax";
import TimelineLite from "gsap/src/uncompressed/TimelineLite";
import config from 'config';
import animate from 'modules/animate';
import Q from "q";
import "modules/arctext";
import Accordion from './accordion';



class ModuleSection {
    submitting = false;
    constructor(section, module) {
        this.section = $(section);
        this.module = module;
        this.step = this.section.data('submit-step');
        this.setupEventListeners();
        this.accordian = new Accordion(this.section.find('.accordion'), this);
    }

    open() {

        this.setup();
        var deferred = Q.defer();
        var t = new TimelineLite({onComplete: () => {
            deferred.resolve()
        }});
        t.to(this.section, 0, {display: 'block', opacity: 0, onComplete:() => {
            this.section.find('[data-arc]').each(function() {
                var arc = parseInt($(this).data('arc'));
                $(this).arctext({radius: arc});
            })
        }});
        t.to(this.section, config.defaultAnimationSpeed, {autoAlpha: 1});
        t.fromTo(this.section.find('.inner'), config.defaultAnimationSpeed, {y: -40}, {autoAlpha: 1, y: 0}, '-=0.4');
        return deferred.promise;

    }

    close() {

        var deferred = Q.defer();
        var t = new TimelineLite({onComplete: () => {
            this.teardown();
            deferred.resolve();
        }});
        t.to(this.section, config.defaultAnimationSpeed, {autoAlpha: 0});
        t.to(this.section, 0, {display: 'none'});

        return deferred.promise;

    }

    setup() {
        window.scrollTo(0,0);
    }

    teardown() {

    }

    setupEventListeners() {
        this.section.on('click', '[data-next-section]', (e) => {
            if(this.submitting) {
                return;
            }
            this.submitting = true;
           this.module.nextSection().then(e => {
               this.submitting = false;
           });
        });

    }
}

module.exports = ModuleSection;

