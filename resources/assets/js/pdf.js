import $ from 'jquery';
import 'modules/jqcloud';

$(function() {
    let $boomerang = $('.module-boomerang');

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
                    weight: wordsWeights[word]
                })
            }
            $boomerang.find('.tagcloud').jQCloud(words, {
                autoResize :true});
        }
    }
});
