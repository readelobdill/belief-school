import 'whatwg-fetch';
import Q from 'q';
import $ from 'jquery';

const defaultHeaders = {
    'X-Requested-With' : 'XMLHttpRequest',
    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')

}

export function downloadVideo(url) {
    console.log(URL.createObjectURL);
    let deferred = Q.defer();

    let xhr = new XMLHttpRequest();
    let video = document.createElement('video');

    xhr.addEventListener('progress', oEvent => {
        let percentComplete = oEvent.loaded / oEvent.total;
        deferred.notify(percentComplete);
    });

    xhr.addEventListener('load', response => {
        deferred.resolve(URL.createObjectURL(xhr.response));
    });

    if (video.canPlayType('video/webm') === 'probably') {
        xhr.open("GET", url + '.webm');
    }
    else {
        xhr.open("GET", url + '.mp4');
    }

    xhr.responseType = 'blob';

    xhr.send();


    return deferred.promise;

}