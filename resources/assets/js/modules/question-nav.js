import $ from "jquery";


class QuestionNav {
    constructor(el) {
        this.el = $(el);
    }

    setQuestion(question) {
        this.el.find('.is-active').removeClass('is-active');
        console.log(question);
        this.el.find('[data-question="'+(question)+'"]').addClass('is-active');
    }
}

module.exports = QuestionNav;

