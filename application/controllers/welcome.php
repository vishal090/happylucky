<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Welcome 
 * 
 * @uses MY
 * @uses _Controller
 * @package 
 * @version $Id$
 * @copyright Copyright (C) 2011-2012 Jeong-Sheng, Lim. All rights reserved.
 * @author Jeong-Sheng, Lim <jslim89@gmail.com> 
 * @license 
 */
class Welcome extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('product_model', 'product');
        $this->lang->load('user');
    }

    function index() {
        $vars['title'] = lang('home');
        $vars['login']['page'] = "login/index";
        $this->load_view('home', $vars);
    }
}
