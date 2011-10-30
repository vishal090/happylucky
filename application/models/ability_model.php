<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Ability_Model 
 * 
 * @uses DataMapper
 * @package 
 * @version $Id$
 * @copyright Copyright (C) 2011-2012 Jeong-Sheng, Lim, TARC. All rights reserved.
 * @author Jeong-Sheng, Lim <jslim89@gmail.com> 
 * @license GPL Version 3 {@link http://www.gnu.org/licenses/gpl.html}
 */
class Ability_Model extends DataMapper {
    var $table = "ability";
    var $has_many = array(
        'amulet_ability' => array(
            'class'        => 'amulet_ability_model',
            'other_field'  => 'amulet_ability',
            'join_self_as' => 'ability',
            'join_table'   => 'amulet_ability',
        )
    );

    public function __construct($id = null) {
        parent::__construct($id);
    }
}
