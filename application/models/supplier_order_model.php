<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once "my_datamapper.php";

/**
 * Supplier_Order_Model 
 * 
 * @uses MY_DataMapper
 * @package 
 * @version $Id$
 * @copyright Copyright (C) 2011-2012 Jeong-Sheng, Lim, TARC. All rights reserved.
 * @author Jeong-Sheng, Lim <jslim89@gmail.com> 
 * @license GPL Version 3 {@link http://www.gnu.org/licenses/gpl.html}
 */
class Supplier_Order_Model extends MY_DataMapper {
    var $table = "supplier_order";
    var $has_one = array(
        'supplier' => array(
            'class'         => 'supplier_model',
            'other_field'   => 'supplier',
            'join_other_as' => 'supplier',
            'join_table'    => 'supplier_order',
        ),
    );
    var $has_many = array(
        'supplier_order_detail' => array(
            'class'        => 'supplier_order_detail_model',
            'other_field'  => 'supplier_order_detail',
            'join_self_as' => 'supplier_order',
            'join_table'   => 'supplier_order_detail',
        ),
    );

    public function __construct($id = null) {
        parent::__construct($id);
    }
}


