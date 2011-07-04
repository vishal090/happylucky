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

    var $table = "product";
    var $has_one = array(
        'amulet_product'
    );
    var $has_many = array(
        'product_image',
        'order_detail'
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
        $html .= "<a href='".$this->_get_url()."'>";
        $html .= "<img src='' />";
        $html .= "</a>";
        $html .= "<table>";
        $html .= "<tr>";
        $html .= "<td>".lang('product_code')."</td>";
        $html .= "<td><a href='".$this->_get_url()."'>".$this->product_code."</a></td>";
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

    private function _get_url() {
        return base_url()."product/view/".$this->product-id;
    }
}
