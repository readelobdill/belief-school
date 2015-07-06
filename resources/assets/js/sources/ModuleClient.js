import fetch from 'whatwg-fetch';


export default {
    saveModule: function(url, data) {
        return fetch(url, {
            method: 'post',
            credentials: 'same-origin',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
    },
    addImage: function(url, image, primary = false) {
        let data = new FormData();
        let imageName = primary ? 'primary' : 'secondary';
        data.append('image', imageName);
        return fetch(url, {
            method: 'post',
            credentials: 'same-origin',
            body: data
        })
    }
}
