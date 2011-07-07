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
    }

    public function index() {
        $amulets = new Amulet_Model();
        $this->vars['title'] = lang('amulet_management');
        $this->vars['amulets'] = $amulets;
        $this->load_view('admin/amulet/list', $this->vars);
    }
}
