<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once "my_datamapper.php";

class Product_Model extends MY_DataMapper {

    var $table = "product";

    function __construct($id = null) {
        parent::__construct($id);
    }
}
