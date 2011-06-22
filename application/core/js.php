<script>
// global javascript variable
var base_url = '<?php echo base_url(); ?>';

// language variable
lang_confirm_delete                   = '<?php echo lang('confirm_delete'); ?>';
lang_invalid_input                    = '<?php echo lang('invalid_input'); ?>';
lang_positive_integer_warning_message = '<?php echo lang('positive_integer_warning_message'); ?>';
lang_positive_integer_tooltip         = '<?php echo lang('positive_integer_tooltip');?>';
lang_positive_warning_message         = '<?php echo lang('positive_warning_message'); ?>';
lang_positive_tooltip                 = '<?php echo lang('positive_tooltip');?>';
lang_integer_warning_message          = '<?php echo lang('integer_warning_message'); ?>';
lang_integer_tooltip                  = '<?php echo lang('integer_tooltip');?>';

</script>
<?php 

// include file
$scripts = array(
    'jquery-1.6.1.js',
    'jquery-ui-1.8.13.custom.min.js',
    'jquery.autocomplete.js',
    'ImageAutoComplete.js',
    'jquery-ui-timepicker-addon.js',
    'jquery.contextMenu.js',
    'jquery.numeric.js',
    'jquery.lightbox-0.5.js',
    'date.format.js',
    'login/jquery.pop.js',
    'login/jquery.tipsy.js',
    'login.js',
    'accordion.js',
    'common.js',
);

foreach ($scripts as $js)
    echo script_tag('common/script/' . $js) . "\n";

?>
