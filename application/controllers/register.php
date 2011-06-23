<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user_model', 'user');
        $this->lang->load('user');
    }

    public function index() {
        $this->var['login']['page'] = "user/login";
        $this->var['extra_js'] = array('user/register.js');
        $this->load_view('user/register/index', $this->var);
    }
}
