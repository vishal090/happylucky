$(document).ready(function() {
    $('#btn_delete').click(function() {
        var msg = '';
        $.each($('.delete_check:checked'), function(i) {
            var id = $(this).val();
            $.ajax({
                url: base_url+'admin/amulet/delete/'+id,
                type: 'POST',
                success: function(data) {
                    $('#check_'+id).parentsUntil('tr').parent().fadeOut(1000);
                },
                error: function(xhr, status, responseText) {
                    msg += responseText + '\n';
                }
            });
        });
        if(msg != '')
            ui_alert(lang_error, msg);
    });
});
