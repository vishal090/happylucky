<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User 
 * 
 * @uses MY_Controller
 * @package 
 * @version $Id$
 * @copyright Copyright (C) 2011-2012 Jeong-Sheng, Lim, TARC. All rights reserved.
 * @author Jeong-Sheng, Lim <jslim89@gmail.com> 
 * @license GPL Version 3 {@link http://www.gnu.org/licenses/gpl.html}
 */
class User extends MY_Controller {

    /**
     * __construct 
     * 
     * @return void
     */
    public function __construct() {
        parent::__construct();
        $this->load->Model('user_model');
    }

    public function index() {
        $users = new User_Model();
        $this->vars['title'] = lang('user_management');
        $this->vars['users'] = $users;
        $this->load_view('admin/user/list', $this->vars);
    }
}
