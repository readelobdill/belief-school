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
        } else {
            container = container.first();
        }
        return super.open().then(() => {
            return Q.all(
                [animate.to(this.section.find('.inner'), 0.7, {autoAlpha: 1}),
                animate.to(container, 0.7, {autoAlpha: 1})]
            );
        })
    }

    setup() {
        super.setup();
    }


    setupEventListeners() {
        super.setupEventListeners();
        this.section.on('click','[data-complete-module]', this.completeModule.bind(this))
    }

    completeModule() {
        if(this.submitting) {
            return false;
        }
        this.submitting = true;

        var url = this.module.getCompleteUrl();
        client.completeModule(url).then(this.showNext.bind(this));
    }

    showNext(response) {
        const timeline = new TimelineLite();
        timeline.add(this.getTimelineOpen());
        timeline.add(this.getTimelineClosed(), '-=0.15');
        //animate.to(this.section.find('.pre-complete'), 0, {display: 'none'}).then(() => {
        //    return animate.to(this.section.find('.post-complete'), 0, {display: 'block'});
        //})
    }

    getTimelineOpen() {
        let timeline = new TimelineLite();
        let position = 0;
        let $children = this.section.find('.pre-complete .content').children();
        $children.each((index, el) => {
            timeline.fromTo(el, 0.5, {y: 0, opacity: 1}, {y: -500, opacity: 0}, position);
            position += 0.05;
        });
        timeline.to(this.section.find('.pre-complete'), 0, {autoAlpha: 0});


        return timeline;
    }

    getTimelineClosed() {
        let timeline = new TimelineLite();
        let position = 0;
        let $children = this.section.find('.post-complete .content').children();
        timeline.to(this.section.find('.post-complete'), 0, {autoAlpha: 1});
        $children.each((index, el) => {
            timeline.fromTo(el, 0.5, {y: 500, opacity: 0}, {y: 0, opacity: 1}, position);
            position += 0.05;
        });
        return timeline;
    }

    updateHeight() {
        let height;
        if(this.module.isComplete()) {
            height = this.section.find('.post-complete > .inner').outerHeight();
        } else {
            height = this.section.find('.pre-complete > .inner').outerHeight();
        }

        let padding = parseInt(this.section.css('padding-top'));
        console.log(height);
        $('body').css({minHeight: height + (padding * 2)});
    }
}