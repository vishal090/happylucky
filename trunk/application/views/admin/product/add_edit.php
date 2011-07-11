<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');?>
<script>
$(document).ready(function() {
    $('.positive-integer').numeric({decimal: false, negative: false}, function() {
        ui_alert(lang_invalid_input, lang_positive_integer_warning_message);
        this.value = '';
        this.focus();
    }
    ).attr('title', lang_positive_integer_tooltip);

    $('.positive').numeric({decimal: '.', negative: false}, function() {
        ui_alert(lang_invalid_input, lang_positive_warning_message);
        this.value = '';
        this.focus();
    }
    ).attr('title', lang_positive_tooltip);
    $('tr.amulet-area').hide();
    $('#is_amulet').click(function() {
        if($(this).is(':checked')) {
            $('tr.amulet-area').show(1000);
        }
        else {
            $('tr.amulet-area').hide(1000);
        }
    });
});
</script>

<form id="product_add_edit" method="POST" 
      action="<?php echo site_url("admin/product/save/".$product->id);?>">
    <table>
        <tr>
            <td colspan="4" class="table-header">
                <?php echo lang('product_basic_info');?>
            </td>
        </tr>
        <tr>
            <td class="label"><?php echo lang('product_code');?></td>
            <td>
                <?php 
                    echo form_input(array(
                        'name'  => 'product_code',
                        'id'    => 'product_code',
                        'value' => $product->product_code,
                        'class' => 'text'
                    ));
                ?>
            </td>
            <td class="label"><?php echo lang('product_type');?></td>
            <td>
                <?php 
                    echo lang('product_retail');
                    $type['retail'] = array(
                        'name'    => 'type',
                        'id'      => 'type_retail',
                        'value'   => 'RETAIL',
                        'checked' => element('is_retail', $radio),
                        'style'   => 'margin-right: 10px;
                                      margin-left : 5px',
                    );
                    echo form_radio($type['retail']);
                    echo lang('product_wholesale');
                    $type['wholesale'] = array(
                        'name'    => 'type',
                        'id'      => 'type_wholesale',
                        'value'   => 'WHOLESALE',
                        'checked' => element('is_wholesale', $radio),
                        'style'   => 'margin-right: 10px;
                                      margin-left : 5px',
                    );
                    echo form_radio($type['wholesale']);
                    echo lang('product_both');
                    $type['both'] = array(
                        'name'    => 'type',
                        'id'      => 'type_both',
                        'value'   => 'BOTH',
                        'checked' => element('is_both', $radio),
                        'style'   => 'margin-right: 10px;
                                      margin-left : 5px',
                    );
                    echo form_radio($type['both']);
                ?>
            </td>
        </tr>
        <tr>
            <td class="label"><?php echo lang('product_name');?></td>
            <td>
                <?php 
                    echo form_input(array(
                        'name'  => 'product_name',
                        'id'    => 'product_name',
                        'value' => $product->product_name,
                        'class' => 'text'
                    ));
                ?>
            </td>
            <td class="label"><?php echo lang('product_price');?></td>
            <td>
                <?php 
                    echo form_input(array(
                        'name'  => 'standard_price',
                        'id'    => 'standard_price',
                        'value' => $product->standard_price,
                        'class' => 'positive text'
                    ));
                ?>
            </td>
        </tr>
        <tr><td colspan="4" class="txt-label"><?php echo lang('product_desc');?></td></tr>
        <tr>
            <td colspan="4">
                <?php 
                    echo form_textarea(array(
                        'name'  => 'product_desc',
                        'id'    => 'product_desc',
                        'value' => $product->product_desc,
                        'row'   => '7',
                    ));
                ?>
            </td>
        </tr>
        <tr>
            <td class="label"><?php echo lang('product_quantity_available');?></td>
            <td>
                <?php 
                    echo form_input(array(
                        'name'  => 'quantity_available',
                        'id'    => 'quantity_available',
                        'value' => $product->quantity_available,
                        'class' => 'text positive-integer'
                    ));
                ?>
            </td>
            <td class="label"><?php echo lang('product_min_quantity');?></td>
            <td>
                <?php 
                    echo form_input(array(
                        'name'  => 'min_quantity',
                        'id'    => 'min_quantity',
                        'value' => $product->min_quantity,
                        'class' => 'text positive-integer'
                    ));
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <?php 
                    echo lang('product_is_it_an_amulet')."?";
                    $is_amulet = array(
                        'name'    => 'is_amulet',
                        'id'      => 'is_amulet',
                        'ckecked' => $product->is_amulet(),
                        'style'   => 'margin-left : 10px',
                    );
                    echo form_checkbox($is_amulet);
                ?>
            </td>
        </tr>
        <tr class="amulet-area">
            <td colspan="4" class="table-header">
                <?php echo lang('product_extra_amulet_info');?>
            </td>
        </tr>
        <tr class="amulet-area">
            <td class="label"><?php echo lang('amulet');?></td>
            <td>
                <?php 
                    echo form_hidden(array(
                        'name'  => 'amulet_id',
                        'id'    => 'amulet_id',
                        'value' => element('amulet_id', $hidden)
                    ));
                    echo form_input(array(
                        'name'  => 'amulet',
                        'id'    => 'amulet',
                        'value' => element('amulet', $txt),
                        'class' => 'text'
                    ));
                ?>
            </td>
        </tr>
    </table>
    <div class="right">
        <?php echo form_submit('save_product', lang('save'), 'class="button"');?>
    </div>
</form>
