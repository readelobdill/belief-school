define(['modules/log'], function(log) {
    log('modules/list-modules')

    var $moduleTable = $('.modules-table');
    $moduleTable.find('tbody').sortable({
        forcePlaceholderSize: true,
        forceHelperSize: true,
        helper: function(e, ui) {
            ui.children().each(function() {
                $(this).width($(this).width());
            });
            return ui;
        },
        update: function(event, ui) {

            updateOrder();

        }
    });


    $moduleTable.on('click', '.delete-module', function(e) {
        e.preventDefault();
        if(confirm('Are you sure you want to delete this user?')) {
            $.ajax({
                method: 'delete',
                url: $(this).attr('href')
            }).then(function() {
                $(this).parents('tr').remove();
                updateOrder();
            }.bind(this))
        }
    });


    function updateOrder() {
        var modules = [];
        $moduleTable.find('tbody tr').each(function() {
            var id = $(this).data('id');
            modules.push(id);
        });

        $.ajax({
            url: $moduleTable.data('update-url'),
            type: 'POST',
            data: JSON.stringify({order: modules}),
            contentType: 'application/json',
            processData: false
        });
    }
});