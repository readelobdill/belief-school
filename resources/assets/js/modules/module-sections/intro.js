import $ from 'jquery';
import Video from 'modules/video';
import TweenMax from "gsap/src/uncompressed/TweenMax";
import TimelineLite from "gsap/src/uncompressed/TimelineLite";
import config from 'config';
import animate from 'modules/animate';
import Q from "q";
import ModuleSection from "modules/module-section";

export default class IntroSection extends ModuleSection {
    constructor(section, module) {
        super(section, module);
        this.video = new Video(this.section.find('.display-video'));

    }
    open() {

        this.setup();
        var deferred = Q.defer();
        var t = new TimelineLite({onComplete: () => {
            deferred.resolve()
        }});
        t.to(this.section, config.defaultAnimationSpeed, {autoAlpha: 1});
        t.to(this.section.find('.inner'), config.defaultAnimationSpeed, {autoAlpha: 1}, '-=0.4');
        t.add(TweenMax.fromTo(this.section.find('.next-section'), 0.7, {scaleX: 0.9, scaleY: 0.9}, {scaleX: 1, scaleY: 1, autoAlpha: 1}));


        return deferred.promise.then(() => {
            return this.video.videoReady
        }).then(() => {
            const t = new TimelineLite();
            t.add(this.video.scrollTo(0.5,2.5));

        });

    }

    jump() {
        return animate.to(this.section, 0, {autoAlpha: 1}).then(() => {
            animate.to(this.section.find('.inner'), 0, {autoAlpha: 0});
            this.teardown();

        });
    }

    close() {
        const defer = Q.defer();
        const t = new TimelineLite();
        t.add(this.video.scrollTo(1,1.5));
        t.to(this.section.find('.inner'), 0.5, {autoAlpha: 0})
        t.add(() => {
            this.teardown();
            defer.resolve();
        });
        return defer.promise;

    }

    setup() {
        super.setup();
        $('body').css({minHeight: this.video.videoHeight()});
    }
    teardown() {
        super.teardown();
        this.video.destroy();
        this.video.seek(1);

    }
}
