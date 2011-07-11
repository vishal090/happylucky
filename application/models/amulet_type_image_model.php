<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once "my_datamapper.php";

/**
 * Amulet_Type_Image_Model 
 * 
 * @uses MY_DataMapper
 * @package 
 * @version $Id$
 * @copyright Copyright (C) 2011-2012 Jeong-Sheng, Lim, TARC. All rights reserved.
 * @author Jeong-Sheng, Lim <jslim89@gmail.com> 
 * @license GPL Version 3 {@link http://www.gnu.org/licenses/gpl.html}
 */
class Amulet_Type_Image_Model extends MY_DataMapper {
    var $table = "amulet_type_image";
    var $has_one = array(
        'amulet_type' => array(
            'class'         => 'amulet_type_model',
            'other_field'   => 'amulet_type',
            'join_other_as' => 'amulet_type',
            'join_table'    => 'amulet_type_image',
        ),
    );

    public function __construct($id = null) {
        parent::__construct($id);
    }
}


