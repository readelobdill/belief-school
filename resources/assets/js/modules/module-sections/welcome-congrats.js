import ModuleSection from "modules/module-section";
import animate from 'modules/animate';
import $ from 'jquery';
import client from 'sources/ModuleClient';
import TweenMax from 'gsap/src/uncompressed/TweenMax';
import TimelineLite from 'gsap/src/uncompressed/TimelineLite';
import Q from 'q';
import Text from './text';
import CongratsSection from './congrats';

export default class WelcomeCongratsSection extends CongratsSection {


    setup() {
        super.setup();
        const data = this.module.getData();
        if(data) {
            this.section.find('.resolution').html(data);
        }

    }
}