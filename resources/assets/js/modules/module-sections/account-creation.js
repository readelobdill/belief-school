import $ from 'jquery';
import 'util/remote';
import 'util/parsley';
import TweenMax from "gsap/src/uncompressed/TweenMax";
import TimelineLite from "gsap/src/uncompressed/TimelineLite";
import config from 'config';
import Q from "q";
import ModuleSection from "modules/module-section";
import Client from "sources/ModuleClient";
import serialize from "util/serializeForm";
import {showError, hideError} from 'util/errors';
import Text from './text';


export default class AccountCreationSection extends Text {

    constructor(section, module) {
        super(section,module);
        this.form = this.section.find('form');
        this.setupForm();
    }
    setup() {
        super.setup();

        this.form.find('input').each((i, obj) => {
            let value = localStorage.getItem(`register-${$(obj).attr('name')}`);
            if(value) {
                $(obj).val(value);
                $(obj).addClass('has-content');
            }

        });

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
            if(!this.validator.isValid()) {
                return false;
            }
            if(this.submitting) {
                return false;
            }
            this.submitting = true;
            Client.registerUser(this.form.attr('action'), serialize(this.form)).then((response) => {
                $('.auth').find('.logout').removeClass('is-hidden-g');
                $('.auth').find('.login').addClass('is-hidden-g');
                $('.requires-auth').removeClass('is-hidden-g');

                this.form.find('input').each((i, obj) => {
                    let value = localStorage.removeItem(`register-${$(obj).attr('name')}`);
                });

                return this.module.nextSection();
            });
        });
        this.form.on('keyup', 'input', (e) => {
            let item = $(e.currentTarget);
            localStorage.setItem(`register-${item.attr('name')}`, item.val());
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




}