<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('member_model', 'user');
        $this->lang->load('user');
    }

    public function index() {
        $this->var['login']['page'] = "user/login";
        $this->var['extra_js'] = array('user/register.js');
        $this->load_view('user/register/index', $this->var);
    }

    public function save() {
        $user = new Member_Model();

        $user->username          = get_post('username');
        $user->first_name        = get_post('first_name');
        $user->last_name         = get_post('last_name');
        $user->address           = get_post('address');
        $user->town              = get_post('town');
        $user->postcode          = get_post('postcode');
        $user->city              = get_post('city');
        $user->state             = get_post('state');
        $user->country_id        = get_post('country_id');
        $user->contact_no        = get_post('contact_no');
        $user->email             = get_post('email');
        $user->password          = get_post('password');
        $user->confirm_password  = get_post('confirm_password');
        $user->registration_date = time();
        $user->age               = get_post('age');
        $user->sex               = get_post('sex');
        $user->user_type         = 'MEMBER';

        if($user->save()) {
            echo "successful";
        }
        else {
            echo "failed";
        }
    }
}
