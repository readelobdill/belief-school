import Module from 'modules/module';


class WelcomeModule extends Module {
    constructor(element) {
        super(element);
    }
}




function init() {
    var welcome = new WelcomeModule('.welcome-module');
}


module.exports = {
    init: init
};
