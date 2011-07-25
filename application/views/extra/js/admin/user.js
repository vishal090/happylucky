$(document).ready(function() {
    $('#btn_delete').click(function() {
        var msg = '';
        $.each($('.delete_check:checked'), function(i) {
            var id = $(this).val();
            $.ajax({
                url: base_url+'admin/user/delete/'+id,
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
    
    $('input#country').autocomplete({
        highlight: true,
        minLength: 1,
        scroll: true,
        dataType: 'json',
        source: base_url + 'country/search',
        focus: function(event, ui) {
            formatted = format_country(ui.item);
            $(this).val(formatted);
            return false;
        },
        select: function(event, ui) {
            formatted = format_country(ui.item);
            $(this).val(formatted);
            $('#country_id').val(ui.item.id);
            return false;
        },
        open: function() {
            $(this).removeClass('ui-corner-all').addClass('ui-corner-top');
        },
        close: function() {
            $(this).removeClass('ui-corner-top').addClass('ui-corner-all');
        }
    })
    .data('autocomplete')._renderItem = function(ul, item){
        return $('<li></li>')
                .data('item.autocomplete', item)
                .append('<a>' + format_country(item) + '</a>')
                .appendTo(ul);
    };

    $('#user_add_edit').validationEngine('attach');
});
