import Module from 'modules/module';


class GratitudeModule extends Module {
    constructor(element) {
        super(element);
    }
}




function init() {
    let gratitude = new GratitudeModule('.gratitude-module');
}


module.exports = {
    init: init
};