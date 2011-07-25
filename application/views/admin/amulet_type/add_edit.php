<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');?>
<script>
$(document).ready(function() {
    $('.wysiwyg').ckeditor(
        function(){
        }
    );
    $('#amulet_type_add_edit').validationEngine('attach');
});
</script>

<form id="amulet_type_add_edit" method="POST" 
      action="<?php echo site_url("admin/amulet_type/save/".$amulet_type->id);?>">
    <table>
        <tr>
            <td class="label"><?php echo lang('amulet_type_name');?></td>
            <td>
                <?php 
                    echo form_input(array(
                        'name'  => 'amulet_type_name',
                        'id'    => 'amulet_type_name',
                        'value' => $amulet_type->amulet_type_name,
                        'class' => 'validate[required] text'
                    ));
                ?>
            </td>
        </tr>
        <tr><td colspan="2" class="txt-label"><?php echo lang('amulet_type_desc');?></td></tr>
        <tr>
            <td colspan="2">
                <?php 
                    echo form_textarea(array(
                        'name'  => 'amulet_type_desc',
                        'id'    => 'amulet_type_desc',
                        'value' => $amulet_type->amulet_desc,
                        'row'   => '7',
                        'class' => 'validate[required] wysiwyg'
                    ));
                ?>
            </td>
        </tr>
    </table>
    <div class="right">
        <?php echo form_submit('save_amulet_type', lang('save'), 'class="button"');?>
    </div>
</form>
