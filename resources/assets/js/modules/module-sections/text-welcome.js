import Text from "./text";
import Accordion from "modules/accordion"
import $ from "jquery";
import "parsleyjs";

class TextWelcome extends Text {

    constructor(section, module) {
        super(section, module);
        this.accordian = new Accordion(this.section.find('.accordion'), this);

        this.setupForm();
    }

    setupForm() {
        this.form = this.section.find('form');
        this.validator = this.form.parsley({
            errorsContainer: (field) => {
                return $('<div></div>');
            }
        });

        this.form.on('submit', (e) => {
            e.preventDefault();
            this.module.nextSection();
        })
    }


    setupEventListeners() {
        super.setupEventListeners();


    }




}


module.exports = TextWelcome;