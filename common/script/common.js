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
    });
});
