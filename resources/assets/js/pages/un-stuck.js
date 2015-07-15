import Video from "modules/video";
import $ from "jquery";
import Timeline from "gsap/src/uncompressed/TimelineMax";
import config from 'config';
import animate from 'modules/animate';
import Module from 'modules/module';


class UnStuckModule extends Module {
    constructor(element) {
        super(element);
    }
}




function init() {
    var unStuck = new UnStuckModule('.un-stuck-module');
}


module.exports = {
    init: init
};
