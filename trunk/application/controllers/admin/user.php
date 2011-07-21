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
        $this->lang->load('user');
        $this->load->Model('user_model');
        $this->vars['extra_js'] = array('admin/user.js');
    }

    public function index($page = 1) {
        $users = new User_Model();
        $users->get_paged($page);
        $this->vars['pagination'] = $users->get_pagination();
        $this->vars['title'] = lang('user_management');
        $this->vars['users'] = $users;
        $this->load_view('admin/user/list', $this->vars);
    }

    public function add() {
        // Set an empty object as the user variable is required
        $this->vars['user'] = new User_Model();
        $this->vars['title'] = lang('user_add_new_user');
        $this->load_view('admin/user/add_edit', $this->vars);
    }

    public function edit($id) {
        $user = new User_Model($id);
        $this->vars['user'] = $user;
        $this->vars['title'] = lang('user_edit_user');
        $this->load_view('admin/user/add_edit', $this->vars);
    }

    public function save($id = null) {
        $user = new User_Model($id);
        $user->first_name        = get_post('first_name');
        $user->last_name         = get_post('last_name');
        $user->address           = get_post('address');
        $user->town              = get_post('town');
        $user->postcode          = get_post('postcode');
        $user->city              = get_post('city');
        $user->state             = get_post('state');
        $user->contact_no        = get_post('contact_no');
        $user->email             = get_post('email');
        $user->password          = get_post('password');
        $user->registration_date = strtotime(get_post('registration_date'));
        $user->age               = get_post('age');
        $user->sex               = get_post('sex');
        $user->security_question = get_post('security_question');
        $user->security_answer   = get_post('security_answer');

        $country = new Country_Model(get_post('country_id'));

        if($user->save()) {
            redirect('admin/user/edit/'.$user->id);
        }
        else {
            $this->vars['user'] = $user;
            $this->load_view('admin/user/add_edit', $this->vars);
        }
    }

    public function delete($id) {
        $user = new User_Model($id);
        $user->delete();
    }
}
