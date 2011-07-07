<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Order 
 * 
 * @uses MY_Controller
 * @package 
 * @version $Id$
 * @copyright Copyright (C) 2011-2012 Jeong-Sheng, Lim, TARC. All rights reserved.
 * @author Jeong-Sheng, Lim <jslim89@gmail.com> 
 * @license GPL Version 3 {@link http://www.gnu.org/licenses/gpl.html}
 */
class Order extends MY_Controller {

    /**
     * __construct 
     * 
     * @return void
     */
    public function __construct() {
        parent::__construct();
        $this->lang->load('order');
        $this->load->Model('customer_order_model');
    }

    public function index() {
        $orders = new Customer_Order_Model();
        $this->vars['title'] = lang('order_management');
        $this->vars['orders'] = $orders;
        $this->load_view('admin/order/list', $this->vars);
    }

    public function retail() {
        $this->vars['title'] = lang('order_retail_order');
        $this->load_view('admin/order/retail/list', $this->vars);
    }

    public function wholesale() {
        $this->vars['title'] = lang('order_wholesale_order');
        $this->load_view('admin/order/wholesale/list', $this->vars);
    }
}
