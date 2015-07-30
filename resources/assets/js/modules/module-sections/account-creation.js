import $ from 'jquery';
import "parsleyjs";
import TweenMax from "gsap/src/uncompressed/TweenMax";
import TimelineLite from "gsap/src/uncompressed/TimelineLite";
import config from 'config';
import Q from "q";
import ModuleSection from "modules/module-section";
import Client from "sources/ModuleClient";
import serialize from "util/serializeForm";
import {showError, hideError} from 'util/errors';

export default class AccountCreationSection extends ModuleSection {

    constructor(section, module) {
        super(section,module);
        this.form = this.section.find('form');
        this.setupForm();
    }
    setup() {
        super.setup();
        $('body').css({minHeight: ''});

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
    }


    open() {
        this.setup();
        var deferred = Q.defer();
        var t = new TimelineLite({onComplete: () => {
            deferred.resolve()
        }});
        t.to(this.section, config.defaultAnimationSpeed, {autoAlpha: 1});
        t.fromTo(this.section.find('.inner'), config.defaultAnimationSpeed, {y: -40}, {autoAlpha: 1, y: 0}, '-=0.4');
        t.fromTo(this.section.find('.next-section'), config.defaultAnimationSpeed, {scaleX: 0.9, scaleY: 0.9}, {scaleX: 1, scaleY: 1, autoAlpha: 1});
        return deferred.promise;
    }

    registerUser() {

    }
    setupEventListeners() {
        this.section.on('click', '.next-section', (e) => {

            if (this.validator.validate()) {
                if(this.submitting) {
                    return false;
                }
                this.submitting = true;
                Client.registerUser(this.form.attr('action'), serialize(this.form)).then((response) => {
                    return this.module.nextSection();
                });

            }
        });
        this.section.on('focus', 'input', this.formOnFocus.bind(this));
        this.section.on('keyup', 'input', this.formOnFocus.bind(this));
        this.section.on('change', 'input', this.formOnFocus.bind(this));
    }

    formOnFocus(e) {
        let field = $(e.currentTarget);

        if( field.val() ){
            field.addClass('has-content');
        } else {
            field.removeClass('has-content');
        }

    }


}