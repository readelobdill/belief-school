define([], function() {
    $('.sticky-comment').on('click', function(e) {
        e.preventDefault();
        $(this).toggleClass('active');
        $.ajax({
            type: 'POST',
            url: $(this).attr('href')
        });
    });
    $('.delete-comment').on('click', function(e) {
        e.preventDefault();
        if(confirm('Are you sure you want to delete this comment?')) {

            $.ajax({
                method: 'delete',
                url: $(this).attr('href')
            }).then(function() {
                window.location = window.location
            }.bind(this))
        }

    });
});