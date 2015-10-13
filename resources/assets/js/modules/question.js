import animate from "modules/animate";
import config from "config";
import $ from "jquery";
import 'util/parsley';
import TweenMax from "gsap/src/uncompressed/TweenMax";
import TimelineLite from "gsap/src/uncompressed/TimelineLite";
import {showError, hideError} from 'util/errors';

export default class Question {
    constructor(question) {
        this.question = $(question);
        this.validator = false;

        this.setupValidation();
    }

    open() {
        this.setup();
        let timeline = new TimelineLite({onComplete: () => {
        }});
        timeline.to(this.question, 0, {autoAlpha: 1});
        let position = 0;
        let $children = this.question.find('.content').children();
        $children.each((index, el) => {
            timeline.fromTo(el, 0.5, {y: 500, opacity: 0}, {y: 0, opacity: 1}, position);
            position += 0.1;
        });
        return timeline;
    }

    close() {
        this.teardown();
        let timeline = new TimelineLite({onComplete: () => {

        }});
        let position = 0;
        let $children = this.question.find('.content').children();
        $children.each((index, el) => {
            timeline.fromTo(el, 0.5, {y: 0, opacity: 1}, {y: -500, opacity: 0}, position);
            position += 0.1;
        });
        timeline.to(this.question, 0, {autoAlpha: 0});

        return timeline;
    }

    validate() {
        if(this.validator) {
            return this.validator.validate();
        }
        return true;

    }

    setupValidation() {
        let form = this.question.find('form[data-validate]');
        if(form.length) {
            this.validator = form.parsley({
                trigger: 'keyup change',
                errorsWrapper: false,
                errorsContainer: (field) => {
                    return false;
                }
            });
            this.validator.on('field:success', (field) => {
                this.showNext()
                hideError(field, 'form');
            });
            this.validator.on('field:error', (field) => {
                this.hideNext();
                showError(field, 'form', 'top');
            });
        }
    }



    showNext() {
        return animate.to(this.question.find('.next-question'), 0.7, {autoAlpha: 1});
    }

    hideNext() {
        return animate.to(this.question.find('.next-question'), 0.7, {autoAlpha: .3});
    }


    setup() {
        window.scrollTo(0,0);
        this.updateHeight();
        $(window).on('resize.question', this._resize);
        $(window).on('scroll', this._onScroll);
        this.question.parent().on('scroll.question', this._onInnerScroll);

    }

    teardown() {
        $(window).off('resize.question', this._resize);
        $(window).off('scroll', this._onScroll);
        this.question.parent().off('scroll.question', this._onInnerScroll);
    }


    _onScroll = () => {
        this.scrollPosition = window.pageYOffset;
        this.scrollTo(this.scrollPosition);
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

    scrollTo(x) {
        this.question.find('.inner > .content').css('transform', `translate3d(0,${-Math.ceil(x)}px,0)`);
    }

    updateHeight() {
        let height = this.question.find('.content').outerHeight();
        let padding = parseInt(this.question.closest('section').css('padding-top'));
        let innerPadding = parseInt(this.question.find('.inner').css('padding-top'));
        $('body').css({minHeight: height + (padding * 2) + (innerPadding * 2)});
    }

    focusElement() {
        let $element = this.question.find('input,textarea').eq(0);
        if($element.length) {
            console.log($element);
            let offset = $element.offset();
            if(offset.top > window.scrollY + $(window).height()) {
                console.log('outside');
            }
            console.log(offset);
        }

        //window.scrollTo(0, offset.top);

    }




}
