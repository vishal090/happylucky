<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once "my_datamapper.php";

/**
 * Amulet_Type_Model 
 * 
 * @uses MY_DataMapper
 * @package 
 * @version $Id$
 * @copyright Copyright (C) 2011-2012 Jeong-Sheng, Lim, TARC. All rights reserved.
 * @author Jeong-Sheng, Lim <jslim89@gmail.com> 
 * @license GPL Version 3 {@link http://www.gnu.org/licenses/gpl.html}
 */
class Amulet_Type_Model extends MY_DataMapper {
    var $table = "amulet_type";
    var $has_many = array(
        'amulet_type_image' => array(
            'class'        => 'amulet_type_image_model',
            'other_field'  => 'amulet_type_image',
            'join_self_as' => 'amulet_type',
            'join_table'   => 'amulet_type_image',
        ),
        'amulet' => array(
            'class'        => 'amulet_model',
            'other_field'  => 'amulet',
            'join_self_as' => 'amulet_type',
            'join_table'   => 'amulet',
        ),
    );

    public function __construct($id = null) {
        parent::__construct($id);
    }
}


