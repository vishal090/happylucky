<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user');
    }

    public function index() {
        $this->load_view('user/register/index');
    }
}
