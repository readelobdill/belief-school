import $ from 'jquery';
import animate from 'modules/animate'
import config from 'config';

var multiplier = config.scrollDivider;
var scrollOffset = window.pageYOffset / multiplier;

$(window).on('scroll', function() {
    scrollOffset = window.pageYOffset / multiplier;
});

function Video(video) {
    this.video = $(video)[0];
    this.duration = 7.984;

    //this.video.pause();
    if(this.video.readyState >= 1) {
        this.updatePosition();
    } else {
        this.video.addEventListener('loadedmetadata',() => {
            console.log(this.video);
            this.updatePosition();
        });
    }



}


Video.prototype.updatePosition = function() {
    if(scrollOffset < this.video.duration) {
        this.video.currentTime = scrollOffset;
    }
    this.video.pause();
    this.animationId = requestAnimationFrame(this.updatePosition.bind(this));
};

Video.prototype.scrollTo = function(per, duration) {
    var scrollTo = this.video.duration * per * multiplier;
    return animate.to(window, duration, {
        scrollTo: {
            y: scrollTo
        }
    });

}

Video.prototype.seek = function(per) {
    this.video.currentTime = this.video.duration * per;
}

Video.prototype.videoHeight = function() {
    var height = this.duration * multiplier;
    return height + $(window).height();
}



Video.prototype.destroy = function() {
    console.log('destroy');
    cancelAnimationFrame(this.animationId);
};


module.exports = Video;