import Module from 'modules/module';


class GivingModule extends Module {
    constructor(element) {
        super(element);
    }
}




function init() {
    var giving = new GivingModule('.giving-module');
}


module.exports = {
    init: init
};