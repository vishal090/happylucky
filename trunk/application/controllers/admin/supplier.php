<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Supplier 
 * 
 * @uses MY_Controller
 * @package 
 * @version $Id$
 * @copyright Copyright (C) 2011-2012 Jeong-Sheng, Lim, TARC. All rights reserved.
 * @author Jeong-Sheng, Lim <jslim89@gmail.com> 
 * @license GPL Version 3 {@link http://www.gnu.org/licenses/gpl.html}
 */
class Supplier extends MY_Controller {

    /**
     * __construct 
     * 
     * @return void
     */
    public function __construct() {
        parent::__construct();
        $this->lang->load('supplier');
        $this->load->Model('supplier_model');
    }

    public function index() {
        $suppliers = new Monk_Model();
        $this->vars['title'] = lang('supplier_management');
        $this->vars['suppliers'] = $suppliers;
        $this->load_view('admin/supplier/list', $this->vars);
    }
}
