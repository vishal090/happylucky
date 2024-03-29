<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Country_Model 
 * 
 * @uses DataMapper
 * @package 
 * @version $Id$
 * @copyright Copyright (C) 2011-2012 Jeong-Sheng, Lim, TARC. All rights reserved.
 * @author Jeong-Sheng, Lim <jslim89@gmail.com> 
 * @license GPL Version 3 {@link http://www.gnu.org/licenses/gpl.html}
 */
class Country_Model extends DataMapper {
    var $table = "country";
    var $has_many = array(
        'supplier' => array(
            'class'        => 'supplier_model',
            'other_field'  => 'supplier',
            'join_self_as' => 'country',
            'join_table'   => 'supplier',
        ),
        'user' => array(
            'class'        => 'user_model',
            'other_field'  => 'user',
            'join_self_as' => 'country',
            'join_other_as' => 'user',
            'join_table'   => 'user',
        ),
        'customer_order' => array(
            'class'        => 'customer_order_model',
            'other_field'  => 'customer_order',
            'join_self_as' => 'country',
            'join_table'   => 'customer_order',
        ),
    );

    public function __construct($id = null) {
        parent::__construct($id);
    }

    public function ajax_search($q) {
        $this->search($q);
        return $this->get_array();
    }
}
