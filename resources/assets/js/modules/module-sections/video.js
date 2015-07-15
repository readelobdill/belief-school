import $ from 'jquery';
import TweenMax from "gsap/src/uncompressed/TweenMax";
import TimelineLite from "gsap/src/uncompressed/TimelineLite";
import config from 'config';
import animate from 'modules/animate';
import Q from "q";
import ModuleSection from "modules/module-section";


class VideoSection extends ModuleSection {



    setup() {
        super.setup();
        $('body').css({minHeight: ''});
    }

    open() {
        this.setup();
        var deferred = Q.defer();
        var t = new TimelineLite({onComplete: () => {
            deferred.resolve()
        }});
        t.to(this.section, config.defaultAnimationSpeed, {autoAlpha: 1});
        t.fromTo(this.section.find('.inner'), config.defaultAnimationSpeed, {y: -40}, {autoAlpha: 1, y: 0}, '-=0.4');
        t.fromTo(this.section.find('.next-section'), config.defaultAnimationSpeed, {scaleX: 0.9, scaleY: 0.9}, {scaleX: 1, scaleY: 1, autoAlpha: 1});

        return deferred.promise;
    }
}

module.exports = VideoSection;