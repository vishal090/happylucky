<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once "my_datamapper.php";

class Monk_Image_Model extends MY_DataMapper {
    var $table = "monk_image";

    public function __construct($id = null) {
        parent::__construct($id);
    }
}



