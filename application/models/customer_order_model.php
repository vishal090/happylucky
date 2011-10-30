<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Customer_Order_Model 
 * 
 * @uses DataMapper
 * @package 
 * @version $Id$
 * @copyright Copyright (C) 2011-2012 Jeong-Sheng, Lim, TARC. All rights reserved.
 * @author Jeong-Sheng, Lim <jslim89@gmail.com> 
 * @license GPL Version 3 {@link http://www.gnu.org/licenses/gpl.html}
 */
class Customer_Order_Model extends DataMapper {
    var $table = "customer_order";
    var $has_one = array(
        'user' => array(
            'class'         => 'user_model',
            'other_field'   => 'user',
            'join_other_as' => 'user',
            'join_table'    => 'customer_order',
        ),
        'country' => array(
            'class'         => 'country_model',
            'other_field'   => 'country',
            'join_other_as' => 'country',
            'join_table'    => 'customer_order',
        ),
    );
    var $has_many = array(
        'order_detail' => array(
            'class'        => 'order_detail_model',
            'other_field'  => 'order_detail',
            'join_self_as' => 'order',
            'join_table'   => 'order_detail',
        ),
    );

    public function __construct($id = null) {
        parent::__construct($id);
    }
}

