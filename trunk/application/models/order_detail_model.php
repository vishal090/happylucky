<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once "my_datamapper.php";

class Order_Detail_Model extends MY_DataMapper {
    var $table = "order_detail";

    public function __construct($id = null) {
        parent::__construct($id);
    }
}

