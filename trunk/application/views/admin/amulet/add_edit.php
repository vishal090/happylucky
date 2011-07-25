<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');?>
<script>
$(document).ready(function() {
    $('.wysiwyg').ckeditor(
        function(){
        }
    );
    $('#amulet_add_edit').validationEngine('attach');

    $('input#monk').autocomplete({
        highlight: true,
        minLength: 1,
        scroll: true,
        dataType: 'json',
        source: base_url + 'admin/monk/search',
        focus: function(event, ui) {
            $(this).val(ui.item.monk_name);
            return false;
        },
        select: function(event, ui) {
            $(this).val(ui.item.monk_name);
            $('#monk_id').val(ui.item.id);
            return false;
        },
        open: function() {
            $(this).removeClass('ui-corner-all').addClass('ui-corner-top');
        },
        close: function() {
            $(this).removeClass('ui-corner-top').addClass('ui-corner-all');
        }
    })
    .data('autocomplete')._renderItem = function(ul, item){
        return $('<li></li>')
                .data('item.autocomplete', item)
                .append('<a>' + item.monk_name + '</a>')
                .appendTo(ul);
    };
});
</script>

<form id="amulet_add_edit" method="POST" 
      action="<?php echo site_url("admin/amulet/save/".$amulet->id);?>">
    <table>
        <tr>
            <td class="label"><?php echo lang('amulet_code');?></td>
            <td>
                <?php 
                    echo form_input(array(
                        'name'  => 'amulet_code',
                        'id'    => 'amulet_code',
                        'value' => $amulet->amulet_code,
                        'class' => 'validate[required] text'
                    ));
                ?>
            </td>
            <td class="label"><?php echo lang('amulet_name');?></td>
            <td>
                <?php 
                    echo form_input(array(
                        'name'  => 'amulet_name',
                        'id'    => 'amulet_name',
                        'value' => $amulet->amulet_name,
                        'class' => 'validate[required] text'
                    ));
                ?>
            </td>
        </tr>
        <tr><td colspan="4" class="txt-label"><?php echo lang('amulet_desc');?></td></tr>
        <tr>
            <td colspan="4">
                <?php 
                    echo form_textarea(array(
                        'name'  => 'amulet_desc',
                        'id'    => 'amulet_desc',
                        'value' => $amulet->amulet_desc,
                        'row'   => '7',
                        'class' => 'validate[required] wysiwyg'
                    ));
                ?>
            </td>
        </tr>
        <tr>
            <td class="label"><?php echo lang('amulet_produced_date');?></td>
            <td>
                <?php 
                    echo form_input(array(
                        'name'  => 'produced_date',
                        'id'    => 'produced_date',
                        'value' => $amulet->produced_date,
                        'class' => 'text'
                    ));
                ?>
            </td>
            <td class="label"><?php echo lang('amulet_produced_place');?></td>
            <td>
                <?php 
                    echo form_input(array(
                        'name'  => 'produced_place',
                        'id'    => 'produced_place',
                        'value' => $amulet->produced_place,
                        'class' => 'text'
                    ));
                ?>
            </td>
        </tr>
        <tr>
            <td class="label"><?php echo lang('monk');?></td>
            <td>
                <?php 
                    echo form_hidden(array(
                        'name'  => 'monk_id',
                        'id'    => 'monk_id',
                        'value' => $amulet->monk->id,
                    ));
                    echo form_input(array(
                        'name'  => 'monk',
                        'id'    => 'monk',
                        'value' => $amulet->monk->monk_name,
                        'class' => 'text'
                    ));
                ?>
            </td>
            <td class="label"><?php echo lang('amulet_type');?></td>
            <td>
                <?php 
                    echo form_hidden(array(
                        'name'  => 'type_id',
                        'id'    => 'type_id',
                        'value' => $amulet->amulet_type->id,
                    ));
                    echo form_input(array(
                        'name'  => 'type',
                        'id'    => 'type',
                        'value' => $amulet->amulet_type->amulet_type_name,
                        'class' => 'text'
                    ));
                ?>
            </td>
        </tr>
        <tr>
            <td class="label"><?php echo lang('ability');?></td>
            <td>
                <?php 
                    echo form_hidden(array(
                        'name'  => 'ability_id',
                        'id'    => 'ability_id',
                        'value' => $amulet->amulet_ability->ability->id,
                    ));
                    echo form_input(array(
                        'name'  => 'ability',
                        'id'    => 'ability',
                        'value' => $amulet->amulet_ability->ability->ability_name,
                        'class' => 'text'
                    ));
                ?>
            </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
    </table>
    <div class="right">
        <?php echo form_submit('save_amulet', lang('save'), 'class="button"');?>
    </div>
</form>
