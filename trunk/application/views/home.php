<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- Accordion -->
    <div class="grid_4">
        <div id="site_menu" class="">
            <h4><?php 
                    echo anchor(
                        '#',
                        lang('monk')
                    );
                ?>
            </h4>
            <div>
                <?php
                    $list = array(
                        ''
                    );
                    $attr = array(
                        'id' => 'x'
                    );
                    echo ul($list, $attr);
                ?>
            </div>
            <h4><?php 
                    echo anchor(
                        '#',
                        lang('amulet')
                    );
                ?>
            </h4>
            <div>
                <?php
                    $list = array(
                        ''
                    );
                    $attr = array(
                        'id' => ''
                    );
                    echo ul($list, $attr);
                ?>
            </div>
            <h4><?php 
                    echo anchor(
                        '#',
                        lang('accessories')
                    );
                ?>
            </h4>
            <div>
                <?php
                    $list = array(
                        ''
                    );
                    $attr = array(
                        'id' => 'x'
                    );
                    echo ul($list, $attr);
                ?>
            </div>
        </div>
    </div>
<!-- End Accordion -->
<?php echo clear_div();?>
