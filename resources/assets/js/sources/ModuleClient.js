import 'whatwg-fetch';
import $ from 'jquery';
import Q from 'q';
import EventEmitter from 'events';
import {uploadWithProgress} from 'util/uploadWithProgress';


const defaultHeaders = {
    'X-Requested-With' : 'XMLHttpRequest',
    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')

}


class ModuleClient extends EventEmitter {

    saveModule(url, data, step) {
        this.emit('load:start');
        return fetch(url, {
            method: 'post',
            credentials: 'same-origin',
            headers: $.extend({}, {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            }, defaultHeaders),
            body: JSON.stringify({
                data: data,
                step: step
            })
        }).then(response => {
            if((response.status < 200 || response.status >= 400) && response.status !== 0 ) {
                this.emit('load:error');
                return Q.reject(response.statusText);
            }
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
        }).then(response => {
            if((response.status < 200 || response.status >= 400) && response.status !== 0 ) {
                this.emit('load:error');
                return Q.reject(response.statusText);
            }
        }).then((response) => {
            this.emit('load:end');
            return response;
        })
    }
    addImage(url, image, imageName, dimensions) {
        const data = new FormData();
        data.append('image', image);
        data.append('name', imageName);
        data.append('width', dimensions.w);
        data.append('height', dimensions.h);
        data.append('x', dimensions.x);
        data.append('y', dimensions.y);

        return uploadWithProgress(url, data).then(response => JSON.parse(response.responseText), error => {
            this.emit('load:error');
            return Q.reject(error);
        });
    }

    saveVideo(url, video) {
        const data = new FormData();
        data.append('video', video);
        return uploadWithProgress(url, data).then(response => JSON.parse(response.responseText), error => {
            this.emit('load:error');
            return Q.reject(error);
        });
    }

    getVimeoUploadData(url) {
        return fetch(url, {
            method: 'get',
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
        }).then(response => response.json())
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
        }).then(response => {
            if((response.status < 200 || response.status >= 400) && response.status !== 0 ) {
                this.emit('load:error');
                return Q.reject(response.statusText);
            } else {
                return response.json();
            }
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
