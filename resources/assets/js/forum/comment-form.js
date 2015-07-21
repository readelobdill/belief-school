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

    setupEventListeners() {
        this.form.on('submit', (e) => {
            e.preventDefault();
           this.submitForm();
            this.form[0].reset();
        })
    }

    submitForm() {
        client.replyTo(this.form.attr('action'), serializeForm(this.form)).then((response) => {
            return response.text()
        }).then((text) => {
            this.emit('comment:new', text);
        });
    }
}
