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
                autoResize :true,
                delay: 10});
        }

        this.dashboard.find('.is-unlocked.is-complete .header').click((e)  => {
            $(e.currentTarget).closest('.is-unlocked.is-complete').toggleClass('is-open');
        });



    }
}


export default {
    init: function() {
        let dash = new Dashboard('.dashboard-module');
    }
}