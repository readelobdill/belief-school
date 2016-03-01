import ModuleSection from "modules/module-section";
import animate from 'modules/animate';
import $ from 'jquery';
import client from 'sources/ModuleClient';
import TweenMax from 'gsap/src/uncompressed/TweenMax';
import TimelineLite from 'gsap/src/uncompressed/TimelineLite';
import Q from 'q';
import Text from './text';

export default class CongratsSection extends Text {


    open() {
        let container = this.section.find('.congrats-container');
        if(this.module.isComplete()) {
            container = container.last();
            $('[data-back],[data-forward]').hide();
        } else {
            container = container.first();
        }
        super.open();
        return animate.to(container, 0.7, {autoAlpha: 1});

    }

    setup() {
        super.setup();

    }


    setupEventListeners() {
        super.setupEventListeners();
        this.section.on('click','[data-complete-module]', this.completeModule.bind(this))
    }

    completeModule(e) {
        if(e.preventDefault) {
            e.preventDefault();
        }

        if(this.submitting) {
            return false;
        }
        this.submitting = true;
        var url = this.module.getCompleteUrl();
        client.completeModule(url).then(this.showNext.bind(this));

    }

    showNext(response) {
        $('[data-back],[data-forward]').hide();
        const timeline = new TimelineLite({onComplete: () => {
            this.updateHeight();
        }});
        let height = $(window).height();

        let calcHeight = height-180;

        this.section.css('height', height);

        timeline.add(this.getTimelineOpen());
        timeline.add(this.getTimelineClosed());
    }

    getTimelineOpen() {
        let timeline = new TimelineLite();
        let position = 0;
        let $children = this.section.find('.pre-complete .content').children();
        $children.each((index, el) => {
            timeline.fromTo(el, 0.5, {y: 0, opacity: 1}, {y: -500, opacity: 0}, position);
            position += 0.05;
        });
        timeline.to(this.section.find('.pre-complete'), 0, {autoAlpha: 0, display: 'none', immediateRender: false});


        return timeline;
    }

    getTimelineClosed() {
        let timeline = new TimelineLite();
        let position = 0;
        let $children = this.section.find('.post-complete .content').children();
        timeline.to(this.section.find('.post-complete'), 0, {autoAlpha: 1, display: 'table', immediateRender: false});
        $children.each((index, el) => {
            timeline.fromTo(el, 0.5, {y: 500, opacity: 0}, {y: 0, opacity: 1}, position);
            position += 0.05;
        });
        return timeline;
    }

    updateHeight() {
        let height = $(window).height();

        let calcHeight = height-180;


        if(!window.isMobile) {
            this.section.css('height', height);
            setTimeout(() => {
                let height = $(window).height();

                let calcHeight = height-180;
                let contentHeight;
                if(this.module.isComplete()) {
                    contentHeight = this.section.find('.post-complete > .inner').outerHeight() + 180;
                } else {
                    contentHeight = this.section.find('.pre-complete > .inner').outerHeight() + 180;
                }
                if(contentHeight <= height) {
                    this.section.css('height', height);
                } else {
                    this.section.css('height', contentHeight);
                }

            }, 0)
        } else {
            this.section.css('height', 'auto');
        }



    }

    submit() {
        this.completeModule();
    }
}