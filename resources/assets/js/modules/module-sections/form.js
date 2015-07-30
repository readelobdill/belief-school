import ModuleSection from 'modules/module-section';
import $ from 'jquery';
import 'parsleyjs';
import Text from './text';
import serialize from 'util/serializeForm';
import client from 'sources/ModuleClient';
import {showError, hideError} from 'util/errors';

export default class Form extends Text {
    constructor(section, module) {
        super(section, module);
        this.form = this.section.find('form');
        this.setupForm();
        this.submitting = false;
    }
    setupEventListeners() {
        super.setupEventListeners();
        this.section.on('submit', 'form', (e) => {
            e.preventDefault();
            if(this.validator.validate()) {
                this.submit()
            }

        });
        this.section.on('click', '[data-save-module]', (e) => {
            e.preventDefault();
            if(this.validator.validate()) {
                this.submit()
            }
        });
    }

    submit() {
        let url = this.module.getUpdateUrl();
        let data = serialize(this.section.find('form'));
        if(this.submitting) {
            return false;
        }
        this.submitting = true;

        if(this.validator.validate()) {
            client.saveModule(url, data).then(() => {
                this.module.nextSection();
            })
        }
    }

    setupForm() {
        this.validator = this.form.parsley({
            errorContainer: () => {
                return false;
            },
            errorsWrapper: false
        });

        this.validator.on('field:success', (field) => {
            hideError(field, '.form-row');
        });
        this.validator.on('field:error', (field) => {
            showError(field, '.form-row', 'left');
        });
    }
}


