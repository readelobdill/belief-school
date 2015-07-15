import $ from 'jquery';
import "parsleyjs";
import TweenMax from "gsap/src/uncompressed/TweenMax";
import TimelineLite from "gsap/src/uncompressed/TimelineLite";
import config from 'config';
import Q from "q";
import ModuleSection from "modules/module-section";
import Client from "sources/ModuleClient";
import serialize from "util/serializeForm";



class AccountCreationSection extends ModuleSection {

    constructor(section, module) {
        super(section,module);
        this.form = this.section.find('form');
        this.validator = this.form.parsley();
    }
    setup() {
        super.setup();
        $('body').css({minHeight: ''});

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
                Client.registerUser(this.form.attr('action'), serialize(this.form)).then((response) => {
                    return this.module.nextSection();
                });

            }
        });
    }
}

module.exports = AccountCreationSection;