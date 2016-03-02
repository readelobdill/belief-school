import $ from 'jquery';
import 'modules/jqcloud';
export default class Dashboard {
    constructor(dashboard) {
        this.dashboard = $(dashboard);
        this.setupAccordian();
    }


    setupAccordian() {


        let $boomerang = this.dashboard.find('.module-boomerang');
        if($boomerang.find('.tagcloud-words').length > 0) {
            let wordsRaw = JSON.parse($boomerang.find('.tagcloud-words').html());
            let wordsWeights = {};
            let words = [];
            if(wordsRaw) {
                for(let i = 0; i < wordsRaw.length; i++) {
                    let word = wordsRaw[i];
                    if(wordsWeights[word.toLowerCase()]) {
                        wordsWeights[word.toLowerCase()]++;
                    } else {
                        wordsWeights[word.toLowerCase()] = 1;
                    }
                }

                for(let word in wordsWeights) {
                    words.push({
                        text: word,
                        weight: wordsWeights[word] + Math.random() * 2
                    })
                }
                $boomerang.find('.tagcloud').jQCloud(words, {
                    autoResize :true,
                    removeOverflowing: false
                });
            }
        }


        this.dashboard.find('.is-unlocked.is-complete .header').click((e)  => {
            $(e.currentTarget).closest('.is-unlocked.is-complete').toggleClass('is-open');
        });
        this.dashboard.find('[data-print]').on('click', (e) => {
            e.preventDefault();
            window.print();
        });

    }
}


export default {
    init: function() {
        let dash = new Dashboard('.dashboard-module');
    }
}