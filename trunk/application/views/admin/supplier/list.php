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
        onclick="redirect('<?php echo site_url('admin/supplier/add');?>');" />
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
            <th width="30%"><?php echo lang('supplier_name');?></th>
            <th width="30%"><?php echo lang('contact_no');?></th>
            <th width="35%"><?php echo lang('email');?></th>
        </tr>
        <?php foreach($suppliers as $supplier):?>
        <tr>
            <td><?php
                echo form_checkbox(array(
                    'name'  => 'check_'.$supplier->id,
                    'id'    => 'check_'.$supplier->id,
                    'value' => $supplier->id,
                    'class' => 'delete_check',
                ));
            ?></td>
            <td><?php 
                echo anchor(
                    site_url('admin/supplier/edit/'.$supplier->id),
                    $supplier->supplier_name
                );
            ?></td>
            <td><?php echo $supplier->contact_no;?></td>
            <td><?php echo $supplier->email;?></td>
        </tr>
        <?php endforeach;?>
    </table>
</div>
