import $ from 'jquery';
import animate from 'modules/animate'
import TweenMax from "gsap/src/uncompressed/TweenMax";
import TimelineLite from "gsap/src/uncompressed/TimelineLite";
import "gsap/src/uncompressed/plugins/ScrollToPlugin";
import config from 'config';
import Q from 'q';
import {downloadVideo} from 'util/downloadVideo';

var multiplier = config.scrollDivider;
var scrollOffset = window.pageYOffset / multiplier;

$(window).on('scroll', function() {
    scrollOffset = window.pageYOffset / multiplier;
});

function Video(video) {
    this.video = $(video)[0];
    this.duration = 7.984;
    this._isVideo = true;
    let videoReady = Q.defer();
    this.videoReady = videoReady.promise;
    if($(this.video).is('img')) {
        this._isVideo = false;
        videoReady.resolve(this);
        return;
    }
    $('body').addClass('is-loading-video');
    //this.video.pause();
    this.videoContainer = $(document.createElement('video'));
    this.videoContainer.addClass('display-video');

    downloadVideo($(this.video).data('video')).then(response => {
        this.videoContainer[0].src = response;
        $(this.video).replaceWith(this.videoContainer);
        this.video = this.videoContainer[0];
        console.log($(this.video).is('video'));
        videoReady.resolve(this);
    }, error => {

    }, progress => {

    });






    this.videoReady.then(() => {
        this.updatePosition();
        this.videoHasLoaded();
    });



}

Video.prototype.getPercentLoaded = function() {
    let percent = null;
    if (this.video && this.video.buffered && this.video.buffered.length > 0 && this.video.buffered.end && this.video.duration) {
        percent = this.video.buffered.end(0) / this.video.duration;
    }
    // Some browsers (e.g., FF3.6 and Safari 5) cannot calculate target.bufferered.end()
    // to be anything other than 0. If the byte count is available we use this instead.
    // Browsers that support the else if do not seem to have the bufferedBytes value and
    // should skip to there. Tested in Safari 5, Webkit head, FF3.6, Chrome 6, IE 7/8.
    else if (this.video && this.video.bytesTotal != undefined && this.video.bytesTotal > 0 && this.video.bufferedBytes != undefined) {
        percent = this.video.bufferedBytes / this.video.bytesTotal;
    }

    return percent;
}

Video.prototype.videoHasLoaded = function() {
    $('body').removeClass('is-loading-video');
}


Video.prototype.updatePosition = function() {
    if(scrollOffset < this.video.duration) {
        this.video.currentTime = scrollOffset;
    }
    this.video.pause();
    this.animationId = requestAnimationFrame(this.updatePosition.bind(this));
};

Video.prototype.scrollTo = function(per, duration) {
    if(!this.isVideo()) {
        return () => {}
    }
    var scrollTo = this.video.duration * per * multiplier;
    return TweenMax.to(window, duration, {
        scrollTo: {
            y: scrollTo
        }
    });

}

Video.prototype.seek = function(per) {
    if(!this.isVideo()) {
        return Q.resolve();
    }
    return this.videoReady.then(() => {
        this.video.currentTime = this.video.duration * per;
    })

}

Video.prototype.videoHeight = function() {
    if(this.isVideo()) {
        var height = this.duration * multiplier;
        return height + $(window).height();
    } else {
        return 0;
    }

}



Video.prototype.destroy = function() {
    this.videoReady.then(() => {
        cancelAnimationFrame(this.animationId);
    });

};

Video.prototype.isVideo = function() {
    return this._isVideo;
}




module.exports = Video;