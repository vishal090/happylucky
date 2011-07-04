<?php  if (!defined('BASEPATH')) exit('No direct script access allowed'); 
$this->lang->load ('user', get_cookie ('language'));
$this->lang->load ('general', get_cookie ('language'));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php echo isset($page_title) ? $page_title : lang('happy_lucky'); ?></title>
    <?php 
        echo link_tag('common/style/960/960.css'); 
        echo link_tag('common/style/main.css'); 
    ?>
</head>
<body bgcolor="#DFEFFC">

<!-- Container 16 -->
<div class="container_16">
    <!-- Grid 3 -->
    <div class="grid_3">&nbsp;</div>
    <!-- End Grid 3 -->

    <!-- Admin Login Box -->
    <div class="admin-login-box grid_10">
        <div class="center">
            <?php
                echo img(array(
                    'src'    => 'images/banner.png',
                    'alt'    => lang('banner_img_alt'),
                    'class'  => '',
                    'width'  => '300px',
                    'height' => '116px',
                    'title'  => '',
                    'rel'    => '',
                    'border' => '0',
                ));
            ?>
        </div>
        <div id="login_form_block">
            <form id="login_form" name="login_form"  action="<?php echo site_url('admin/welcome/login')?>" method="post">
<?php echo form_error('username');?>
                <table>
                    <tr>
                        <td class="label"><?php echo lang ('user_username');?> :</td>
                        <td><input type="text" class="text" id="username" name="username" value="" /></td>
                    </tr>
                    <tr>
                        <td class="label"><?php echo lang ('user_password');?> :</td>
                        <td><input type="password" class="text" id="password" name="password" value="" /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><div class="error"><?php echo $this->session->flashdata ('login_error');?>&nbsp;</div></td>
                    </tr>
                    <!--tr>
                        <td class="label"><?php echo lang ('login_language');?> :</td>
                        <td><?php
                            $language_options = array ('english'=>'English'
                                                        , 'chinese'=>'Chinese');
                            echo form_dropdown ('language'
                                                , $language_options
                                                , get_cookie ('language')
                                                , 'id="language" style="width:160px" onchange="onchange_language(this)"');
                            ?>
                        </td>
                    </tr-->
                    <tr>
                        <td></td>
                        <td><input id="submit" type="submit" class="button" value="<?php echo lang ('user_signin');?>" /></td>
                    </tr>
                    <!--tr>
                        <td></td>
                        <td><?php echo anchor ('', lang ('login_forgotten_password'));?></td>
                    </tr-->
                </table>
            </form>
        </div>
    </div>
    <!-- End Admin Login Box -->

    <!-- Grid 3 -->
    <div class="grid_3">&nbsp;</div>
    <!-- End Grid 3 -->

    <div class="clear"></div>

<div class="legal">
    <div class="copyright">
        <div class="licenseInfo">
            &copy; <?php echo lang('all_right_reserved');?>
            <a href=#><?php echo lang('happy_lucky');?></a>
            <br />
            Revision: 
            <?php
            $svn_dir = FCPATH . ".svn/entries";
            if(file_exists($svn_dir)) {
                $svn = file($svn_dir);
                if($svn) {
                    $svn_rev = $svn[3];
                    echo $svn_rev;
                }
            }
            ?>
        </div>
    </div>
</div>

</div>
<!-- End Container 16 -->
</body>
</html>