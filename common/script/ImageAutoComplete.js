(function() {
    $.fn.ImageAutocomplete = function(urlOrData, options) {
        var outerHTML = $(this)[0].outerHTML || new XMLSerializer().serializeToString($(this)[0]);
        var html = '<table class = "autocomplete" cellpadding = "0" cellspacing = "0"><tr><td><div class="icon"></div><img class="icon" alt="" /></td><td>' + outerHTML + '</td></tr></table>';
        $(this).after(html);
        $(this).hide();
        var txt = $("input", $(this).next());
        options = $.extend({}, $.Autocompleter.defaults, {
            formatItem: function(data, i, n, value) {
                return "<img style = 'width:40px;height:40px' src='" + value.split("-")[1] + "'/> " + value.split("-")[0];
            },
            formatResult: function(data, value) {
                return value.split("-")[0];
            }
        }, options);
        txt.autocomplete(urlOrData, options);
        txt.removeAttr("id");
        txt.removeAttr("name");
        txt.bind("keypress, change, keyup", function(e) {
            var code = (e.keyCode ? e.keyCode : e.which);
            if (code != 13) {
                $("img.icon", $(this).parents(".autocomplete")).hide();
                $("div.icon", $(this).parents(".autocomplete")).show();
            }
        });
        txt.result(function findValueCallback(event, data, formatted) {
            if (data) {
                $(this).parents(".autocomplete").prev().val(data[0].toString().split('-')[0]);
                $("img.icon", $(this).parents(".autocomplete")).attr("src", data[0].toString().split('-')[1]);
                $("img.icon", $(this).parents(".autocomplete")).show();
                $("div.icon", $(this).parents(".autocomplete")).hide();
            }
        });
    }
})(jQuery);