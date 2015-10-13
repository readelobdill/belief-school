import 'whatwg-fetch';
import $ from 'jquery';
import Q from 'q';
import EventEmitter from 'events';

const defaultHeaders = {
    'X-Requested-With' : 'XMLHttpRequest',
    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')

}

export function uploadWithProgress(url, data) {
    let deferred = Q.defer();
    const xhr = new XMLHttpRequest();

    const headers = $.extend({}, {
        'Accept' : 'application/json'
    }, defaultHeaders);



    xhr.upload.addEventListener('progress',(oEvent) => {
        if (oEvent.lengthComputable) {
            let percentComplete = oEvent.loaded / oEvent.total;
            deferred.notify(percentComplete);
        }

    });
    xhr.addEventListener('load', (response) => {
        if((response.target.status < 200 || response.target.status >= 400) && response.target.status !== 0 ) {
            return deferred.reject(response.target.statusText);
        }
        deferred.resolve(response.target);
    });
    xhr.addEventListener('error', (response) => {
        deferred.reject(response.target);
    });
    xhr.addEventListener('abort', (response) => {
        deferred.reject(response.target);
    });
    xhr.open('POST', url);


    Object.getOwnPropertyNames(headers).forEach(function(name) {
        xhr.setRequestHeader(name, headers[name]);
    }, this);

    xhr.send(data);

    return deferred.promise;
}