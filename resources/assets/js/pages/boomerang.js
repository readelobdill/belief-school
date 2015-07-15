import Video from "modules/video";
import $ from "jquery";
import Timeline from "gsap/src/uncompressed/TimelineMax";
import config from 'config';
import animate from 'modules/animate';
import Module from 'modules/module';


class BoomerangModule extends Module {
    constructor(element) {
        super(element);
    }
}




function init() {
    var boomerang = new BoomerangModule('.boomerang-module');
}


module.exports = {
    init: init
};
