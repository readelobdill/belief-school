import $ from 'jquery';
import TweenMax from "gsap/src/uncompressed/TweenMax";
import TimelineLite from "gsap/src/uncompressed/TimelineLite";
import config from 'config';
import animate from 'modules/animate';
import Q from "q";
import "modules/arctext";
import ModuleSection from "modules/module-section";

class TextSection extends ModuleSection {
    constructor(section, module) {
        super(section, module);
        this.scrollPosition = window.pageYOffset;
    }

    setupEventListeners() {
        super.setupEventListeners();
        $(window).on('scroll', () => {
            this.scrollPosition = window.pageYOffset;
            var winH = $(window).height();
            animate.to(this.section.find('.inner'), 0, {scrollTo: {y: Math.ceil(this.scrollPosition)}});
        });
        //this.updateTextScroll();
    }

    updateTextScroll() {
        var winH = $(window).height();
        var heightRatio = 1 - 80 / $('body').height();
        animate.to(this.section.find('.inner'), 0, {scrollTo: {y: Math.ceil(this.scrollPosition)}});
        this.animationFrame = requestAnimationFrame(this.updateTextScroll.bind(this));
    }

    setup() {
        super.setup();
        this.updateHeight();
    }

    teardown() {
        super.teardown();
        cancelAnimationFrame(this.animationFrame);
    }

    open() {
        return super.open().then(() => {
            return animate.to(this.section.find('.inner'), 0.7, {autoAlpha: 1});
        })
    }

    updateHeight() {
        console.log('updateHeight');
        let height = this.section.find('.content').outerHeight();
        let padding = parseInt(this.section.css('padding-top'));

        $('body').css({minHeight: height + (padding * 2)});
    }

}

module.exports = TextSection;