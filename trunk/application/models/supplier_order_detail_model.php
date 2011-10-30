<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Supplier_Order_Detail_Model 
 * 
 * @uses DataMapper
 * @package 
 * @version $Id$
 * @copyright Copyright (C) 2011-2012 Jeong-Sheng, Lim, TARC. All rights reserved.
 * @author Jeong-Sheng, Lim <jslim89@gmail.com> 
 * @license GPL Version 3 {@link http://www.gnu.org/licenses/gpl.html}
 */
class Supplier_Order_Detail_Model extends DataMapper {
    var $table = "supplier_order_detail";
    var $has_one = array(
        'supplier_order' => array(
            'class'         => 'supplier_order_model',
            'other_field'   => 'supplier_order',
            'join_other_as' => 'supplier_order',
            'join_table'    => 'supplier_order_detail',
        ),
        'product' => array(
            'class'         => 'product_model',
            'other_field'   => 'product',
            'join_other_as' => 'product',
            'join_table'    => 'supplier_order_detail',
        ),
    );

    public function __construct($id = null) {
        parent::__construct($id);
    }
}


