import Text from "./text";
import Accordion from "modules/accordion"
import $ from "jquery";
import 'util/parsley';
import client from 'sources/ModuleClient';

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
            if(this.submitting) {
                return false;
            }
            this.submitting = true;

            this.submitForm().then(() => {
                this.module.nextSection();
            });
        })
    }


    setupEventListeners() {
        super.setupEventListeners();


    }

    submitForm() {
        let url = this.module.getUpdateUrl();
        let data = {challenge: this.section.find('input:checked').val()}
        return client.saveModule(url, data);
    }




}


module.exports = TextWelcome;