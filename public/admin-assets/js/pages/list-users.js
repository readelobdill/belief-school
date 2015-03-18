define(['modules/log'], function(log) {
    log('pages/list-users');
    $('.users-table').on('click', '.delete-user', function(e) {
        e.preventDefault();
        if(confirm('Are you sure you want to delete this user?')) {
            $.ajax({
                method: 'delete',
                url: $(this).attr('href')
            }).then(function() {
                $(this).parents('tr').remove();
            }.bind(this))
        }
    });
})