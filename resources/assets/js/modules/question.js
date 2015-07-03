import animate from "modules/animate";
import config from "config";

class Question {
    constructor(question) {
        this.question = question;
    }

    open() {
        return animate.to(this.question, config.defaultAnimationSpeed, {autoAlpha: 1});
    }

    close() {
        return animate.to(this.question, config.defaultAnimationSpeed, {autoAlpha: 0});
    }

}

module.exports = Question;