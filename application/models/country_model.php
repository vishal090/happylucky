<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once "my_datamapper.php";

/**
 * Country_Model 
 * 
 * @uses MY_DataMapper
 * @package 
 * @version $Id$
 * @copyright Copyright (C) 2011-2012 Jeong-Sheng, Lim, TARC. All rights reserved.
 * @author Jeong-Sheng, Lim <jslim89@gmail.com> 
 * @license GPL Version 3 {@link http://www.gnu.org/licenses/gpl.html}
 */
class Country_Model extends MY_DataMapper {
    var $table = "country";
    var $has_many = array(
        'supplier',
        'user',
        'customer_order'
    );

    public function __construct($id = null) {
        parent::__construct($id);
    }

    public function search($q) {
        $this->ilike('country_name', $q);
        $this->or_ilike('iso_code_3', $q)->get();

        $country_array = $this->to_array($this);

        $filtered_country = array();
        $i = 0;
        foreach ($country_array as $c) {
            $filtered_country[$i]['country_id'] = $c['id'];
            $filtered_country[$i]['country_name'] = $c['country_name'];
            $i++;
        }

        return $filtered_country;
    }

    public function to_array($country) {
        $array = array();
        foreach ( $country as $c ) {
            $temp = array();
            $temp['id']                = $c->id;
            $temp['country_name']      = $c->country_name;
            $temp['iso_code_2']        = $c->iso_code_2;
            $temp['iso_code_3']        = $c->iso_code_3;
            $temp['postcode_required'] = $c->postcode_required;
            $array[] = $temp;
        }
        return $array;
    }
}
