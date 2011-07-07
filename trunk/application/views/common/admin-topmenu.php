<div class="grid_16" id="menu">
    <ul class="menu">
        <li>
            <a href="<?php echo site_url('admin/dashboard');?>">
                <span><?php echo lang('dashboard');?></span>
            </a>
        </li>
        <li>
            <a href="<?php echo site_url('admin/product');?>">
                <span><?php echo lang('product_management');?></span>
            </a>
        </li>
        <li>
            <a href="<?php echo site_url('admin/amulet');?>">
                <span><?php echo lang('amulet_management');?></span>
            </a>
        </li>
        <li>
            <a href="<?php echo site_url('admin/monk');?>">
                <span><?php echo lang('monk_management');?></span>
            </a>
        </li>
        <li>
            <a href="<?php echo site_url('admin/supplier');?>">
                <span><?php echo lang('supplier_management');?></span>
            </a>
        </li>
        <li>
            <a href="<?php echo site_url('admin/user');?>">
                <span><?php echo lang('user_management');?></span>
            </a>
        </li>
        <li>
            <a href="<?php echo site_url('admin/order');?>" class="parent">
                <span><?php echo lang('order_management');?></span>
            </a>
            <ul>
                <li>
                    <a href="<?php echo site_url('admin/order/retail');?>">
                        <span><?php echo lang('retail');?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('admin/order/wholesale');?>">
                        <span><?php echo lang('wholesale');?></span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="<?php echo site_url('admin/report');?>">
                <span><?php echo lang('report');?></span>
            </a>
        </li>
    </ul>
</div>
