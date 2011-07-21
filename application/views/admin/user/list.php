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
        onclick="redirect('<?php echo site_url('admin/user/add');?>');" />
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
            <th width="15%"><?php echo lang('user_photo');?></th>
            <th width="20%"><?php echo lang('user_first_name');?></th>
            <th width="20%"><?php echo lang('user_contact_no');?></th>
            <th width="20%"><?php echo lang('email');?></th>
            <th width="20%"><?php echo lang('user_user_type');?></th>
        </tr>
        <?php foreach($users as $user):?>
        <tr>
            <td><?php
                echo form_checkbox(array(
                    'name'  => 'check_'.$user->id,
                    'id'    => 'check_'.$user->id,
                    'value' => $user->id,
                    'class' => 'delete_check',
                ));
            ?></td>
            <td><?php 
                echo anchor(
                    site_url('admin/user/edit/'.$user->id)
                    // img(array(
                        // 'src' => base_url()."images/users/"$user->id,
                        // 'alt' => $user->first_name.", ".$user->last_name,
                        // ''
                    // ))
                );
            ?></td>
            <td><?php echo $user->first_name;?></td>
            <td><?php echo $user->contact_no;?></td>
            <td><?php echo $user->email;?></td>
            <td><?php echo $user->user_type;?></td>
        </tr>
        <?php endforeach;?>
    </table>
</div>
