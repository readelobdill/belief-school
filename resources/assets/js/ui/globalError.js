import $ from 'jquery';
import TweenMax from 'gsap/src/uncompressed/TweenMax';
import TimelineLite from 'gsap/src/uncompressed/TimelineLite';
import client from 'sources/ModuleClient';

let currentErrors = 0;

export function showGlobalError(error) {
    currentErrors++;
    let $error = $('<div></div>').addClass('global-error');
    $error.css({'z-index' : currentErrors + 1});
    $error.html(error);
    $('body').append($error);


    TweenMax.fromTo($error, 0.3, {y: '-100%', opacity: 0}, {y: '0%', opacity: 1, onComplete: () => {
        setTimeout(() => {
            TweenMax.to($error, 0.3, {y: '-100%', opacity: 0, onComplete: () => {
                $error.remove();
                currentErrors--;
            }})
        }, 10000)
    }})
}

client.on('load:error', () => {
    showGlobalError('Something has gone wrong, please try again later.');
});

