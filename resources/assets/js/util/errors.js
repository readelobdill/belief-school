import $ from 'jquery';
import 'util/parsley';
import TweenMax from "gsap/src/uncompressed/TweenMax";

export function showError(field, container, direction) {
    let errors = ParsleyUI.getErrorsMessages(field);
    showRawError(field.$element, errors[0], container, direction);
}

export function hideError(field, container) {
    hideRawError(field.$element, container);
}


export function showRawError(field, error, container, direction) {
    direction = direction || 'left';
    let $controls = $(field).closest(container);
    let errorContainer = $controls.find('.error-container');
    if(!errorContainer.length) {
        errorContainer = $('<div></div>').addClass('error-container').html(error);
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
        errorContainer.html(error);
    }
}

export function hideRawError(field,  container) {
    let errorContainer = field.closest(container).find('.error-container');
    TweenMax.to(errorContainer, 0.3, {opacity: 0, onComplete: () => {
        errorContainer.remove();
    }});
}