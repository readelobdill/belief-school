import Video from "modules/video";
import $ from "jquery";
import Timeline from "gsap/src/uncompressed/TimelineMax";
import config from 'config';
import animate from 'modules/animate';
import Module from 'modules/module';
import currencyConverter from 'ui/currency-converter'

class HomeModule extends Module {
    constructor(element) {
        super(element);
        currencyConverter.init($(element + ' .price-container .price'));
    }
}

function init() {
    var home = new HomeModule('.home-module');
}

module.exports = {
    init: init
};
