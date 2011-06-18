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
    'common.js',
);

foreach ($scripts as $js)
    echo script_tag('common/script/' . $js) . "\n";

?>
<script>
// global javascript variable
var base_url = '<?php echo base_url(); ?>';

lang_confirm_delete = '<?php echo lang('confirm_delete'); ?>';

</script>
