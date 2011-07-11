<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once "my_datamapper.php";

/**
 * Product_Model 
 * 
 * @uses MY_DataMapper
 * @package 
 * @version $Id$
 * @copyright Copyright (C) 2011-2012 Jeong-Sheng, Lim, TARC. All rights reserved.
 * @author Jeong-Sheng, Lim <jslim89@gmail.com> 
 * @license GPL Version 3 {@link http://www.gnu.org/licenses/gpl.html}
 */
class Product_Model extends MY_DataMapper {

    const TYPE_BOTH      = 'BOTH';
    const TYPE_RETAIL    = 'RETAIL';
    const TYPE_WHOLESALE = 'WHOLESALE';

    var $table = "product";
    var $has_one = array(
        'amulet_product' => array(
            'class'         => 'amulet_product_model',
            'other_field'   => 'amulet_product',
            'join_other_as' => 'amulet_product',
            'join_table'    => 'product',
        ),
    );
    var $has_many = array(
        'product_image' => array(
            'class'        => 'product_image_model',
            'other_field'  => 'product_image',
            'join_self_as' => 'product',
            'join_table'   => 'product_image',
        ),
        'order_detail' => array(
            'class'        => 'order_detail_model',
            'other_field'  => 'order_detail',
            'join_self_as' => 'product',
            'join_table'   => 'order_detail',
        ),
    );
    var $product_image_url = "images/products/";

    /**
     * __construct 
     * 
     * @param mixed $id 
     * @access protected
     * @return void
     */
    function __construct($id = null) {
        parent::__construct($id);
    }

    /**
     * get_html_block 
     * 
     * @return string
     */
    public function get_html_block() {
        $html = "<div class='product-block'>";
        $html .= "<a href='".$this->_get_link()."'>";
        $html .= "<img src='' />";
        $html .= "</a>";
        $html .= "<table>";
        $html .= "<tr>";
        $html .= "<td>".lang('product_code')."</td>";
        $html .= "<td><a href='".$this->_get_link()."'>".$this->product_code."</a></td>";
        $html .= "</tr>";
        $html .= "<tr>";
        $html .= "<td>".lang('product_name')."</td>";
        $html .= "<td>".$this->product_name."</td>";
        $html .= "</tr>";

        if($this->product_type === 'WHOLESALE') {
            $html .= "<tr>";
            $html .= "<td>".lang('product_price')."</td>";
            $html .= "<td>".$this->standard_price."</td>";
            $html .= "</tr>";
        }

        $html .= "</table>";
        $html .= "</div>";

        return $html;
    }

    private function _get_link() {
        $this->_get_curr_url() . "/" . $this->id;
    }

    public function is_amulet() {
        return !empty($this->amulet_product_model->id);
    }
}
