import TweenMax from "gsap/src/uncompressed/TweenMax";
import "gsap/src/uncompressed/plugins/ScrollToPlugin";

module.exports =  {
    to: function(element, duration, options) {
        return new Promise(function(yes, no) {
            options.onComplete = function() {
                yes(this);
            };
            TweenMax.to(element, duration, options);
        });

    },

    fromTo: function(element, duration, optionsFrom, optionsTo) {
        return new Promise(function(yes, no) {
            optionsTo.onComplete = function() {
                yes(this);
            };
            TweenMax.fromTo(element, duration, optionsFrom, optionsTo);
        });

    }
};