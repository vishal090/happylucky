<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Welcome 
 * 
 * @uses MY_Controller
 * @package 
 * @version $Id$
 * @copyright Copyright (C) 2011-2012 Jeong-Sheng, Lim, TARC. All rights reserved.
 * @author Jeong-Sheng, Lim <jslim89@gmail.com> 
 * @license GPL Version 3 {@link http://www.gnu.org/licenses/gpl.html}
 */
class Welcome extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        if(get_session('user_id'))
            redirect('admin/dashboard');
        else {
            $this->load->view('admin/welcome/login');
        }
    }

    function login() {
        if(count($_POST)) {
            $this->load->model('admin_model', 'user');
            $user = new Admin_Model();

            $user->email    = get_post('email');
            $user->password = get_post('password');

            $success = $user->login();
            if($success) {
                $session = array(
                    'user_id'   => $user->user_id,
                    'password'  => $user->password,
                    'user_type' => 'ADMIN'
                );
                $this->session->set_userdata($session);
                redirect('admin/dashboard');
            }
            else {
                $this->session->set_flashdata('login_error', $user->error->login);
                redirect('admin');
            }
        }
        redirect('admin');
    }

    function logout() {
        $this->session->sess_destroy();
        redirect('admin');
    }
}
