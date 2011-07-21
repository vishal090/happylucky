<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="grid_16 action-button">
    <input type="button" class="button" 
        value="<?php echo lang('back');?>" 
        onclick="redirect('<?php echo site_url('admin/ability');?>');" />
</div>
<?php echo clear_div();?>
<div class="grid_16">
    <form id="ability_add_edit" method="POST" 
          action="<?php echo site_url("admin/ability/save/".$ability->id);?>">
        <table>
            <tr>
                <td class="label"><?php echo lang('ability_name');?></td>
                <td>
                    <?php 
                        echo form_input(array(
                            'name'  => 'ability_name',
                            'id'    => 'ability_name',
                            'value' => $ability->ability_name,
                            'class' => 'text'
                        ));
                    ?>
                </td>
            </tr>
            <tr><td colspan="2" class="txt-label"><?php echo lang('ability_desc');?></td></tr>
            <tr>
                <td colspan="2">
                    <?php 
                        echo form_textarea(array(
                            'name'  => 'ability_desc',
                            'id'    => 'ability_desc',
                            'value' => $ability->ability_desc,
                            'row'   => '7',
                            'class' => 'ckeditor'
                        ));
                    ?>
                </td>
            </tr>
        </table>
        <div class="right">
            <?php echo form_submit('save_ability', lang('save'), 'class="button"');?>
        </div>
    </form>
</div>
<?php echo clear_div();?>
