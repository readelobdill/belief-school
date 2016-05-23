import $ from 'jquery';
import 'modules/jqcloud';
export default class Dashboard {
    constructor(dashboard) {
        this.dashboard = $(dashboard);
        this.setupAccordian();
    }

    setupAccordian() {
        let self = this;
        let $boomerang = this.dashboard.find('.module-boomerang');
        let $editButton = this.dashboard.find('.edit-button-container .edit')
        let $cancelButton = this.dashboard.find('.edit-button-container .cancel')
        let $saveButton = this.dashboard.find('.edit-button-container .save')

        $editButton.on('click', function(){
            $boomerang.toggleClass('edit-words');
        });

        $cancelButton.on('click', function(){
            $boomerang.removeClass('edit-words');
            $boomerang.find('.tagcloud span.cloud-word').removeClass('hidden');
        });

        $saveButton.on('click', function(){
            $boomerang.removeClass('edit-words');
            let $wordCloudForm = $boomerang.find('.save-word-cloud');
            $boomerang.find('.tagcloud span.cloud-word').each(function(){
                if(!$(this).hasClass('hidden')){
                    $('<input></input>', {
                        name: 'tags[]',
                        type: 'hidden',
                        value: $(this).text()
                    }).appendTo($wordCloudForm);
                }
            });

            $wordCloudForm.submit();
        });

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
                        weight: wordsWeights[word] + Math.random() * 2,
                        html: {class: 'cloud-word'},
                        afterWordRender: function(){
                            let $removeWord = $('<i></i>', {
                                class: 'remove-word grey'
                            }).appendTo(this);

                            $removeWord.on('click', function(){
                                $(this).addClass('hidden');
                            }.bind(this));
                        }
                    })
                }
                $boomerang.find('.tagcloud').jQCloud(words, {
                    autoResize :true
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