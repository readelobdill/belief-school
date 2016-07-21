import $ from 'jquery';
import fx from 'money';
import oxr from 'open-exchange-rates';
oxr.set({ app_id: '345d0be5b39149bfaa6314300fa7f9b0' })

let currencies = {
    CAD: '$',
    NZD: '$',
    GBP: '£',
    USD: '$',
    AUD: '$',
    ZAR: 'R'
}

function init($converterContainer) {
    $.each(currencies, function(key, value) {
        $("<option></option>", {
            value: key,
            selected: key == 'NZD' ? 'selected' : null,
            text: key
        }).appendTo($converterContainer.find('.currency-selector'));
    });

    $.getJSON(
        'https://openexchangerates.org/api/latest.json?app_id=345d0be5b39149bfaa6314300fa7f9b0',
        function(data) {
            fx.rates = data.rates;
            fx.base = data.base;

            $converterContainer.find('.currency-selector').on('change', function(){
                let newCurrencyCode = $(this).val();
                let newCost = fx.convert(135, {from: 'NZD', to: newCurrencyCode})
                $converterContainer.find('.currency-value').text(Math.round(newCost));
                $converterContainer.find('.currency-symbol').text(currencies[newCurrencyCode]);
            });
        }
    );
}


module.exports = {
    init: init
};