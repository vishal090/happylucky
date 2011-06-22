<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once "my_datamapper.php";

class Amulet_Product_Model extends MY_DataMapper {
    var $table = "amulet_product";

    public function __construct($id = null) {
        parent::__construct($id);
    }
}


