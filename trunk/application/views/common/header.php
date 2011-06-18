<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php $this->lang->load('general'); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php echo isset($page_title) ? $page_title : 'Happy Lucky'; ?></title>
    <?php
    require_once "application/core/css.php";
    if (isset($extra_css)) {
        if(is_array($extra_css)) {
            foreach ($extra_css as $css)
                echo link_tag('application/views/extra/css/'.$css);
        }
        else
            echo link_tag('application/views/extra/css/'.$extra_css);
    }
    require_once "application/core/js.php";
    if (isset($extra_js)) {
        if(is_array($extra_js)) {
            foreach ($extra_js as $js)
                echo script_tag('application/views/extra/js/'.$js);
        }
        else
            echo script_tag('application/views/extra/js/'.$extra_js);
    }
    
    ?>
</head>
<body>
<!-- container_16 -->
<div class="container_16">

<!-- Header -->
<div class="header">
    <div class="grid_10">
        <?php
            echo img(array(
                'src'    => 'images/banner.png',
                'alt'    => lang('banner_img_alt'),
                'class'  => '',
                'width'  => '300px',
                'height' => '116px',
                'title'  => '',
                'rel'    => '',
            ));
        ?>
    </div>
    <!-- Login -->
    <?php $this->load->view('common/login', $login);?>
    <!-- End Login -->
    <?php echo clear_div();?>

<!-- Top-menu -->
<?php 
    $this->load->view('common/topmenu');
    echo clear_div();
?>
<!-- End Top-menu -->
    <h1 title="<?php echo isset($title) ? $title : '';?>" class="title">
        <?php echo isset($title) ? $title : '';?>
    </h1>
</div>
<!-- End Header -->
<?php echo clear_div();?>
<!-- A container to keep the jQuery message dialog -->
<div id="message-dialog"></div>
<!-- A container to keep the jQuery confirm dialog -->
<div id="confirm-dialog"></div>

    <!-- Content -->
    <div class="content">
