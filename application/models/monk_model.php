<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once "my_datamapper.php";

class Monk_Model extends MY_DataMapper {
    var $table = "monk";
    var $has_many = array(
        'monk_image',
        'amulet'
    );

    public function __construct($id = null) {
        parent::__construct($id);
    }
}


