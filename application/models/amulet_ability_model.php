<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Amulet_Ability_Model 
 * 
 * @uses DataMapper
 * @package 
 * @version $Id$
 * @copyright Copyright (C) 2011-2012 Jeong-Sheng, Lim, TARC. All rights reserved.
 * @author Jeong-Sheng, Lim <jslim89@gmail.com> 
 * @license GPL Version 3 {@link http://www.gnu.org/licenses/gpl.html}
 */
class Amulet_Ability_Model extends DataMapper {
    var $table = "amulet_ability";
    var $has_one = array(
        'ability' => array(
            'class'         => 'ability_model',
            'other_field'   => 'ability',
            'join_other_as' => 'ability',
            'join_table'    => 'amulet_ability',
        ),
        'amulet' => array(
            'class'         => 'amulet_model',
            'other_field'   => 'amulet',
            'join_other_as' => 'amulet',
            'join_table'    => 'amulet_ability',
        ),
    );

    public function __construct($id = null) {
        parent::__construct($id);
    }
}
