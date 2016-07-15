import $ from 'jquery';
import fx from 'money';
import oxr from 'open-exchange-rates';
oxr.set({ app_id: '345d0be5b39149bfaa6314300fa7f9b0' })


class RightForMe {
    constructor(section) {
        this.section = $(section);
        this.setupEventListeners()
    }

    setupEventListeners(){
        let self = this;
        let $currencyCost = self.section.find('.currency-cost');

        $.getJSON(
            'https://openexchangerates.org/api/latest.json?app_id=345d0be5b39149bfaa6314300fa7f9b0',
            function(data) {
                fx.rates = data.rates;
                fx.base = data.base;

                $.each(fx.rates, function(key, value) {
                    $("<option></option>", {
                        value: key,
                        selected: key == 'NZD' ? 'selected' : null,
                        text: key
                    }).appendTo($currencyCost.find('.currency-selector'));
                });

                self.section.find('.currency-selector').on('change', function(){
                    var newCost = fx.convert(135, {from: 'NZD', to: $(this).val()})
                    $currencyCost.find('.currency-value').text(Math.round(newCost * 100) / 100);
                });
            }
        );
    }
}

function init() {
    let rightForMe = new RightForMe('.right-for-me');
}


module.exports = {
    init: init
};