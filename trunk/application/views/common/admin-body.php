<!-- Login Bar -->
<div id="logout-topnav" class="topnav grid_6">
    <a href="<?php echo site_url('admin/welcome/logout');?>" class="signout">
        <span><?php echo lang('user_signout');?></span>
    </a>
</div>
<!-- End Login Bar -->

<?php echo clear_div();?>

<!-- Top-menu -->
<?php 
    $this->load->view('common/admin-topmenu');
    echo clear_div();
?>
<!-- End Top-menu -->

<!-- Title -->
<div class="grid_16">
    <h1 title="<?php echo isset($title) ? $title : '';?>" class="title">
        <?php echo isset($title) ? $title : '';?>
    </h1>
</div>
<!-- End Title -->
<?php echo clear_div();?>

</div>
<!-- End Header -->
<?php echo clear_div();?>

<!-- Content DIV -->
<div>
    <!-- Content -->
    <div class="content">
