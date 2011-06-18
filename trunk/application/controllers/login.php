<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Login 
 * 
 * @uses MY
 * @uses _Controller
 * @package 
 * @version $Id$
 * @copyright Copyright (C) 2011-2012 Jeong-Sheng, Lim. All rights reserved.
 * @author Jeong-Sheng, Lim <jslim89@gmail.com> 
 * @license 
 */
class Login extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->lang->load('login');
    }

    /**
     * Process Login
     * 
     * @return void
     */
	public function index()
	{
        $user = new User();
        $user->username = get_post('username');
        $user->password = get_post('password');

        if($user->save()) {
            echo "success";
        }
        redirect('welcome/index');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/login.php */
