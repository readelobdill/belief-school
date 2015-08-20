import $ from 'jquery';
import 'whatwg-fetch';
import 'util/parsley';

class TagCloudForm {
    constructor(form) {
        this.form = form;
        this.setupForm();
    }


    setupForm() {
        this.validator = this.form.parsley();
    }
}


export default {
    init() {
        const form = new TagCloudForm('.tag-cloud-form');
    }
}