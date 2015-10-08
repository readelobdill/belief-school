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
import client from "sources/ModuleClient";

export default class QuestionsSection extends ModuleSection {

    constructor(section, module) {
        super(section, module);
        this.questions = this.section.find('.question').map(function(index, element) {
            return new Question(element);
        }).get();
        this.questionNav = new QuestionNav(this.section.find('.question-nav'));
        this.currentQuestion = 0;

    }
    setup() {
        super.setup();
        $('body').css({minHeight: ''});
        this.questions[this.currentQuestion].open();
        this.questionNav.setQuestion(this.currentQuestion);
        this.section.addClass('question-'+this.currentQuestion);
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
            if(question < this.currentQuestion) {
                this.goToQuestion(question);
            }

        }.bind(this));

        this.section.on('click', '.next-question', function(e) {
            e.preventDefault();
            if(this.getCurrentQuestion().validate()) {
                console.log(this.currentQuestion, this.questions.length);
                if(this.currentQuestion >= this.questions.length - 1) {
                    this.questionsFinished();
                } else {
                    this.nextQuestion();
                }

            }


        }.bind(this));
    }

    goToQuestion(question) {
        if(this.currentQuestion !== question && this.questions[question]) {
            this.questionNav.setQuestion(question);
            let timeline = new TimelineLite();
            timeline.add(this.questions[this.currentQuestion].close());
            timeline.add(() => {
                this.section.removeClass('question-'+this.currentQuestion);

            });
            timeline.add(this.questions[question].open(), '-=0.3');
            timeline.add(() => {
                this.section.addClass('question-'+question);
                this.currentQuestion = question;
            });


        }
    }

    nextQuestion() {
        this.goToQuestion(this.currentQuestion + 1);
    }

    getCurrentQuestion() {
        return this.questions[this.currentQuestion]
    }

    questionsFinished() {
        if(this.submitting) {
            return false;
        }
        this.submitting = true;

        let url = this.module.getUpdateUrl();
        let data = this.getQuestionData();
        return client.saveModule(url, data).then(() => {
            this.module.nextSection();
        });
    }

    getQuestionData() {
        let inputs = this.section.find('input[type=text],input[type=integer],input[type=email],input[type=checkbox]:checked,input[type=radio]:checked,textarea');
        let data = {};
        for(let i = 0; i < inputs.length; i++) {
            let input = $(inputs[i]);
            data[input.attr('name')] = input.val();
        }
        return data;
    }
}
