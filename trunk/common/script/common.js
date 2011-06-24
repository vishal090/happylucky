function redirect (url, open_window) {
	if (open_window == true)
		window.open(url, '_blank');
	else
		window.location.href = url;
}

function ui_alert(title, message) {
    var content = '<p>'+message+'</p>';
    $('#message-dialog').attr({title: title});
    $('#message-dialog').html(content);
    $('#message-dialog').dialog({
                            resizable: false,
                            height: 140,
                            modal: true
                        });
}

$(document).ready(function() {
    $('.positive-integer').numeric({decimal: false, negative: false}, function() {
        ui_alert(lang_invalid_input, lang_positive_integer_warning_message);
        this.value = '';
        this.focus();
    }
    ).attr('title', lang_positive_integer_tooltip);

    $('.positive').numeric({negative: false}, function() {
        ui_alert(lang_invalid_input, lang_positive_warning_message);
        this.value = '';
        this.focus();
    }
    ).attr('title', lang_positive_tooltip);

    $('.integer').numeric({decimal: false}, function() {
        ui_alert(lang_invalid_input, lang_integer_warning_message);
        this.value = '';
        this.focus();
    }
    ).attr('title', lang_integer_tooltip);

    $('#country').autocomplete({
        highlight: true,
        minLength: 1,
        scroll: true,
        dataType: 'json',
        source: base_url + 'country/search',
        focus: function(event, ui) {
            formatted = format_country(ui.item);
            $('#country').val(formatted);
            return false;
        },
        select: function(event, ui) {
            formatted = format_country(ui.item);
            $('#country').val(formatted);
            return false;
        },
        open: function() {
            $(this).removeClass('ui-corner-all').addClass('ui-corner-top');
        },
        close: function() {
            $(this).removeClass('ui-corner-top').addClass('ui-corner-all');
        }
    })
/*    .data('autocomplete')._renderitem = function(ul, item){
        return $('<li></li>')
                .data('item.autocomplete', item)
                .append('<a>' + format_country(item) + '</a>')
                .appendto(ul);
    }*/;
});

function format_country(country) {
    var value = '';
    if(country.iso_code_3 && country.country_name)
        value = country.iso_code_3 + ' - ' + country.country_name;
    else if(country.country_name)
        value = country.country_name;
    else if(country.iso_code_3)
        value = country.iso_code_3;
    return value;
}
