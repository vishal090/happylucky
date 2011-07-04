<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once "my_datamapper.php";

/**
 * Supplier_Model 
 * 
 * @uses MY_DataMapper
 * @package 
 * @version $Id$
 * @copyright Copyright (C) 2011-2012 Jeong-Sheng, Lim, TARC. All rights reserved.
 * @author Jeong-Sheng, Lim <jslim89@gmail.com> 
 * @license GPL Version 3 {@link http://www.gnu.org/licenses/gpl.html}
 */
class Supplier_Model extends MY_DataMapper {
    var $table = "supplier";
    var $has_one = array(
        'country'
    );
    var $has_many = array(
        'supplier_order'
    );

    public function __construct($id = null) {
        parent::__construct($id);
    }
}
