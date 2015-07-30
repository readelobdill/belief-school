import $ from 'jquery';
import 'parsleyjs';
import TweenMax from "gsap/src/uncompressed/TweenMax";

export function showError(field, container, direction) {
    direction = direction || 'left';
    let errors = ParsleyUI.getErrorsMessages(field);
    let $controls = field.$element.closest(container);
    console.log($controls);
    let errorContainer = $controls.find('.error-container');
    if(!errorContainer.length) {
        errorContainer = $('<div></div>').addClass('error-container').html(errors[0]);
        $controls.append(errorContainer);
        switch(direction) {
            case 'left':
                TweenMax.fromTo(errorContainer, 0.3, {x: -20, opacity: 0}, {x: 0, opacity: 1});
                break;
            case 'right':
                TweenMax.fromTo(errorContainer, 0.3, {x: 20, opacity: 0}, {x: 0, opacity: 1});
                break;
            case 'top':
                TweenMax.fromTo(errorContainer, 0.3, {y: -20, opacity: 0}, {y: 0, opacity: 1});
                break;
            case 'bottom':
                TweenMax.fromTo(errorContainer, 0.3, {y: 20, opacity: 0}, {y: 0, opacity: 1});
                break;
        }

    } else {
        errorContainer.html(errors[0]);
    }
}

export function hideError(field, container) {
    let errorContainer = field.$element.closest(container).find('.error-container');
    TweenMax.to(errorContainer, 0.3, {opacity: 0, onComplete: () => {
        errorContainer.remove();
    }});
}