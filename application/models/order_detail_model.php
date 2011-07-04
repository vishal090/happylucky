<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once "my_datamapper.php";

/**
 * Order_Detail_Model 
 * 
 * @uses MY_DataMapper
 * @package 
 * @version $Id$
 * @copyright Copyright (C) 2011-2012 Jeong-Sheng, Lim, TARC. All rights reserved.
 * @author Jeong-Sheng, Lim <jslim89@gmail.com> 
 * @license GPL Version 3 {@link http://www.gnu.org/licenses/gpl.html}
 */
class Order_Detail_Model extends MY_DataMapper {
    var $table = "order_detail";
    var $has_one = array(
        'customer_order',
        'product'
    );

    public function __construct($id = null) {
        parent::__construct($id);
    }
}

