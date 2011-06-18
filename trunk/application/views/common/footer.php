
    </div>
    <!-- End Page Content -->
    <?php echo clear_div();?>

<!-- Footer -->

<div class="legal">
    <div class="copyright">
        <div class="license"><a rel="license" href="/"><img alt="Creative Commons License" style="border-width:0" src="<?= str_replace('index.php/','',site_url('img/cc.png')) ?>" /></a></div>
        <div class="licenseInfo">
            &copy; <?php echo lang('all_right_reserved');?>
            <a href=#>Js Lim</a>
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
<!-- End Footer -->

<?php echo clear_div();?>
</div>
<!-- End container_16 -->
</body>
</html>

