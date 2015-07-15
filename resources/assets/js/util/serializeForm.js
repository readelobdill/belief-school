import $ from "jquery";


function serialize(form) {
    let $form = $(form);

    let obj = $form.serializeArray();
    let serializedObj = {};

    for(let i = 0; i < obj.length; i++) {
        let field = obj[i];
        serializedObj[field.name] = field.value;
    }

    return serializedObj;


}


module.exports = serialize;

