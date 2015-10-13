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



    }

    _onScroll = () => {
        this.scrollPosition = window.pageYOffset;
        this.section.find('.inner > .content').css('transform', `translate3d(0,${-Math.ceil(this.scrollPosition)}px,0)`);
    };

    _resize = () => {
        this.updateHeight();
    }

    _onInnerScroll = (e) => {
        e.preventDefault();
        console.log(e);
        let target = $(e.target);
        let scrollTop = target.scrollTop();
        if(scrollTop > 0) {
            target.scrollTop(0);
            $('body,html').scrollTop(scrollTop);
        }



    }


    setup() {
        super.setup();
        this.updateHeight();
        $(window).on('resize.text', this._resize);
        $(window).on('scroll', this._onScroll);
        this.section.find('.inner').on('scroll.text', this._onInnerScroll);
    }

    teardown() {
        super.teardown();
        $(window).off('resize.text', this._resize);
        $(window).off('scroll', this._onScroll);
        this.section.find('.inner').off('scroll.text', this._onInnerScroll);
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
