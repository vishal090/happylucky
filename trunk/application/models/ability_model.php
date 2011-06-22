<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once "my_datamapper.php";

class Ability_Model extends MY_DataMapper {
    var $table = "ability";
    var $validation;

    public function __construct($id = null) {
        parent::__construct($id);
        $this->validation;
    }
}
