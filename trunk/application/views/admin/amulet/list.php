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
        onclick="redirect('<?php echo site_url('admin/amulet/index_add_edit');?>');" />
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
            <th width="15%"><?php echo lang('amulet_code');?></th>
            <th width="20%"><?php echo lang('amulet_name');?></th>
            <th width="20%"><?php echo lang('amulet_produced_date');?></th>
            <th width="20%"><?php echo lang('monk');?></th>
            <th width="20%"><?php echo lang('amulet_type');?></th>
        </tr>
        <?php foreach($amulets as $amulet):?>
        <tr>
            <td><?php
                echo form_checkbox(array(
                    'name'  => 'check_'.$amulet->id,
                    'id'    => 'check_'.$amulet->id,
                    'value' => $amulet->id,
                    'class' => 'delete_check',
                ));
            ?></td>
            <td><?php 
                echo anchor(
                    site_url('admin/amulet/index_add_edit/'.$amulet->id),
                    $amulet->amulet_code
                );
            ?></td>
            <td><?php echo $amulet->amulet_name;?></td>
            <td><?php echo $amulet->produced_date;?></td>
            <td><?php 
                echo anchor(
                    site_url('admin/monk/index_add_edit/'.$amulet->monk->id),
                    $amulet->monk->monk_name
                );
            ?></td>
            <td><?php 
                echo anchor(
                    site_url('admin/amulet_type/index_add_edit/'.$amulet->amulet_type->id),
                    $amulet->amulet_type->amulet_type_name
                );
            ?></td>
        </tr>
        <?php endforeach;?>
    </table>
</div>
