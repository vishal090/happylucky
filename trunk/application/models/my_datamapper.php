<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * MY_DataMapper 
 * 
 * @uses DataMapper
 * @package 
 * @version $Id$
 * @copyright Copyright (C) 2011-2012 Jeong-Sheng, Lim. All rights reserved.
 * @author Jeong-Sheng, Lim <jslim89@gmail.com> 
 * @license 
 */
class MY_DataMapper extends DataMapper {

    /**
     * __construct 
     * 
     * @param mixed $id 
     * @access protected
     * @return void
     */
    function __construct($id = NULL) {
        parent::__construct($id);
    }
}
?>
