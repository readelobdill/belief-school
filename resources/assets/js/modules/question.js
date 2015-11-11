import animate from "modules/animate";
import config from "config";
import $ from "jquery";
import 'util/parsley';
import TweenMax from "gsap/src/uncompressed/TweenMax";
import TimelineLite from "gsap/src/uncompressed/TimelineLite";
import {showError, hideError} from 'util/errors';
import Q from 'q';

export default class Question {
    constructor(question) {
        this.question = $(question);
        this.validator = false;

        this.setupValidation();
    }

    open() {
        let defer = Q.defer();
        this.setup();
        let timeline = new TimelineLite({onComplete: () => {
            defer.resolve();

        }});

        timeline.to(this.question, 0, {autoAlpha: 1, display: 'block', onComplete: () => {
            this.question.find('[data-arc]').each(function() {
                console.log('test');
                var arc = parseInt($(this).data('arc'));
                $(this).arctext({radius: arc});
            })
        }});

        let position = 0;
        let $children = this.question.find('.content').children();
        $children.each((index, el) => {
            timeline.fromTo(el, 0.5, {y: 500, opacity: 0}, {y: 0, opacity: 1}, position);
            position += 0.1;
        });
        return defer.promise;
    }

    close() {
        let defer = Q.defer();
        this.teardown();
        let timeline = new TimelineLite({onComplete: () => {
            defer.resolve();
        }});
        let position = 0;
        let $children = this.question.find('.content').children();
        $children.each((index, el) => {
            timeline.fromTo(el, 0.5, {y: 0, opacity: 1}, {y: -500, opacity: 0}, position);
            position += 0.1;
        });
        timeline.to(this.question, 0, {autoAlpha: 0, display: 'none'});


        return defer.promise;
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
    }

    teardown() {
        $(window).off('resize.question', this._resize);
        let height = $(window).height();

        let calcHeight = height-180;

        this.question.closest('section').css('height', height);
    }

    _resize = () => {
        this.updateHeight();
    };


    scrollTo(x) {
        this.question.find('.inner > .content').css('transform', `translate3d(0,${-Math.ceil(x)}px,0)`);
    }

    updateHeight() {
        setTimeout(() => {
            let height = $(window).height();

            let calcHeight = height-180;
            let contentHeight = this.question.find('.inner').outerHeight() + 180;
            //this.question.find('.content').css('height', calcHeight);
            if(contentHeight <= height) {
                this.question.closest('section').css('height', height);
            } else {
                this.question.closest('section').css('height', contentHeight);
            }

        }, 0)

    }




}
