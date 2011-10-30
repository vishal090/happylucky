<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Order_Detail_Model 
 * 
 * @uses DataMapper
 * @package 
 * @version $Id$
 * @copyright Copyright (C) 2011-2012 Jeong-Sheng, Lim, TARC. All rights reserved.
 * @author Jeong-Sheng, Lim <jslim89@gmail.com> 
 * @license GPL Version 3 {@link http://www.gnu.org/licenses/gpl.html}
 */
class Order_Detail_Model extends DataMapper {
    var $table = "order_detail";
    var $has_one = array(
        'customer_order' => array(
            'class'         => 'customer_order_model',
            'other_field'   => 'customer_order',
            'join_other_as' => 'order',
            'join_table'    => 'order_detail',
        ),
        'product' => array(
            'class'         => 'product_model',
            'other_field'   => 'product',
            'join_other_as' => 'product',
            'join_table'    => 'order_detail',
        ),
    );

    public function __construct($id = null) {
        parent::__construct($id);
    }
}

