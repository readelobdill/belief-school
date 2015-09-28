import $ from 'jquery';
import TweenMax from "gsap/src/uncompressed/TweenMax";
import TimelineLite from "gsap/src/uncompressed/TimelineLite";
import config from 'config';
import animate from 'modules/animate';
import Q from "q";
import "modules/arctext";
import ModuleSection from "modules/module-section";

export default class TextSection extends ModuleSection {
    constructor(section, module) {
        super(section, module);
        this.scrollPosition = window.pageYOffset;
    }

    setupEventListeners() {
        super.setupEventListeners();
        $(window).on('scroll', () => {
            this.scrollPosition = window.pageYOffset;
        });


    }

    updateTextScroll() {
        var winH = $(window).height();
        var heightRatio = 1 - 80 / $('body').height();

        this.section.find('.inner > .content').css('transform', `translate3d(0,${-Math.ceil(this.scrollPosition)}px,0)`);
        this.animationFrame = requestAnimationFrame(this.updateTextScroll.bind(this));
    }

    setup() {
        super.setup();
        this.updateHeight();
        $(window).on('resize.text', () => {
            this.updateHeight();
        });
        this.updateTextScroll();
    }

    teardown() {
        super.teardown();
        cancelAnimationFrame(this.animationFrame);
        $(window).off('resize.text');
    }

    open() {
        return super.open().then(() => {
            return animate.to(this.section.find('.inner'), 0.7, {autoAlpha: 1});
        })
    }

    updateHeight() {
        let height = this.section.find('.content').outerHeight();

        let padding = parseInt(this.section.css('padding-top'));
        let innerPadding = parseInt(this.section.find('.inner').css('padding-top'));
        $('body').css({minHeight: height + (padding * 2) + (innerPadding * 2)});
    }

}
