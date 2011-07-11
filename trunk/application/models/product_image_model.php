<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once "my_datamapper.php";

/**
 * Product_Image_Model 
 * 
 * @uses MY_DataMapper
 * @package 
 * @version $Id$
 * @copyright Copyright (C) 2011-2012 Jeong-Sheng, Lim, TARC. All rights reserved.
 * @author Jeong-Sheng, Lim <jslim89@gmail.com> 
 * @license GPL Version 3 {@link http://www.gnu.org/licenses/gpl.html}
 */
class Product_Image_Model extends MY_DataMapper {
    var $table = "product_image";
    var $has_one = array(
        'product' => array(
            'class'         => 'product_model',
            'other_field'   => 'product',
            'join_other_as' => 'product',
            'join_table'    => 'product_image',
        ),
    );

    public function __construct($id = null) {
        parent::__construct($id);
    }

    public function get_admin_html() {
        $html = "<div class='center'>\n";
        $html .= "<span class='image-title'>".$this->image_name."</span>\n";
        $html .= img(array(
            'src' => $this->url,
            'alt' => $this->alt,
            'class' => '',
            'width' => '50',
            'height' => '50',
            'title' => $this->image_desc
        ));
        $html .= "\n</div>";
        return $html;
    }
}
