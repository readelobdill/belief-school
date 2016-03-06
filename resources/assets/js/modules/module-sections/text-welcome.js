import Text from "./text";
import $ from "jquery";
import 'util/parsley';
import client from 'sources/ModuleClient';

class TextWelcome extends Text {

    constructor(section, module) {
        super(section, module);


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
            this.submitHandler();
        })
    }

    submitHandler() {
        if(this.submitting) {
            return false;
        }
        this.submitting = true;

        this.submitForm().then(() => {
            this.module.nextSection();
            this.submitting = false;
        });
    }


    setupEventListeners() {
        super.setupEventListeners();


    }

    submitForm() {
        let url = this.module.getUpdateUrl();
        let val = this.section.find('input:checked').val();
        this.module.setData(val);
        let data = {challenge: val}
        return client.saveModule(url, data, this.step);
    }

    submit() {
        this.submitHandler();
    }




}


module.exports = TextWelcome;