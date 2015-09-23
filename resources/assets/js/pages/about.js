import Accordion from 'modules/accordion';
import $ from 'jquery';

class About {
    constructor(section) {
        this.section = $(section);
        this.accordion = new Accordion(this.section.find('.accordion'), this);
        console.log('help;');
    }

    updateHeight() {

    }
}


function init() {
    var about = new About('[data-page=about]');
}


module.exports = {
    init: init
};
