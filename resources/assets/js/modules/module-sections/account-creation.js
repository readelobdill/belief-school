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
import _ from 'lodash';


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
            if(this.form.hasClass('acquire-email')){
                Client.registerUser(this.form.attr('action'), serialize(this.form)).then((existingUser) => {
                    localStorage.setItem('register-first_name', _.get(existingUser, 'FirstName') || '');
                    localStorage.setItem('register-last_name', _.get(existingUser, 'LastName') || '');
                    return this.module.nextSection();
                });
            } else {
                Client.registerUser(this.form.attr('action'), serialize(this.form)).then((response) => {
                    $('.auth').find('.logout').removeClass('is-hidden-g');
                    $('.auth').find('.login').addClass('is-hidden-g');
                    $('.requires-auth').removeClass('is-hidden-g');

                    this.form.find('input').each((i, obj) => {
                        let value = localStorage.removeItem(`register-${$(obj).attr('name')}`);
                    });

                    if(this.form.hasClass('to-payment')){
                        window.location.href = location.origin + "/payments/pay/normal";
                    } else {
                        return this.module.nextSection();
                    }
                });
            }
        });
        this.form.on('input', 'input', (e) => {
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
        t.to(this.section, 0, {display: 'block', opacity: 0});
        t.to(this.section, config.defaultAnimationSpeed, {autoAlpha: 1});
        t.fromTo(this.section.find('.inner'), config.defaultAnimationSpeed, {y: -40}, {autoAlpha: 1, y: 0}, '-=0.4');
        t.fromTo(this.section.find('.next-section'), config.defaultAnimationSpeed, {scaleX: 0.9, scaleY: 0.9}, {scaleX: 1, scaleY: 1, autoAlpha: 1});
        return deferred.promise;
    }

    registerUser() {

    }




}