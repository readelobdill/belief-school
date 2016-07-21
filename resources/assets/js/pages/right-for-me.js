import $ from 'jquery';
import currencyConverter from 'ui/currency-converter'

class RightForMe {
    constructor(section) {
        currencyConverter.init($(section).find('.currency-cost'));
    }
}

function init() {
    let rightForMe = new RightForMe('.right-for-me');
}

module.exports = {
    init: init
};