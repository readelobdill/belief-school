import Video from "modules/video";
import $ from "jquery";
import Timeline from "gsap/src/uncompressed/TimelineMax";
import config from 'config';
import animate from 'modules/animate';
import Module from 'modules/module';


var t;
var scrollPosition = window.pageYOffset;
var $introVideo;

var currentSection = 0;


function setup() {
    var $videoContainer = $('.background-video');
    var homeVideo = new Video('.display-video');

    homeVideo.scrollTo(.5, 2.5);
    var $homeBanner = $('.home-banner');
    $introVideo = $('.intro-video-container');
    t = setupHomeTimeline();


    $videoContainer.on('click', '.next-section', function(e) {
        e.preventDefault();
        homeVideo.scrollTo(1,2.5).then(function() {
            homeVideo.destroy();
            animate.to($('.intro-video'), 1, {autoAlpha: 1});
        });
    });

    $(window).on('scroll', function() {
        scrollPosition = window.pageYOffset;
    });
    animateTimelineOnScroll();
}


function setupHomeTimeline() {
    var $homeBanner = $('.home-banner');
    var t = new Timeline();
    t.to($('.next-section'), 0, {autoAlpha: 1}, '+=3.2');
    t.to($homeBanner, 4.8, {scaleX: 1.5, scaleY: 1.5});
    t.to($homeBanner, 5, {opacity: 0, scaleX: 2.3, scaleY: 2.3});
    t.to($introVideo, 1, {autoAlpha: 1, display: 'block'});
    t.to($introVideo, 1, {opacity: 0, display: 'none', top: '-=20px', scaleX:1.1, scaleY: 1.1}, '+=5');
    t.pause();
    return t;
}

function animateTimelineOnScroll() {
    t.seek(scrollPosition / config.scrollDivider);
    //animate.to($introVideo.find('.inner'), 0, {scrollTop: scrollPosition});
    requestAnimationFrame(animateTimelineOnScroll);
}






class HomeModule extends Module {
    constructor(element) {
        super(element);
    }




}




function init() {
    var home = new HomeModule('.home-module');
}














module.exports = {
    init: init
};
