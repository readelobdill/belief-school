import client from 'sources/ModuleClient';
import $ from 'jquery';

const $body = $('body');

export default {
    init() {
        client.on('load:start', () => {
            $body.addClass('is-loading');
        });
        client.on('load:end', () => {
            $body.removeClass('is-loading');
        });
    }
}