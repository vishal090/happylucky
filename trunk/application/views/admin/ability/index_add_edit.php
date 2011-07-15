<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');?>
<script>
$(function() {
    $('#ability-tabs').tabs({
        <?php if(!$ability_id) echo "disabled: [1],";?>
        ajaxOptions: {
             error: function(xhr, status, index, anchor) {
                        $(anchor.hash).html(
                            "Couldn't load this tab. We'll try to "
                            + "fix this as soon as possible."
                        );
                    }
         }
    }).find('.ui-tabs-nav').sortable({ axis: 'x' });

})
</script>

<div class="grid_16 action-button">
    <input type="button" class="button" 
        value="<?php echo lang('back');?>" 
        onclick="redirect('<?php echo site_url('admin/ability');?>');" />
</div>
<?php echo clear_div();?>
<div class="grid_16">
    <div id="ability-tabs">
    <?php
        // If ability ID is false, means this is an ADD action
        $general_url = ($ability_id) ? "admin/ability/edit/".$ability_id :
                        "admin/ability/add";
        $list[] = anchor(site_url($general_url), lang('general'));
        $list[] = anchor(site_url('admin/ability/images_add_edit/'.$ability_id), lang('images'));
        echo ul($list);
    ?>
    </div>
</div>
<?php echo clear_div();?>
