<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');?>
<script>
$(function() {
    $('#amulet-tabs').tabs({
        <?php if(!$amulet_id) echo "disabled: [1],";?>
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
        onclick="redirect('<?php echo site_url('admin/amulet');?>');" />
</div>
<?php echo clear_div();?>
<div class="grid_16">
    <div id="amulet-tabs">
    <?php
        // If amulet ID is false, means this is an ADD action
        $general_url = ($amulet_id) ? "admin/amulet/edit/".$amulet_id :
                        "admin/amulet/add";
        $list[] = anchor(site_url($general_url), lang('general'));
        $list[] = anchor(site_url('admin/amulet/images_add_edit/'.$amulet_id), lang('images'));
        echo ul($list);
    ?>
    </div>
</div>
<?php echo clear_div();?>