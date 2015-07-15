import $ from 'jquery';
import Video from 'modules/video';
import TweenMax from "gsap/src/uncompressed/TweenMax";
import TimelineLite from "gsap/src/uncompressed/TimelineLite";
import config from 'config';
import animate from 'modules/animate';
import Q from "q";
import ModuleSection from "modules/module-section";

class IntroSection extends ModuleSection {
    constructor(section, module) {
        super(section, module);
        this.video = new Video(this.section.find('.display-video'));

    }
    open() {
        return super.open().then(() => {
            return this.video.scrollTo(0.5, 2.5).then(() => {
                return animate.fromTo(this.section.find('.next-section'), 0.7, {scaleX: 0.9, scaleY: 0.9}, {scaleX: 1, scaleY: 1, autoAlpha: 1});
            });
        });

    }
    close() {
        return this.video.scrollTo(1,1.5).then(() => {
            return animate.to(this.section.find('.inner'), 0.5, {autoAlpha: 0}).then(() => {
                this.teardown();
            });
        });
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

module.exports = IntroSection;