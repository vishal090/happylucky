<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends DataMapper {

    var $table = "product";

    function __construct() {
        parent::__construct();
    }
}
