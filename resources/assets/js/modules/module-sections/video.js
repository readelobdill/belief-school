import $ from 'jquery';
import TweenMax from "gsap/src/uncompressed/TweenMax";
import TimelineLite from "gsap/src/uncompressed/TimelineLite";
import config from 'config';
import animate from 'modules/animate';
import Q from "q";
import ModuleSection from "modules/module-section";
import Froogaloop from 'util/froogaloop';


class VideoSection extends ModuleSection {


    constructor(section, module) {
        super(section, module);
        this.video = Froogaloop(this.section.find('iframe')[0]);
    }

    setup() {
        super.setup();
        $('body').css({minHeight: ''});
        this.video.api('play');
    }

    open() {
        this.setup();
        var deferred = Q.defer();
        var t = new TimelineLite({onComplete: () => {
            deferred.resolve()
        }});
        t.to(this.section.find('.inner'), 0, {display: 'block', opacity: 0});
        t.to(this.section, config.defaultAnimationSpeed, {autoAlpha: 1});


        t.fromTo(this.section.find('.inner'), config.defaultAnimationSpeed, {y: "-55%", opacity: 0}, {opacity: 1, y: "-50%"}, '-=0.4');
        t.fromTo(this.section.find('.next-section'), config.defaultAnimationSpeed, {scaleX: 0.9, scaleY: 0.9}, {scaleX: 1, scaleY: 1, autoAlpha: 1});

        return deferred.promise;
    }

    close() {
        return new Promise((yes, no) => {
            TweenMax.to(this.section, config.defaultAnimationSpeed, {autoAlpha: 0, onComplete: () => {
                TweenMax.to(this.section.find(  '.inner'), 0, {'display': 'none'});
                this.teardown();
                yes();
            }});
        })
    }
    teardown() {
        this.video.api('pause');
    }

}

module.exports = VideoSection;