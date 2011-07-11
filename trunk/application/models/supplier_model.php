<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once "my_datamapper.php";

/**
 * Supplier_Model 
 * 
 * @uses MY_DataMapper
 * @package 
 * @version $Id$
 * @copyright Copyright (C) 2011-2012 Jeong-Sheng, Lim, TARC. All rights reserved.
 * @author Jeong-Sheng, Lim <jslim89@gmail.com> 
 * @license GPL Version 3 {@link http://www.gnu.org/licenses/gpl.html}
 */
class Supplier_Model extends MY_DataMapper {
    var $table = "supplier";
    var $has_one = array(
        'country' => array(
            'class'         => 'country_model',
            'other_field'   => 'country',
            'join_other_as' => 'country',
            'join_table'    => 'supplier',
        ),
    );
    var $has_many = array(
        'supplier_order' => array(
            'class'        => 'supplier_order_model',
            'other_field'  => 'supplier_order',
            'join_self_as' => 'supplier',
            'join_table'   => 'supplier_order',
        ),
    );

    public function __construct($id = null) {
        parent::__construct($id);
    }
}

