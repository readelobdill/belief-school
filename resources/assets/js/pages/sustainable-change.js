import Module from 'modules/module';


class SustainableChangeModule extends Module {
    constructor(element) {
        super(element);
    }
}




function init() {
    var sustainableChange = new SustainableChangeModule('.sustainable-change-module');
}


module.exports = {
    init: init
};