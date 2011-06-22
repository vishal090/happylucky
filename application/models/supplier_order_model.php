<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once "my_datamapper.php";

class Supplier_Order_Model extends MY_DataMapper {
    var $table = "supplier_order";

    public function __construct($id = null) {
        parent::__construct($id);
    }
}


