<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once "my_datamapper.php";

class Cart_Model extends MY_DataMapper {
    var $table = 'cart';

    public function __construct($id = null) {
        parent::__construct($id);
    }
}


