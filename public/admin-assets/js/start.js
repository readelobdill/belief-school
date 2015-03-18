define(['modules/log', 'pages/list-users', 'pages/list-modules', 'pages/list-comments'], function(log, listUsers, listModules, listComments) {
    return function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        log('started');
    }
})