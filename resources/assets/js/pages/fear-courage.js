import Module from 'modules/module';


class FearCourageModule extends Module {
    constructor(element) {
        super(element);
    }
}




function init() {
    var fearCourage = new FearCourageModule('.fear-courage-module');
}


module.exports = {
    init: init
};