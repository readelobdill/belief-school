import 'whatwg-fetch';
import $ from 'jquery';
import {uploadWithProgress} from 'util/uploadWithProgress';

let defaultHeaders = {
    'X-Requested-With' : 'XMLHttpRequest',
    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')

};

export default {
    replyTo: function(url, data) {
        return uploadWithProgress(url, data);
    },

    deleteComment(url) {
        return fetch(url, {
            method: 'delete',
            credentials: 'same-origin',
            headers: $.extend({}, {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }, defaultHeaders)
        }).then(response => {
            if((response.status < 200 || response.status >= 400) && response.status !== 0 ) {
                this.emit('load:error');
                return Q.reject(response.statusText);
            }

            return response;
        });
    }
}
