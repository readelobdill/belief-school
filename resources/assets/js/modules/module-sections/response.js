import ModuleSection from 'modules/module-section';
import $ from 'jquery';
import Text from './text';
import serialize from 'util/serializeForm';
import client from 'sources/ModuleClient';
import {showError, hideError} from 'util/errors';

export default class Affirmations extends Text {
    constructor(section, module) {
        super(section, module);
        this.form = this.section.find('form');
        this.setupForm();
    }
    setupEventListeners() {
        super.setupEventListeners();
        this.section.on('submit', 'form', (e) => {
            e.preventDefault();
            this.submit();
        });
    }

    submit() {

        if(this.submitting) {
            return false;
        }
        this.submitting = true;

        if(this.validator.validate()) {
            let data = serialize(this.section.find('form'));
            let url = this.module.getUpdateUrl();
            client.saveModule(url, data).then(() => {
                this.module.nextSection();
            });
        }

    }


    setupForm() {
        this.validator = this.form.parsley({
            errorsWrapper: false,
            errorsContainer: (field) => {
                return false;
            }
        });
        this.validator.on('field:success', (field) => {
            hideError(field, '.belief');
        });
        this.validator.on('field:error', (field) => {
            showError(field, '.belief', 'top');
        });
    }


}

