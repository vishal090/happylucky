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
        onclick="redirect('<?php echo site_url('admin/product/index_add_edit');?>');" />
</div>
<!-- End Action Button -->
<?php echo clear_div();?>

<div class="grid_16">
    <table class="listing">
        <tr>
            <th><?php
                echo form_checkbox(array(
                    'name'  => 'check_all',
                    'id'    => 'check_all',
                    'value' => 'CHECK_ALL',
                ));
            ?></th>
            <th><?php echo lang('product_code');?></th>
            <th><?php echo lang('product_name');?></th>
            <th><?php echo lang('product_quantity_left');?></th>
            <th><?php echo lang('product_price');?></th>
            <th><?php echo lang('product_type');?></th>
        </tr>
        <?php foreach($products as $product):?>
        <tr>
            <td><?php
                echo form_checkbox(array(
                    'name'  => 'check_'.$product->id,
                    'id'    => 'check_'.$product->id,
                    'value' => $product->id,
                    'class' => 'delete_check',
                ));
            ?></td>
            <td><?php 
                echo anchor(
                    site_url('admin/product/index_add_edit/'.$product->id),
                    $product->product_code
                );
            ?></td>
            <td><?php echo $product->product_name;?></td>
            <td><?php echo $product->quantity_available;?></td>
            <td><?php echo $product->standard_price;?></td>
            <td><?php echo $product->product_type;?></td>
        </tr>
        <?php endforeach;?>
    </table>
</div>
