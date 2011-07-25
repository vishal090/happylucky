<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="grid_16 action-button">
    <input type="button" class="button" 
        value="<?php echo lang('back');?>" 
        onclick="redirect('<?php echo site_url('admin/user');?>');" />
</div>
<?php echo clear_div();?>
<div class="grid_16">
    <form id="user_add_edit" method="POST" 
          action="<?php echo site_url("admin/user/save/".$user->id);?>">
        <table>
            <tr>
                <td class="table-header" colspan="4">
                    <?php echo lang('personal_information');?>
                </td>
            </tr>
            <tr>
                <td class="label"><?php echo lang('user_first_name');?></td>
                <td>
                    <?php 
                        echo form_input(array(
                            'name'  => 'first_name',
                            'id'    => 'first_name',
                            'value' => $user->first_name,
                            'class' => 'validate[required] text'
                        ));
                    ?>
                </td>
                <td class="label"><?php echo lang('user_last_name');?></td>
                <td>
                    <?php 
                        echo form_input(array(
                            'name'  => 'last_name',
                            'id'    => 'last_name',
                            'value' => $user->last_name,
                            'class' => 'validate[required] text'
                        ));
                    ?>
                </td>
            </tr>
            <tr>
                <td class="label"><?php echo lang('user_password');?></td>
                <td>
                    <?php 
                        echo form_password(array(
                            'name'  => 'password',
                            'id'    => 'password',
                            'class' => 'validate[required,minSize[5]] text'
                        ));
                    ?>
                </td>
                <td class="label"><?php echo lang('user_confirm_password');?></td>
                <td>
                    <?php 
                        echo form_password(array(
                            'name'  => 'confirm_password',
                            'id'    => 'confirm_password',
                            'class' => 'validate[required,equals[password]] text'
                        ));
                    ?>
                </td>
            </tr>
            <tr>
                <td class="label"><?php echo lang('user_security_question');?></td>
                <td>
                    <?php 
                        echo form_input(array(
                            'name'  => 'security_question',
                            'id'    => 'security_question',
                            'value' => $user->security_question,
                            'class' => 'validate[required] text'
                        ));
                    ?>
                </td>
                <td class="label"><?php echo lang('user_security_answer');?></td>
                <td>
                    <?php 
                        echo form_input(array(
                            'name'  => 'security_answer',
                            'id'    => 'security_answer',
                            'value' => $user->security_answer,
                            'class' => 'validate[required] text'
                        ));
                    ?>
                </td>
            </tr>
            <tr>
                <td class="label"><?php echo lang('user_age');?></td>
                <td>
                    <?php 
                        echo form_input(array(
                            'name'  => 'age',
                            'id'    => 'age',
                            'value' => $user->age,
                            'class' => 'text positive-integer'
                        ));
                    ?>
                </td>
                <td class="label"><?php echo lang('user_sex');?></td>
                <td>
                    <?php 
                        echo lang('user_male');
                        echo nbs(3);
                        echo form_radio(array(
                            'name'  => 'sex',
                            'id'    => 'male',
                            'value' => 'M',
                            'checked' => ($user->sex == 'M'),
                            'class' => 'radio'
                        ));
                        echo nbs(3);
                        echo lang('user_female');
                        echo nbs(3);
                        echo form_radio(array(
                            'name'  => 'sex',
                            'id'    => 'female',
                            'value' => 'F',
                            'checked' => ($user->sex == 'F'),
                            'class' => 'radio'
                        ));
                    ?>
                </td>
            </tr>
            <tr>
                <td class="label"><?php echo lang('user_user_type');?></td>
                <td>
                    <?php 
                        $user_type = array(
                            'ADMIN' => 'ADMIN',
                            'MEMBER' => 'MEMBER',
                        );
                        echo form_dropdown(
                            'user_type',
                            $user_type,
                            $user->user_type,
                            'class="validate[required]" id="user_type"'
                        );
                    ?>
                </td>
                <td class="label"><?php echo lang('user_is_verified');?></td>
                <td>
                    <?php 
                        echo form_checkbox(array(
                            'name'     => 'is_verified',
                            'id'       => 'is_verified',
                            'value'    => '1',
                            'checked'  => ($user->is_verified == 1),
                            'class'    => 'checkbox',
                            'disabled' => true
                        ));
                    ?>
                </td>
            </tr>
            <tr>
                <td class="label"><?php echo lang('user_registration_date');?></td>
                <td>
                    <?php 
                        if($user->registration_date)
                            echo to_human_date_time($user->registration_date);
                    ?>
                </td>
                <td class="label"><?php echo lang('user_photo');?></td>
                <td>
                    <?php 
                    ?>
                </td>
            </tr>
            <tr>
                <td class="table-header" colspan="4">
                    <?php echo lang('contact_information');?>
                </td>
            </tr>
            <tr>
                <td class="label"><?php echo lang('user_contact_no');?></td>
                <td>
                    <?php 
                        echo form_input(array(
                            'name'  => 'contact_no',
                            'id'    => 'contact_no',
                            'value' => $user->contact_no,
                            'class' => 'validate[required] text'
                        ));
                    ?>
                </td>
                <td class="label"><?php echo lang('email');?></td>
                <td>
                    <?php 
                        echo form_input(array(
                            'name'  => 'email',
                            'id'    => 'email',
                            'value' => $user->email,
                            'class' => 'validate[required,custom[email]] text'
                        ));
                    ?>
                </td>
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
                            'value' => $user->address,
                            'class' => 'validate[required] text'
                        ));
                    ?>
                </td>
                <td class="txt-label"><?php echo lang('town');?></td>
                <td>
                    <?php 
                        echo form_input(array(
                            'name'  => 'town',
                            'id'    => 'town',
                            'value' => $user->town,
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
                            'value' => $user->postcode,
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
                            'value' => $user->city,
                            'class' => 'validate[required] text'
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
                            'value' => $user->state,
                            'class' => 'validate[required] text'
                        ));
                    ?>
                </td>
                <td class="txt-label"><?php echo lang('country');?></td>
                <td>
                    <?php 
                        echo form_hidden(array(
                            'name'  => 'country_id',
                            'id'    => 'country_id',
                            'value' => $user->country->id,
                        ));
                        echo form_input(array(
                            'name'  => 'country',
                            'id'    => 'country',
                            'value' => $user->country,
                            'class' => 'text'
                        ));
                    ?>
                </td>
            </tr>
        </table>
        <div class="right">
            <?php echo form_submit('save_user', lang('save'), 'class="button"');?>
        </div>
    </form>
</div>
<?php echo clear_div();?>
