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
        onclick="redirect('<?php echo site_url('admin/ability/add');?>');" />
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
            <th width="20%"><?php echo lang('ability_name');?></th>
            <th width="75%"><?php echo lang('ability_desc');?></th>
        </tr>
        <?php foreach($abilities as $ability):?>
        <tr>
            <td><?php
                echo form_checkbox(array(
                    'name'  => 'check_'.$ability->id,
                    'id'    => 'check_'.$ability->id,
                    'value' => $ability->id,
                    'class' => 'delete_check',
                ));
            ?></td>
            <td><?php 
                echo anchor(
                    site_url('admin/ability/edit/'.$ability->id),
                    $ability->ability_name
                );
            ?></td>
            <td><?php echo $ability->ability_desc;?></td>
        </tr>
        <?php endforeach;?>
    </table>
</div>
