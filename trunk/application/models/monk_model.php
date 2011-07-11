<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once "my_datamapper.php";

class Monk_Model extends MY_DataMapper {
    var $table = "monk";
    var $has_many = array(
        'monk_image' => array(
            'class'        => 'monk_image_model',
            'other_field'  => 'monk_image',
            'join_self_as' => 'monk',
            'join_table'   => 'monk_image',
        ),
        'amulet' => array(
            'class'        => 'amulet_model',
            'other_field'  => 'amulet',
            'join_self_as' => 'monk',
            'join_table'   => 'amulet',
        ),
    );

    public function __construct($id = null) {
        parent::__construct($id);
    }
}


