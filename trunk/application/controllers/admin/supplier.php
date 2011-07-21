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
        $this->vars['extra_js'] = array('admin/supplier.js');
    }

    public function index($page = 1) {
        $suppliers = new Supplier_Model();
        $suppliers->get_paged($page);
        $this->vars['suppliers'] = $suppliers;
        $this->vars['pagination'] = $suppliers->get_pagination();
        $this->vars['title'] = lang('supplier_management');
        $this->load_view('admin/supplier/list', $this->vars);
    }

    public function add() {
        // Set an empty object as the supplier variable is required
        $this->vars['supplier'] = new Supplier_Model();
        $this->vars['title'] = lang('supplier_add_new_supplier');
        $this->load_view('admin/supplier/add_edit', $this->vars);
    }

    public function edit($id) {
        $supplier = new Supplier_Model($id);
        $this->vars['supplier'] = $supplier;
        $this->vars['title'] = lang('supplier_edit_supplier');
        $this->load_view('admin/supplier/add_edit', $this->vars);
    }

    public function save($id = null) {
        $this->load->model('country_model');
        $supplier = new Supplier_Model($id);
        $supplier->supplier_name = get_post('supplier_name');
        $supplier->contact_no    = get_post('contact_no');
        $supplier->email         = get_post('email');
        $supplier->address       = get_post('address');
        $supplier->town          = get_post('town');
        $supplier->postcode      = get_post('postcode');
        $supplier->state         = get_post('state');
        $supplier->city          = get_post('city');

        $country = new Country_Model(get_post('country_id'));

        if($supplier->save()) {
            redirect('admin/supplier/edit/'.$supplier->id);
        }
        else
            $this->load_view('admin/supplier/add_edit', $this->vars);
    }

    public function delete($id) {
        $supplier = new Supplier_Model($id);
        $supplier->delete();
    }
}
