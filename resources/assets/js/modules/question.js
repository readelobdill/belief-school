import animate from "modules/animate";
import config from "config";
import $ from "jquery";
import "parsleyjs";

class Question {
    constructor(question) {
        this.question = $(question);
        this.validator = false;

        this.setupValidation();
    }

    open() {
        return animate.to(this.question, config.defaultAnimationSpeed, {autoAlpha: 1}).then(() => {
            this.question.find('input,textarea').focus();
        });
    }

    close() {
        return animate.to(this.question, config.defaultAnimationSpeed, {autoAlpha: 0});
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
            this.validator = form.parsley({trigger: 'keyup change'});
            this.validator.on('field:success', (field) => {
                this.showNext()
            });
            this.validator.on('field:error', (field) => {
                this.hideNext();
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

module.exports = Question;