import ModuleSection from "modules/module-section";
import $ from 'jquery';
import TweenMax from 'gsap/src/uncompressed/TweenMax';
import TimelineLite from 'gsap/src/uncompressed/TimelineLite';
import Q from 'q';
import Congrats from './congrats';


export default class FinalCongrats extends Congrats {


    completeModule(e) {
        e.preventDefault();
        if(this.submitting) {
            return false;
        }
        this.submitting = true;
        this.showNext();

    }

    getTimelineClosed() {
        let timeline = new TimelineLite();
        timeline.to(this.section.find('.post-complete'), 0, {autoAlpha: 1, display: 'table'});
        timeline.fromTo(this.section.find('.post-complete'), 0.5, {y: 500, opacity: 0}, {y: 0, opacity: 1});
        return timeline;
    }

    getTimelineOpen() {
        let timeline = new TimelineLite();
        timeline.fromTo(this.section.find('.pre-complete'), 0.5, {y: 0, opacity: 1}, {y: -500, opacity: 0});
        timeline.to(this.section.find('.pre-complete'), 0, {autoAlpha: 0, display:'none'});
        return timeline;
    }

    updateHeight() {
        let height = $(window).height();

        let calcHeight = height-180;

        this.section.css('height', 'auto');
    }
}