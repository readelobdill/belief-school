import 'whatwg-fetch';
import $ from 'jquery';
import Q from 'q';

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
        let deferred = Q.defer();

        let xhr = new XMLHttpRequest();

        let headers = new Headers($.extend({}, {
            'Accept' : 'application/json'
        }, defaultHeaders));


        xhr.upload.addEventListener('progress',(oEvent) => {
            if (oEvent.lengthComputable) {
                let percentComplete = oEvent.loaded / oEvent.total;
                deferred.notify(percentComplete);
            }

        });
        xhr.addEventListener('load', (response) => {
            deferred.resolve(response)
        });
        xhr.addEventListener('error', (response) => {
           deferred.reject(response);
        });
        xhr.addEventListener('abort', (response) => {
            deferred.reject(response);
        });
        xhr.open('POST', url);


        headers.forEach(function(value, name) {
            xhr.setRequestHeader(name, value);
        })

        xhr.send(data);


        return deferred.promise.then((response) => {
            return JSON.parse(response.currentTarget.responseText);
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
