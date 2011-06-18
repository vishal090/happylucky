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

