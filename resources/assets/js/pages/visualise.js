import $ from "jquery";
import Module from 'modules/module';


class VisualiseModule extends Module {
    constructor(element) {
        super(element);
    }
}




function init() {
    var visualise = new VisualiseModule('.visualise-module');
}


module.exports = {
    init: init
};
