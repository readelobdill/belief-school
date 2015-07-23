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
    addImage: function(url, image, imageName) {
        let data = new FormData();
        data.append('image', image);
        data.append('name', imageName);
        return fetch(url, {
            method: 'post',
            credentials: 'same-origin',
            headers: $.extend({}, {
                'Accept' : 'application/json'
            }, defaultHeaders),
            body: data
        }).then((response) => {
            return response.json();
        });
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
