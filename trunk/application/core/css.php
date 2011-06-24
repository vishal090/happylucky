<?php

// include file
$styles = array(
    '960/960.css',
    '960/reset.css',
    '960/text.css',
    'jquery-ui/jquery-ui-1.8.13.custom.css',
    'lightbox/jquery.lightbox-0.5.css',
    'top-menu/menu.css',
    'tipsy/tipsy.css',
    'login/front.css',
    'main.css',
);

foreach ($styles as $css)
    echo link_tag('common/style/' . $css) . "\n";
