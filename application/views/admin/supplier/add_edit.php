<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="grid_16 action-button">
    <input type="button" class="button" 
        value="<?php echo lang('back');?>" 
        onclick="redirect('<?php echo site_url('admin/supplier');?>');" />
</div>
<?php echo clear_div();?>
<div class="grid_16">
    <form id="supplier_add_edit" method="POST" 
          action="<?php echo site_url("admin/supplier/save/".$supplier->id);?>">
        <table>
            <tr>
                <td class="table-header" colspan="4">
                    <?php echo lang('contact_information');?>
                </td>
            </tr>
            <tr>
                <td class="label"><?php echo lang('supplier_name');?></td>
                <td>
                    <?php 
                        echo form_input(array(
                            'name'  => 'supplier_name',
                            'id'    => 'supplier_name',
                            'value' => $supplier->supplier_name,
                            'class' => 'text'
                        ));
                    ?>
                </td>
                <td class="label"><?php echo lang('supplier_contact_no');?></td>
                <td>
                    <?php 
                        echo form_input(array(
                            'name'  => 'contact_no',
                            'id'    => 'contact_no',
                            'value' => $supplier->contact_no,
                            'class' => 'text'
                        ));
                    ?>
                </td>
            </tr>
            <tr>
                <td class="label"><?php echo lang('email');?></td>
                <td>
                    <?php 
                        echo form_input(array(
                            'name'  => 'email',
                            'id'    => 'email',
                            'value' => $supplier->email,
                            'class' => 'text'
                        ));
                    ?>
                </td>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td class="table-header" colspan="4">
                    <?php echo lang('address_information');?>
                </td>
            </tr>
            <tr>
                <td class="txt-label"><?php echo lang('address');?></td>
                <td>
                    <?php 
                        echo form_input(array(
                            'name'  => 'address',
                            'id'    => 'address',
                            'value' => $supplier->address,
                            'class' => 'text'
                        ));
                    ?>
                </td>
                <td class="txt-label"><?php echo lang('town');?></td>
                <td>
                    <?php 
                        echo form_input(array(
                            'name'  => 'town',
                            'id'    => 'town',
                            'value' => $supplier->town,
                            'class' => 'text'
                        ));
                    ?>
                </td>
            </tr>
            <tr>
                <td class="txt-label"><?php echo lang('postcode');?></td>
                <td>
                    <?php 
                        echo form_input(array(
                            'name'  => 'postcode',
                            'id'    => 'postcode',
                            'value' => $supplier->postcode,
                            'class' => 'text'
                        ));
                    ?>
                </td>
                <td class="txt-label"><?php echo lang('city');?></td>
                <td>
                    <?php 
                        echo form_input(array(
                            'name'  => 'city',
                            'id'    => 'city',
                            'value' => $supplier->city,
                            'class' => 'text'
                        ));
                    ?>
                </td>
            </tr>
            <tr>
                <td class="txt-label"><?php echo lang('state');?></td>
                <td>
                    <?php 
                        echo form_input(array(
                            'name'  => 'state',
                            'id'    => 'state',
                            'value' => $supplier->state,
                            'class' => 'text'
                        ));
                    ?>
                </td>
                <td class="txt-label"><?php echo lang('country');?></td>
                <td>
                    <?php 
                        echo form_input(array(
                            'name'  => 'country',
                            'id'    => 'country',
                            'value' => $supplier->country,
                            'class' => 'text'
                        ));
                    ?>
                </td>
            </tr>
        </table>
        <div class="right">
            <?php echo form_submit('save_supplier', lang('save'), 'class="button"');?>
        </div>
    </form>
</div>
<?php echo clear_div();?>
