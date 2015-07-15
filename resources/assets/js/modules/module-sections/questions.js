import $ from 'jquery';
import TweenMax from "gsap/src/uncompressed/TweenMax";
import TimelineLite from "gsap/src/uncompressed/TimelineLite";
import config from 'config';
import animate from 'modules/animate';
import Question from "modules/question";
import Q from "q";
import "modules/arctext";
import QuestionNav from "modules/question-nav";
import ModuleSection from "modules/module-section";

class QuestionsSection extends ModuleSection {

    constructor(section, module) {
        super(section, module);
        this.questions = this.section.find('.question').map(function(index, element) {
            return new Question(element);
        }).get();
        this.questionNav = new QuestionNav(this.section.find('.question-nav'));
        this.currentQuestion = 0;
        this.questions[this.currentQuestion].open();
        this.questionNav.setQuestion(this.currentQuestion);
        this.section.addClass('question-'+this.currentQuestion);
    }
    setup() {
        super.setup();
        $('body').css({minHeight: ''});
    }

    open() {
        this.setup();
        var deferred = Q.defer();
        var t = new TimelineLite({onComplete: () => {
            deferred.resolve()
        }});
        t.to(this.section, config.defaultAnimationSpeed, {autoAlpha: 1});
        t.fromTo(this.section.find('.inner'), config.defaultAnimationSpeed, {y: -40}, {autoAlpha: 1, y: 0}, '-=0.4');
        t.fromTo(this.section.find('.next-section'), config.defaultAnimationSpeed, {scaleX: 0.9, scaleY: 0.9}, {scaleX: 1, scaleY: 1, autoAlpha: 1});
        return deferred.promise;
    }


    setupEventListeners() {
        super.setupEventListeners();
        this.section.on('click', '.question-nav li', function(e) {
            var el = $(e.currentTarget);
            var question = el.data('question');
            this.goToQuestion(question);
        }.bind(this));

        this.section.on('click', '.next-question', function(e) {
            e.preventDefault();
            if(this.getCurrentQuestion().validate()) {
                console.log(this.currentQuestion, this.questions.length);
                if(this.currentQuestion >= this.questions.length - 1) {
                    console.log('nextSectin');
                    this.module.nextSection()
                } else {
                    console.log('nextQuestion');
                    this.nextQuestion();
                }

            }


        }.bind(this));
    }

    goToQuestion(question) {
        if(this.currentQuestion !== question && this.questions[question]) {
            this.questionNav.setQuestion(question);
            this.questions[this.currentQuestion].close().then(() => {
                this.section.removeClass('question-'+this.currentQuestion);
                this.currentQuestion = question;
                this.questions[this.currentQuestion].open();
                this.section.addClass('question-'+this.currentQuestion);

            });
        }
    }

    nextQuestion() {
        this.goToQuestion(this.currentQuestion + 1);
    }

    getCurrentQuestion() {
        return this.questions[this.currentQuestion]
    }
}

module.exports = QuestionsSection;