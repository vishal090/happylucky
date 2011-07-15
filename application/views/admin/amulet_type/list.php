<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');?>

<!-- Pagination -->
<div class="grid_10">
    <?php echo $pagination->create_links() ? $pagination->create_links() : nbs(1);?>
</div>
<!-- End Pagination -->

<!-- Action Button -->
<div class="grid_6 action-button">
    <input type="button" class="button" id="btn_delete" 
        value="<?php echo lang('delete');?>" />
    <input type="button" class="button" 
        value="<?php echo lang('add_new');?>" 
        onclick="redirect('<?php echo site_url('admin/amulet_type/index_add_edit');?>');" />
</div>
<!-- End Action Button -->
<?php echo clear_div();?>

<div class="grid_16">
    <table class="listing">
        <tr>
            <th width="5%"><?php
                echo form_checkbox(array(
                    'name'  => 'check_all',
                    'id'    => 'check_all',
                    'value' => 'CHECK_ALL',
                ));
            ?></th>
            <th width="20%"><?php echo lang('amulet_type_name');?></th>
            <th width="75%"><?php echo lang('amulet_type_desc');?></th>
        </tr>
        <?php foreach($amulet_types as $amulet_type):?>
        <tr>
            <td><?php
                echo form_checkbox(array(
                    'name'  => 'check_'.$amulet_type->id,
                    'id'    => 'check_'.$amulet_type->id,
                    'value' => $amulet_type->id,
                    'class' => 'delete_check',
                ));
            ?></td>
            <td><?php 
                echo anchor(
                    site_url('admin/amulet_type/index_add_edit/'.$amulet_type->id),
                    $amulet_type->amulet_type_name
                );
            ?></td>
            <td><?php echo $amulet_type->amulet_desc;?></td>
        </tr>
        <?php endforeach;?>
    </table>
</div>
