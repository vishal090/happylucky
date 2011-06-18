<form action="" method="POST" name="form">
    <table>
        <tr>
            <td><?php echo lang('login_username');?>: </td>
            <td>
                <?php
                echo form_input(array(
                    'name'  => 'username',
                    'id'    => 'username',
                    'class' => '',
                    'type'  => 'text',
                ));
                ?>
            </td>
        </tr>
        <tr>
            <td><?php echo lang('login_password');?>: </td>
            <td>
                <?php
                echo form_input(array(
                    'name'  => 'password',
                    'id'    => 'password',
                    'class' => '',
                    'type'  => 'password',
                ));
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="2">
            </td>
        </tr>
    </table>
</form>
