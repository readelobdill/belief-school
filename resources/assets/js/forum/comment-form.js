import client from "sources/CommentClient";
import serializeForm from "util/serializeForm";
import CommentStore from "stores/CommentStore";
import EventEmitter from 'events';

export default class CommentForm extends EventEmitter {
    constructor(form, parent) {
        super();
        this.form = form;
        this.parent = parent;
        this.setupEventListeners();
    }

    validate() {
        if(this.form.find('[name="body"]').val() == '') {
            return 'Your post must have content';
        }
        let files = this.form.find('[name="image"]')[0].files;
        if(files.length > 0) {

            let file = files[0];
            if(file.size > 1024 * 8) {
                return 'The uploaded image must be less then 1MB';
            }
        }
        return true;

    }

    setupEventListeners() {
        this.form.on('submit', (e) => {
            e.preventDefault();
            let message = this.validate();
            if(message === true) {
                this.submitForm();
                this.form[0].reset();
                this.form.find('.error-message').html('');
            } else {
                this.form.find('.error-message').html(message);
            }

        })
    }

    submitForm() {
        if(this.submitting) {
            return;
        }
        this.submitting = true;
        this.emit('comment:sending');
        client.replyTo(this.form.attr('action'), new FormData(this.form[0])).then((response) => {
            return response.responseText;
        }).then((text) => {
            this.emit('comment:new', text);
            this.submitting = false;
        }).done();
    }

    show() {
        this.form.removeClass('is-hidden');
        this.form.find('textarea').focus();
    }

    hide() {
        this.form.addClass('is-hidden');
        this.form.find('textarea').blur();
    }

    toggle() {
        this.form.toggleClass('is-hidden');
        if(this.form.hasClass('is-hidden')) {
            this.form.find('textarea').blur();
        } else {
            this.form.find('textarea').focus();
        }

    }
}
