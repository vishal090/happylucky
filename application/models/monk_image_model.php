<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once "my_datamapper.php";

/**
 * Monk_Image_Model 
 * 
 * @uses MY_DataMapper
 * @package 
 * @version $Id$
 * @copyright Copyright (C) 2011-2012 Jeong-Sheng, Lim, TARC. All rights reserved.
 * @author Jeong-Sheng, Lim <jslim89@gmail.com> 
 * @license GPL Version 3 {@link http://www.gnu.org/licenses/gpl.html}
 */
class Monk_Image_Model extends MY_DataMapper {
    var $table = "monk_image";
    var $has_one = array(
        'monk' => array(
            'class'         => 'monk_model',
            'other_field'   => 'monk',
            'join_other_as' => 'monk',
            'join_table'    => 'monk_image',
        ),
    );

    public function __construct($id = null) {
        parent::__construct($id);
    }
}



