<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Ability 
 * 
 * @uses MY_Controller
 * @package 
 * @version $Id$
 * @copyright Copyright (C) 2011-2012 Jeong-Sheng, Lim, TARC. All rights reserved.
 * @author Jeong-Sheng, Lim <jslim89@gmail.com> 
 * @license GPL Version 3 {@link http://www.gnu.org/licenses/gpl.html}
 */
class Ability extends MY_Controller {

    /**
     * __construct 
     * 
     * @return void
     */
    public function __construct() {
        parent::__construct();
        $this->lang->load('ability');
        $this->load->Model('ability_model');
        $this->vars['extra_js'] = array('admin/ability.js');
    }

    public function index($page = 1) {
        $abilities = new Ability_Model();
        $abilities->get_paged($page);
        $this->vars['pagination'] = $abilities->get_pagination();
        $this->vars['title'] = lang('ability');
        $this->vars['abilities'] = $abilities;
        $this->load_view('admin/ability/list', $this->vars);
    }

    public function index_add_edit($id = false) {
        $this->vars['title'] = $id ? lang('ability_edit_ability')
                                   : lang('ability_add_new_ability');
        $this->vars['ability_id'] = $id;
        $this->load_view('admin/ability/index_add_edit', $this->vars);
    }

    public function images_add_edit($id) {
        $this->vars['title'] = lang('ability_edit_ability');
        $this->vars['ability_id'] = $id;
        $this->load->view('admin/ability/image', $this->vars);
    }

    public function add() {
        // Set an empty object as the ability variable is required
        $this->vars['ability'] = new Ability_Model();
        $this->load->view('admin/ability/add_edit', $this->vars);
    }

    public function edit($id) {
        $ability = new Ability_Model($id);
        $this->vars['ability'] = $ability;
        $this->load->view('admin/ability/add_edit', $this->vars);
    }

    public function save($id = null) {
        $ability = new Ability_Model($id);
        $ability->ability_name = get_post('ability_name');
        $ability->ability_desc = get_post('ability_desc');

        if($ability->save()) {
            redirect('admin/ability/index_add_edit/'.$ability->id);
        }
        else
            $this->load->view('admin/ability/add_edit', $this->vars);
    }

    public function delete($id) {
        $ability = new Ability_Model($id);
        $ability->delete();
    }
}
