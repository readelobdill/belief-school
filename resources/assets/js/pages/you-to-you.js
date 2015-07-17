import Module from 'modules/module';


class YouToYouModule extends Module {
    constructor(element) {
        super(element);
    }
}




function init() {
    var youToYou = new YouToYouModule('.you-to-you-module');
}


module.exports = {
    init: init
};
