import $ from 'jquery';
import 'modules/jqcloud';
export default class Dashboard {
    constructor(dashboard) {
        this.dashboard = $(dashboard);
        this.setupAccordian();
    }


    setupAccordian() {
        let $boomerang = this.dashboard.find('.module-boomerang')
        let wordsRaw = JSON.parse($boomerang.find('.tagcloud-words').html());
        let wordsWeights = {};
        let words = [];
        if(wordsRaw) {
            for(let word of wordsRaw) {
                if(wordsWeights[word]) {
                    wordsWeights[word]++;
                } else {
                    wordsWeights[word] = 1;
                }
            }

            for(let word in wordsWeights) {
                words.push({
                    text: word,
                    weight: wordsWeights[word]
                })
            }
            $boomerang.find('.tagcloud').jQCloud(words, {
                autoResize :true});
        }

        this.dashboard.find('.is-unlocked.is-complete .header .arrow').click((e)  => {
            $(e.currentTarget).closest('.is-unlocked.is-complete').toggleClass('is-open');


            // let $opener = $(e.currentTarget).closest('.is-unlocked.is-complete');
            // let moduleIsOpen = $opener.hasClass('is-visible')

            // if( moduleIsOpen ) {
            //    $opener.removeClass('is-open');
            //    setTimeout(function(){
            //         $opener.removeClass('is-visible');
            //    }, 1000)
            // } else {
            //     $opener.addClass('is-open');
            //     setTimeout(function(){

            //         $opener.addClass('is-visible');
            //    }, 1000)
            // }

        });

    }
}


export default {
    init: function() {
        let dash = new Dashboard('.dashboard-module');
    }
}