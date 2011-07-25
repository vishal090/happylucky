<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Upload 
 * 
 * @uses MY_Controller
 * @package 
 * @version $Id$
 * @copyright Copyright (C) 2011-2012 Jeong-Sheng, Lim, TARC. All rights reserved.
 * @author Jeong-Sheng, Lim <jslim89@gmail.com> 
 * @license GPL Version 3 {@link http://www.gnu.org/licenses/gpl.html}
 */
class Upload extends MY_Controller {
   
    public function __construct() {
        parent::__construct();
        $this->load->library('upload_handler');
    }

    public function index() {
        $upload_handler = new UploadHandler();

        header('Pragma: no-cache');
        header('Cache-Control: private, no-cache');
        header('Content-Disposition: inline; filename="files.json"');

        switch ($_SERVER['REQUEST_METHOD']) {
            case 'HEAD':
            case 'GET':
                $upload_handler->get();
                break;
            case 'POST':
                $upload_handler->post();
                break;
            case 'DELETE':
                $upload_handler->delete();
                break;
            default:
                header('HTTP/1.0 405 Method Not Allowed');
        }
    }
}
