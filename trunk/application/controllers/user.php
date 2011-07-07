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

    function __construct() {
        parent::__construct();
        $this->load->model('member_model', 'user');
    }

    public function index() {
        $this->load_view();
    }

    public function register() {
        $this->vars['title'] = lang('user_register');
        $this->vars['extra_js'] = array('user/register.js');
        $this->load_view('user/register/index', $this->vars);
    }

    public function save() {
        $u = new Member_Model();

        $u->first_name        = get_post('first_name');
        $u->last_name         = get_post('last_name');
        $u->address           = get_post('address');
        $u->town              = get_post('town');
        $u->postcode          = get_post('postcode');
        $u->city              = get_post('city');
        $u->state             = get_post('state');
        $u->country_id        = get_post('country_id');
        $u->contact_no        = get_post('contact_no');
        $u->email             = get_post('email');
        $u->password          = get_post('password');
        $u->confirm_password  = get_post('confirm_password');
        $u->registration_date = time();
        $u->age               = get_post('age');
        $u->sex               = get_post('sex');
        $u->user_type         = 'MEMBER';

        if($u->save()) {
            echo "successful";
        }
        else {
            echo "failed";
        }
    }
}
