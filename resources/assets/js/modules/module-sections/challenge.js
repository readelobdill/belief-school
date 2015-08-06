import ModuleSection from 'modules/module-section';
import $ from 'jquery';
import 'parsleyjs';
import Text from './text';
import serialize from 'util/serializeForm';
import client from 'sources/ModuleClient';
import {showError, hideError} from 'util/errors';

export default class Challenge extends Text {

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
            this.submitChallenge();
        });
        this.section.on('click', '[data-save-module]', (e) => {
            e.preventDefault();
            this.submitChallenge();
        });
    }

    setupForm() {
        this.validator = this.form.parsley({
            errorContainer: () => {
                return false;
            },
            errorsWrapper: false
        });

        this.validator.on('field:success', (field) => {
            hideError(field, '.belief');
        });
        this.validator.on('field:error', (field) => {
            showError(field, '.belief', 'top');
        });
    }






    submitChallenge() {
        if(this.validator.validate()) {
            if(this.submitting) {
                return false;
            }
            this.submitting = true;
            let data = serialize(this.section.find('form'));
            this.module.setData(data);
            let url = this.module.getUpdateUrl();
            client.saveModule(url, data).then(() => {
                this.module.nextSection();
            })
        }

    }



}

