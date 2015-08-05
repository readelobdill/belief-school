import $ from 'jquery';
import 'parsleyjs';
import {showError, hideError} from 'util/errors';
import client from 'sources/ModuleClient';
import serialize from 'util/serializeForm';


class Account {
    constructor(section) {
        this.section = $(section);
        this.form = this.section.find('form');
        this.setupForm();
    }

    setupForm() {
        this.validator = this.form.parsley({
            errorsWrapper: false,
            errorsContainer: (field) => {
                return false;
            }
        });
        this.validator.on('field:success', (field) => {
            hideError(field, '.form-row');
        });
        this.validator.on('field:error', (field) => {
            showError(field, '.form-row');
        });
        this.form.on('submit', (e) => {
            e.preventDefault();
            this.submitForm();
        });
    }

    submitForm() {
        client.updateUser(this.form.attr('action'), serialize(this.form));
    }
}



export default {
    init() {
        const account = new Account('.account-section');
    }
}