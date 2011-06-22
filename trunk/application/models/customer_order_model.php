<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once "my_datamapper.php";

class Customer_Order_Model extends MY_DataMapper {
    var $table = "customer_order";

    public function __construct($id = null) {
        parent::__construct($id);
    }
}

