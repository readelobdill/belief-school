import $ from 'jquery';
import animate from 'modules/animate'
import config from 'config';
import Q from 'q';

var multiplier = config.scrollDivider;
var scrollOffset = window.pageYOffset / multiplier;

$(window).on('scroll', function() {
    scrollOffset = window.pageYOffset / multiplier;
});

function Video(video) {
    this.video = $(video)[0];
    this.duration = 7.984;
    let videoReady = Q.defer();
    this.videoReady = videoReady.promise;
    $('body').addClass('is-loading-video');



    let percent = this.getPercentLoaded();

    if (percent !== null) {
        percent = 100 * Math.min(1, Math.max(0, percent));
        if(percent == 100) {
            videoReady.resolve(this.video);
        }
        // ... do something with var percent here (e.g. update the progress bar)

    }
    this.video.addEventListener('progress', (e) => {

        let percent = this.getPercentLoaded();

        if (percent !== null) {
            percent = 100 * Math.min(1, Math.max(0, percent));
            if(percent == 100) {
                videoReady.resolve(this.video);
            }
            // ... do something with var percent here (e.g. update the progress bar)

        }
    });

    this.videoReady.then(() => {
        this.updatePosition();
        this.videoHasLoaded();
    })



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
    var scrollTo = this.video.duration * per * multiplier;
    return animate.to(window, duration, {
        scrollTo: {
            y: scrollTo
        }
    });

}

Video.prototype.seek = function(per) {
    return this.videoReady.then(() => {
        console.log(this.video.duration);
        this.video.currentTime = this.video.duration * per;
        console.log(this.video.currentTime);
    })

}

Video.prototype.videoHeight = function() {
    var height = this.duration * multiplier;
    return height + $(window).height();
}



Video.prototype.destroy = function() {
    this.videoReady.then(() => {
        cancelAnimationFrame(this.animationId);
    });

};


module.exports = Video;