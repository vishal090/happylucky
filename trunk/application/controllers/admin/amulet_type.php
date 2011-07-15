<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Amulet_Type 
 * 
 * @uses MY_Controller
 * @package 
 * @version $Id$
 * @copyright Copyright (C) 2011-2012 Jeong-Sheng, Lim, TARC. All rights reserved.
 * @author Jeong-Sheng, Lim <jslim89@gmail.com> 
 * @license GPL Version 3 {@link http://www.gnu.org/licenses/gpl.html}
 */
class Amulet_Type extends MY_Controller {

    /**
     * __construct 
     * 
     * @return void
     */
    public function __construct() {
        parent::__construct();
        $this->lang->load('amulet_type');
        $this->load->Model('amulet_type_model');
        $this->vars['extra_js'] = array('admin/amulet_type.js');
    }

    public function index($page = 1) {
        $amulet_types = new Amulet_Type_Model();
        $amulet_types->get_paged($page);
        $this->vars['pagination'] = $amulet_types->get_pagination();
        $this->vars['title'] = lang('amulet_type');
        $this->vars['amulet_types'] = $amulet_types;
        $this->load_view('admin/amulet_type/list', $this->vars);
    }

    public function index_add_edit($id = false) {
        $this->vars['title'] = $id ? lang('amulet_type_edit_amulet_type')
                                   : lang('amulet_type_add_new_amulet_type');
        $this->vars['amulet_type_id'] = $id;
        $this->load_view('admin/amulet_type/index_add_edit', $this->vars);
    }

    public function images_add_edit($id) {
        $this->vars['title'] = lang('amulet_type_edit_amulet_type');
        $this->vars['amulet_type_id'] = $id;
        $this->load->view('admin/amulet_type/image', $this->vars);
    }

    public function add() {
        // Set an empty object as the amulet_type variable is required
        $this->vars['amulet_type'] = new Amulet_Type_Model();
        $this->load->view('admin/amulet_type/add_edit', $this->vars);
    }

    public function edit($id) {
        $amulet_type = new Amulet_Type_Model($id);
        $this->vars['amulet_type'] = $amulet_type;
        $this->load->view('admin/amulet_type/add_edit', $this->vars);
    }

    public function save($id = null) {
        $amulet_type = new Amulet_Type_Model($id);
        $amulet_type->amulet_type_name = get_post('amulet_type_name');
        $amulet_type->amulet_desc      = get_post('amulet_type_desc');

        if($amulet_type->save()) {
            redirect('admin/amulet_type/index_add_edit/'.$amulet_type->id);
        }
        else
            $this->load->view('admin/amulet_type/add_edit', $this->vars);
    }

    public function delete($id) {
        $amulet_type = new Amulet_Type_Model($id);
        $amulet_type->delete();
    }
}
