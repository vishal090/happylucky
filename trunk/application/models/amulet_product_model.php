<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once "my_datamapper.php";

/**
 * Amulet_Product_Model 
 * 
 * @uses MY_DataMapper
 * @package 
 * @version $Id$
 * @copyright Copyright (C) 2011-2012 Jeong-Sheng, Lim, TARC. All rights reserved.
 * @author Jeong-Sheng, Lim <jslim89@gmail.com> 
 * @license GPL Version 3 {@link http://www.gnu.org/licenses/gpl.html}
 */
class Amulet_Product_Model extends MY_DataMapper {
    var $table = "amulet_product";

    public function __construct($id = null) {
        parent::__construct($id);
    }
}


