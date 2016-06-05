import $ from 'jquery';

class Forms {
    constructor() {
        this.setupLabels();
    }


    setupLabels() {
        $('input').each((e) => {
            this.formOnFocus(e);
        })
        $('body').on('focus','input',this.formOnFocus.bind(this));
        $('body').on('keyup','input',this.formOnFocus.bind(this));
        $('body').on('change','input',this.formOnFocus.bind(this));
    }

    formOnFocus(e) {
        let field = $(e.currentTarget);

        if( field.val() ){
            field.addClass('has-content');
        } else {
            field.removeClass('has-content');
        }

    }
}

export default {
    init() {
        const forms = new Forms();
    }
}