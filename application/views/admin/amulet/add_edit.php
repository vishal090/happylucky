<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');?>

<form id="amulet_add_edit" method="POST" 
      action="<?php echo site_url("admin/amulet/save/".$amulet->id);?>">
    <table>
        <tr>
            <td class="label"><?php echo lang('amulet_name');?></td>
            <td>
                <?php 
                    echo form_input(array(
                        'name'  => 'amulet_name',
                        'id'    => 'amulet_name',
                        'value' => $amulet->amulet_name,
                        'class' => 'text'
                    ));
                ?>
            </td>
        </tr>
        <tr><td colspan="2" class="txt-label"><?php echo lang('amulet_story');?></td></tr>
        <tr>
            <td colspan="2">
                <?php 
                    echo form_textarea(array(
                        'name'  => 'amulet_story',
                        'id'    => 'amulet_story',
                        'value' => $amulet->amulet_story,
                        'row'   => '7',
                    ));
                ?>
            </td>
        </tr>
    </table>
    <div class="right">
        <?php echo form_submit('save_amulet', lang('save'), 'class="button"');?>
    </div>
</form>
