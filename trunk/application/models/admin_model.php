<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Admin_Model 
 * 
 * @uses User_Model
 * @package 
 * @version $Id$
 * @copyright Copyright (C) 2011-2012 Jeong-Sheng, Lim, TARC. All rights reserved.
 * @author Jeong-Sheng, Lim <jslim89@gmail.com> 
 * @license GPL Version 3 {@link http://www.gnu.org/licenses/gpl.html}
 */
class Admin_Model extends User_Model {

    public function __construct($id = NULL) {
        parent::__construct($id);
    }

    /**
     * Login as Admin
     * 
     * @return boolean
     */
    public function login() {
        return parent::login('ADMIN');
    }
}
?>
