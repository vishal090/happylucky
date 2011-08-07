<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Product 
 * 
 * @uses MY_Controller
 * @package 
 * @version $Id$
 * @copyright Copyright (C) 2011-2012 Jeong-Sheng, Lim, TARC. All rights reserved.
 * @author Jeong-Sheng, Lim <jslim89@gmail.com> 
 * @license GPL Version 3 {@link http://www.gnu.org/licenses/gpl.html}
 */
class Product extends MY_Controller {

    private $upload_handler;
    /**
     * __construct 
     * 
     * @return void
     */
    public function __construct() {
        parent::__construct();
        $this->lang->load('product');
        $this->load->model('product_model');
        $this->load->model('product_image_model');
        $this->load->library('ckeditor/ckeditor');
        $this->load->library('UploadHandler');
        $this->upload_handler = new UploadHandler();
        $this->upload_handler->init('product');
        $this->vars['extra_js'] = array('admin/product.js');
    }

    public function index($page = 1) {
        $products = new Product_Model();
        $products->get_paged($page);
        $this->vars['title'] = lang('product_management');
        $this->vars['products'] = $products;
        $this->vars['pagination'] = $products->get_pagination();
        $this->load_view('admin/product/list', $this->vars);
    }

    public function index_add_edit($id = false) {
        $this->vars['title'] = $id ? lang('product_edit_product')
                                   : lang('product_add_new_product');
        $this->vars['product_id'] = $id;
        $this->load_view('admin/product/index_add_edit', $this->vars);
    }

    public function images_add_edit($id) {
        $this->vars['title'] = lang('product_edit_product');
        $this->vars['product_id'] = $id;
        // $this->load->view('admin/product/image', $this->vars);
        $this->load->view('common/upload', $this->vars);
    }

    public function add() {
        // Set an empty object as the product variable is required
        $this->vars['product'] = new Product_Model();
        $this->vars['product']->is_amulet();

        // txt refer to textbox, this value will auto populate into
        // the textbox
        $this->vars['txt']['amulet']    = '';
        // txt refer to hidden input, this value will auto populate into
        // the hidden field
        $this->vars['hidden']['amulet_id']    = '';
        // cb refer to checkbox, this is to check whether the checkbox
        // is checked
        $this->vars['radio']['is_retail']    = false;
        $this->vars['radio']['is_wholesale'] = false;
        $this->load->view('admin/product/add_edit', $this->vars);
    }

    public function edit($id) {
        $product = new Product_Model($id);
        $product->is_amulet();

        $this->vars['product']      = $product;
        $this->vars['radio']        = array();

        if($product->product_type == Product_Model::TYPE_BOTH) 
            $this->vars['radio']['is_both'] = 1;
        else if($product->product_type == Product_Model::TYPE_RETAIL)
            $this->vars['radio']['is_retail']    = 1;
        else if($product->product_type == Product_Model::TYPE_WHOLESALE)
            $this->vars['radio']['is_wholesale'] = 1;
        $this->load->view('admin/product/add_edit', $this->vars);
    }

    public function save($id = null) {
        $product = new Product_Model($id);
        $product->product_code       = get_post('product_code');
        $product->product_name       = get_post('product_name');
        $product->product_desc       = get_post('product_desc');
        $product->standard_price     = get_post('standard_price');
        $product->quantity_available = get_post('quantity_available');
        $product->min_quantity       = get_post('min_quantity');
        $product->total_num_sold     = 0;
        $product->created_date       = time();
        $product->product_type       = get_post('type');

        if($product->save()) {
            redirect('admin/product/index_add_edit/'.$product->id);
        }
        else
            $this->load->view('admin/product/add_edit', $this->vars);
    }

    public function delete($id) {
        $product = new Product_Model($id);
        $product->delete();
    }

    public function upload() {
        header('Pragma: no-cache');
        header('Cache-Control: private, no-cache');
        header('Content-Disposition: inline; filename="files.json"');

        switch ($_SERVER['REQUEST_METHOD']) {
            case 'HEAD':
            case 'GET':
                $this->upload_handler->get();
                break;
            case 'POST': // For upload handler
                $ok = $this->upload_handler->post();
                if($ok) {
                    // Save to database
                    $product_img_model = new Product_Image_Model();
                    // $product_img_model->
                }
                break;
            // case 'DELETE':
                // $this->upload_handler->delete();
                // break;
            default:
                header('HTTP/1.0 405 Method Not Allowed');
        }
    }

    public function delete_file($file) {
        $this->upload_handler->delete($file);
    }
}
