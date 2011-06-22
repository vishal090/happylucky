<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once "my_datamapper.php";

class Country_Model extends MY_DataMapper {
    var $table = "country";

    public function __construct($id = null) {
        parent::__construct($id);
    }

    public function search($q) {
        $country = new Country_Model();

        $criteria = array(
            'country_name' => $q,
            'iso_code_3' => $q,
        );
        $country->like($criteria);

        return $country;
    }
}



