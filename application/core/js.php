<script>
// global javascript variable
var base_url = '<?php echo base_url(); ?>';

// language variable
lang_confirm_delete                   = '<?php echo lang('confirm_delete'); ?>';
lang_error                            = '<?php echo lang('error'); ?>';
lang_done                             = '<?php echo lang('done'); ?>';
lang_cancel                           = '<?php echo lang('cancel'); ?>';
lang_invalid_input                    = '<?php echo lang('invalid_input'); ?>';
lang_positive_integer_warning_message = '<?php echo lang('positive_integer_warning_message'); ?>';
lang_positive_integer_tooltip         = '<?php echo lang('positive_integer_tooltip');?>';
lang_positive_warning_message         = '<?php echo lang('positive_warning_message'); ?>';
lang_positive_tooltip                 = '<?php echo lang('positive_tooltip');?>';
lang_integer_warning_message          = '<?php echo lang('integer_warning_message'); ?>';
lang_integer_tooltip                  = '<?php echo lang('integer_tooltip');?>';

</script>
<?php 
// $files = glob('common/script/*.js');

// include file
$scripts = array(
    'jquery-1.6.2.min.js',
    'jquery-ui-1.8.14.custom.min.js',
    // 'jquery.autocomplete.js',
    'ImageAutoComplete.js',
    'jquery-ui-timepicker-addon.js',
    'jquery.contextMenu.js',
    'jquery.numeric.js',
    'jquery.alphanumeric.js',
    'jquery.lightbox-0.5.js',
    'jquery.validate.js',
    'jquery.maskedinput.js',
    'blueimp-file-upload/jquery.fileupload.js',
    'blueimp-file-upload/jquery.fileupload-ui.js',
    'blueimp-file-upload/jquery.fileupload-uix.js',
    'blueimp-file-upload/jquery.iframe-transport.js',
    'blueimp-file-upload/jquery.tmpl.js',
    'blueimp-file-upload/jquery.image-gallery.js',
    'blueimp-file-upload/application.js',
    'jquery.cookie.js',
    'date.format.js',
    'login/jquery.pop.js',
    'login/jquery.tipsy.js',
    'login.js',
    'accordion.js',
    'common.js',
);

foreach ($scripts as $js)
    echo script_tag('common/script/' . $js) . "\n";

$ckeditor = array(
    'ckeditor.js',
    'config.js',
    'adapters/jquery.js',
);
foreach ($ckeditor as $ck)
    echo script_tag('application/libraries/ckeditor/'.$ck) . "\n";

?>
