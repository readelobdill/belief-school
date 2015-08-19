import 'whatwg-fetch';
import $ from 'jquery';
import Q from 'q';
import EventEmitter from 'events';

const defaultHeaders = {
    'X-Requested-With' : 'XMLHttpRequest',
    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')

}


class ModuleClient extends EventEmitter {

    saveModule(url, data) {
        this.emit('load:start');
        return fetch(url, {
            method: 'post',
            credentials: 'same-origin',
            headers: $.extend({}, {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }, defaultHeaders),
            body: JSON.stringify(data)
        }).then((response) => {
            this.emit('load:end');
            return response;
        })
    }
    completeModule(url) {
        this.emit('load:start');
        return fetch(url, {
            method: 'post',
            credentials: 'same-origin',
            headers: $.extend({}, {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }, defaultHeaders)
        }).then((response) => {
            this.emit('load:end');
            return response;
        })
    }
    addImage(url, image, imageName) {
        const data = new FormData();
        data.append('image', image);
        data.append('name', imageName);
        const deferred = Q.defer();

        const xhr = new XMLHttpRequest();

        const headers = new Headers($.extend({}, {
            'Accept' : 'application/json'
        }, defaultHeaders));


        xhr.upload.addEventListener('progress',(oEvent) => {
            if (oEvent.lengthComputable) {
                let percentComplete = oEvent.loaded / oEvent.total;
                deferred.notify(percentComplete);
            }

        });
        xhr.addEventListener('load', (response) => {
            deferred.resolve(response);
            this.emit('load:end')
        });
        xhr.addEventListener('error', (response) => {
            deferred.reject(response);
            this.emit('load:end')
        });
        xhr.addEventListener('abort', (response) => {
            deferred.reject(response);
            this.emit('load:end')
        });
        xhr.open('POST', url);


        headers.forEach(function(value, name) {
            xhr.setRequestHeader(name, value);
        })

        xhr.send(data);


        return deferred.promise.then((response) => {
            return JSON.parse(response.currentTarget.responseText);
        });
    }

    saveVideo(url, video) {
        const data = new FormData();
        data.append('video', video);
        const deferred = Q.defer();

        const xhr = new XMLHttpRequest();

        const headers = new Headers($.extend({}, {
            'Accept' : 'application/json'
        }, defaultHeaders));


        xhr.upload.addEventListener('progress',(oEvent) => {
            if (oEvent.lengthComputable) {
                let percentComplete = oEvent.loaded / oEvent.total;
                deferred.notify(percentComplete);
            }

        });
        xhr.addEventListener('load', (response) => {
            deferred.resolve(response);
            this.emit('load:end')
        });
        xhr.addEventListener('error', (response) => {
            deferred.reject(response);
            this.emit('load:end')
        });
        xhr.addEventListener('abort', (response) => {
            deferred.reject(response);
            this.emit('load:end')
        });
        xhr.open('POST', url);


        headers.forEach(function(value, name) {
            xhr.setRequestHeader(name, value);
        })

        xhr.send(data);


        return deferred.promise.then((response) => {
            return JSON.parse(response.currentTarget.responseText);
        });
    }

    registerUser(url, data) {
        this.emit('load:start');
        return fetch(url, {
            method: 'post',
            credentials: 'same-origin',
            headers: $.extend({}, {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }, defaultHeaders),
            body: JSON.stringify(data)
        }).then((response) => {
            this.emit('load:end');
            return response;
        });
    }

    updateUser(url, data) {
        this.emit('load:start');
        return fetch(url, {
            method: 'post',
            credentials: 'same-origin',
            headers: $.extend({}, {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }, defaultHeaders),
            body: JSON.stringify(data)
        }).then((response) => {
            this.emit('load:end');
            return response;
        });
    }
}

export default (new ModuleClient());
