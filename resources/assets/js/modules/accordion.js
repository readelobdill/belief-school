import $ from 'jquery';


class Accordion {
    constructor(el, section) {
        this.el = $(el);
        this.section = section;
        this.setupEventListeners();

    }


    setupEventListeners() {
        this.el.on('click', '.toggle', (e) => {
            $(e.currentTarget).parents('li').toggleClass('is-open');
            this.section.updateHeight();
        });
    }

}

module.exports = Accordion;