<form id="register_form" action="register/save" method="POST" name="form">
    <table>
        <tr>
            <td class="table-header" colspan="4"><?php echo lang('personal_information');?></td>
        </tr>
        <tr>
            <td class="table-label"><?php echo lang('user_username');?>: </td>
            <td><input type="text" name="username" id="username" /> </td>
        </tr>
        <tr>
            <td class="table-label"><?php echo lang('user_age');?>: </td>
            <td><input type="text" name="age" id="age" class="positive-integer" /> </td>
            <td class="table-label"><?php echo lang('user_sex');?>: </td>
            <td>
                <input type="radio" value="<?php echo lang('user_male');?>" name="sex" id="male">
                    <?php echo lang('user_male');?>
                </input>
                <input type="radio" value="<?php echo lang('user_female');?>" name="sex" id="female">
                    <?php echo lang('user_female');?>
                </input>
                </input>
            </td>
        </tr>
        <tr>
            <td class="table-label"><?php echo lang('user_password');?>: </td>
            <td><input type="password" name="password" id="password" /></td>
            <td class="table-label"><?php echo lang('user_confirm_password');?>: </td>
            <td><input type="password" name="confirm_password" id="confirm_password" /> </td>
        </tr>
        <tr>
            <td class="table-label"><?php echo lang('user_first_name');?>: </td>
            <td><input type="text" name="first_name" id="first_name" /> </td>
            <td class="table-label"><?php echo lang('user_last_name');?>: </td>
            <td><input type="text" name="last_name" id="last_name" /> </td>
        </tr>
        <tr>
            <td class="table-header" colspan="4"><?php echo lang('address_information');?></td>
        </tr>
        <tr>
            <td class="table-label"><?php echo lang('address');?>: </td>
            <td><input type="text" name="address" id="address" /> </td>
            <td class="table-label"><?php echo lang('town');?>: </td>
            <td><input type="text" name="town" id="town" /> </td>
        </tr>
        <tr>
            <td class="table-label"><?php echo lang('postcode');?>: </td>
            <td><input type="text" name="postcode" id="postcode" /> </td>
            <td class="table-label"><?php echo lang('city');?>: </td>
            <td><input type="text" name="city" id="city" /> </td>
        </tr>
        <tr>
            <td class="table-label"><?php echo lang('state');?>: </td>
            <td><input type="text" name="state" id="state" /> </td>
            <td class="table-label"><?php echo lang('country');?>: </td>
            <td><input type="text" name="country" id="country" /> </td>
        </tr>
        <tr>
            <td class="table-header" colspan="4"><?php echo lang('contact_information');?></td>
        </tr>
        <tr>
            <td class="table-label"><?php echo lang('user_contact_no');?>: </td>
            <td><input type="text" name="contact_no" id="contact_no" /> </td>
            <td class="table-label"><?php echo lang('email');?>: </td>
            <td><input title="<?php echo lang('user_email_tooltip');?>" type="text" name="email" id="email" /></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="<?php echo lang('user_register');?>" /></td>
            <td colspan="2"><input type="reset" value="<?php echo lang('reset');?>" /></td>
        </tr>
    </table><input type="button" onclick="redirect('country/search.html?term=my')" value="<?php echo lang('country');?>" />
</form>
