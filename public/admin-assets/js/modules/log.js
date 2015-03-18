define([], function() {
    return function() {
        if(window.debug) {
            console.log.apply(console, arguments);
        }
    }
})