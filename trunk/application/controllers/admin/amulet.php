<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Amulet 
 * 
 * @uses MY_Controller
 * @package 
 * @version $Id$
 * @copyright Copyright (C) 2011-2012 Jeong-Sheng, Lim, TARC. All rights reserved.
 * @author Jeong-Sheng, Lim <jslim89@gmail.com> 
 * @license GPL Version 3 {@link http://www.gnu.org/licenses/gpl.html}
 */
class Amulet extends MY_Controller {

    /**
     * __construct 
     * 
     * @return void
     */
    public function __construct() {
        parent::__construct();
        $this->lang->load('amulet');
        $this->load->Model('amulet_model');
        $this->vars['extra_js'] = array('admin/monk.js');
    }

    public function index($page = 1) {
        $amulets = new Amulet_Model();
        $amulets->get_paged($page);
        $this->vars['pagination'] = $amulets->get_pagination();
        $this->vars['title'] = lang('amulet_management');
        $this->vars['amulets'] = $amulets;
        $this->load_view('admin/amulet/list', $this->vars);
    }

    public function index_add_edit($id = false) {
        $this->vars['title'] = $id ? lang('amulet_edit_amulet')
                                   : lang('amulet_add_new_amulet');
        $this->vars['amulet_id'] = $id;
        $this->load_view('admin/amulet/index_add_edit', $this->vars);
    }

    public function images_add_edit($id) {
        $this->vars['title'] = lang('amulet_edit_amulet');
        $this->vars['amulet_id'] = $id;
        $this->load->view('admin/amulet/image', $this->vars);
    }

    public function add() {
        // Set an empty object as the amulet variable is required
        $this->vars['amulet'] = new Amulet_Model();
        $this->load->view('admin/amulet/add_edit', $this->vars);
    }

    public function edit($id) {
        $amulet = new Amulet_Model($id);
        $this->vars['amulet'] = $amulet;
        $this->load->view('admin/amulet/add_edit', $this->vars);
    }

    public function save($id = null) {
        $amulet = new Amulet_Model($id);
        $amulet->amulet_code    = get_post('amulet_code');
        $amulet->amulet_name    = get_post('amulet_name');
        $amulet->amulet_desc    = get_post('amulet_desc');
        $amulet->produced_date  = get_post('produced_date');
        $amulet->produced_place = get_post('produced_place');

        $monk        = new Monk_Model(get_post('monk_id'));
        $amulet_type = new Amulet_Type_Model(get_post('amulet_type_id'));

        if($amulet->save(array($monk, $amulet_type))) {
            redirect('admin/amulet/index_add_edit/'.$amulet->id);
        }
        else
            $this->load->view('admin/amulet/add_edit', $this->vars);
    }

    public function delete($id) {
        $amulet = new Amulet_Model($id);
        $amulet->delete();
    }
}
