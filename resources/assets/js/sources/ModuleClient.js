import 'whatwg-fetch';
import $ from 'jquery';

let defaultHeaders = {
    'X-Requested-With' : 'XMLHttpRequest',
    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')

}

export default {
    saveModule: function(url, data) {
        return fetch(url, {
            method: 'post',
            credentials: 'same-origin',
            headers: $.extend({}, {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }, defaultHeaders),
            body: JSON.stringify(data)
        })
    },
    completeModule: function(url) {
        return fetch(url, {
            method: 'post',
            credentials: 'same-origin',
            headers: $.extend({}, {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }, defaultHeaders)
        })
    },
    addImage: function(url, image, primary = false) {
        let data = new FormData();
        let imageName = primary ? 'primary' : 'secondary';
        data.append('image', image);
        return fetch(url, {
            method: 'post',
            credentials: 'same-origin',
            body: data
        })
    },

    registerUser(url, data) {
        return fetch(url, {
            method: 'post',
            credentials: 'same-origin',
            headers: $.extend({}, {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }, defaultHeaders),
            body: JSON.stringify(data)
        })
    }
}
