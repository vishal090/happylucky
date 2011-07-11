<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once "my_datamapper.php";

/**
 * Amulet_Model 
 * 
 * @uses MY_DataMapper
 * @package 
 * @version $Id$
 * @copyright Copyright (C) 2011-2012 Jeong-Sheng, Lim, TARC. All rights reserved.
 * @author Jeong-Sheng, Lim <jslim89@gmail.com> 
 * @license GPL Version 3 {@link http://www.gnu.org/licenses/gpl.html}
 */
class Amulet_Model extends MY_DataMapper {
    var $table = "amulet";
    var $has_one = array(
        'amulet_type' => array(
            'class'         => 'amulet_type_model',
            'other_field'   => 'amulet_type',
            'join_other_as' => 'amulet_type',
            'join_table'    => 'amulet',
        ),
        'monk' => array(
            'class'         => 'monk_model',
            'other_field'   => 'monk',
            'join_other_as' => 'monk',
            'join_table'    => 'amulet',
        ),
    );
    var $has_many = array(
        'amulet_ability' => array(
            'class'        => 'amulet_ability_model',
            'other_field'  => 'amulet_ability',
            'join_self_as' => 'amulet',
            'join_table'   => 'amulet_ability',
        ),
        'amulet_product' => array(
            'class'        => 'amulet_product_model',
            'other_field'  => 'amulet_product',
            'join_self_as' => 'amulet',
            'join_table'   => 'amulet_product',
        ),
    );

    public function __construct($id = null) {
        parent::__construct($id);
    }
}

