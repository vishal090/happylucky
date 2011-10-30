<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Monk_Model extends DataMapper {
    var $table = "monk";
    var $has_many = array(
        'monk_image' => array(
            'class'        => 'monk_image_model',
            'other_field'  => 'monk_image',
            'join_self_as' => 'monk',
            'join_table'   => 'monk_image',
        ),
        'amulet' => array(
            'class'        => 'amulet_model',
            'other_field'  => 'amulet',
            'join_self_as' => 'monk',
            'join_table'   => 'amulet',
        ),
    );

    public function __construct($id = null) {
        parent::__construct($id);
    }

    public function ajax_search($q) {
        $this->search($q);
        return $this->get_array();
    }
}
