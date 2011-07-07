<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');?>

<!-- Pagination -->
<div class="grid_10">
&nbsp;
</div>
<!-- End Pagination -->

<!-- Action Button -->
<div class="grid_6 action-button">
    <input type="button" class="button" 
        value="<?php echo lang('add_new');?>" 
        onclick="redirect('<?php echo site_url('product/add');?>');" />
</div>
<!-- End Action Button -->
<?php echo clear_div();?>

<div class="grid_16">
    <table class="listing">
        <tr>
            <th><?php echo lang('product_code');?></th>
            <th><?php echo lang('product_name');?></th>
            <th><?php echo lang('product_quantity_left');?></th>
            <th><?php echo lang('product_price');?></th>
            <th><?php echo lang('product_type');?></th>
        </tr>
    </table>
</div>
