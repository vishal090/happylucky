<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once "my_datamapper.php";

class Cart_Item_Model extends MY_DataMapper {
    var $table = "cart_item";

    public function __construct($id = null) {
        parent::__construct($id);
    }
}



