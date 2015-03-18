define([], function() {
    $('.comments-list').on('click', '.sticky-comment', function(e) {
        e.preventDefault();
        $(this).toggleClass('active');
        $.ajax({
            type: 'POST',
            url: $(this).attr('href')
        });
    }).on('click', '.delete-comment', function(e) {
        e.preventDefault();
        if(confirm('Are you sure you want to delete this comment?')) {
            $.ajax({
                method: 'delete',
                url: $(this).attr('href')
            }).then(function() {
                $(this).parents('li').remove();
            }.bind(this))
        }
    });
});