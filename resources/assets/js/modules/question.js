import animate from "modules/animate";
import config from "config";
import $ from "jquery";
import 'parsleyjs';
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
        let timeline = new TimelineLite({onComplete: () => {
            this.question.find('input,textarea').focus();
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
                hideError(field, '.controls');
            });
            this.validator.on('field:error', (field) => {
                this.hideNext();
                showError(field, '.controls');
            });
        }
    }

    showNext() {
        return animate.to(this.question.find('.next-question'), 0.7, {autoAlpha: 1});
    }

    hideNext() {
        return animate.to(this.question.find('.next-question'), 0.7, {autoAlpha: .3});
    }




}
