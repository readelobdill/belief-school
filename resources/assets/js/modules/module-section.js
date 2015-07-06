import $ from 'jquery';
import Video from 'modules/video';
import TweenMax from "gsap/src/uncompressed/TweenMax";
import TimelineLite from "gsap/src/uncompressed/TimelineLite";
import config from 'config';
import animate from 'modules/animate';
import Question from "modules/question";
import Q from "q";



class ModuleSection {
    constructor(section) {
        this.section = $(section);
    }

    open() {

        this.setup();
        return new Promise((yes, no) => {
            TweenMax.to(this.section, config.defaultAnimationSpeed, {autoAlpha: 1, onComplete: () => {

                yes();
            }});
        })

    }

    close() {
        return new Promise((yes, no) => {
            TweenMax.to(this.section, config.defaultAnimationSpeed, {autoAlpha: 0, onComplete: () => {
                this.teardown();
                yes();
            }});
        })
    }

    setup() {
        window.scrollTo(0,0);
    }

    teardown() {

    }
}


class IntroSection extends ModuleSection {
    constructor(section) {
        super(section);
        this.video = new Video(this.section.find('.display-video'));

    }
    open() {
        return super.open().then(() => {
            return this.video.scrollTo(0.5, 2.5).then(() => {
                return animate.fromTo(this.section.find('.next-section'), 0.7, {scaleX: 0.9, scaleY: 0.9}, {scaleX: 1, scaleY: 1, autoAlpha: 1});
            });
        });

    }
    close() {
        return this.video.scrollTo(1,1.5).then(() => {
            return animate.to(this.section.find('.inner'), 0.5, {autoAlpha: 0}).then(() => {
                this.teardown();
            });
        });
    }

    setup() {
        super.setup();
        $('body').css({minHeight: this.video.videoHeight()});
    }
    teardown() {
        super.teardown();
        this.video.destroy();
        this.video.seek(1);

    }
}

class VideoSection extends ModuleSection {


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
}
class QuestionsSection extends ModuleSection {

    constructor(section) {
        super(section);
        this.questions = this.section.find('.question').map(function(index, element) {
            return new Question(element);
        }).get();
        this.currentQuestion = 0;
        this.questions[this.currentQuestion].open();
    }
    setup() {
        super.setup();
        $('body').css({minHeight: ''});
        this.setupEventListeners();
    }


    setupEventListeners() {
        this.section.on('click', '.question-nav li', function(e) {
            var el = $(e.currentTarget);
            var question = el.data('question');
            this.goToQuestion(question);
        }.bind(this));

        this.section.on('click', '.next-question', function(e) {
            e.preventDefault();
            this.nextQuestion();

        }.bind(this));
    }

    goToQuestion(question) {
        console.log(question);
        if(this.currentQuestion !== question && this.questions[question]) {
            this.questions[this.currentQuestion].close().then(() => {
                this.currentQuestion = question;
                this.questions[this.currentQuestion].open();
            });
        }
    }

    nextQuestion() {
        this.goToQuestion(this.currentQuestion + 1);
    }
}
class TextSection extends ModuleSection {
    constructor(section) {
        super(section);
        this.scrollPosition = window.pageYOffset;
        this.setupEventListeners();

    }

    setupEventListeners() {
        $(window).on('scroll', () => {
            this.scrollPosition = window.pageYOffset;
        });
        this.updateTextScroll();
    }

    updateTextScroll() {
        var winH = $(window).height();
        var heightRatio = 1 - 80 / $('body').height();
        animate.to(this.section.find('.inner'), 0, {scrollTo: {y: Math.ceil(this.scrollPosition / heightRatio)}});
        this.animationFrame = requestAnimationFrame(this.updateTextScroll.bind(this));
    }

    setup() {
        $('body').css({minHeight: this.section.find('.content').outerHeight()});
    }

    teardown() {
        super.teardown();
        cancelAnimationFrame(this.animationFrame);
    }

}

var sectionTypes = {
    IntroSection: IntroSection,
    VideoSection: VideoSection,
    QuestionsSection: QuestionsSection,
    TextSection: TextSection

}



module.exports = function(element) {
    var type = $(element).data('type');
    return new sectionTypes[type+'Section'](element);
};