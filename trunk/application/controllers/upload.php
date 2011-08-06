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

    protected $upload_url;
    protected $upload_dir;
    protected $script_url;
    protected $upload_handler;
   
    public function __construct() {
        parent::__construct();
        $this->load->library('UploadHandler');

        $this->script_url = base_url()."upload";
        $this->upload_dir = BASEPATH."../images/products/";
        $this->upload_url = dirname($_SERVER['PHP_SELF']).'/images/products/';
        $this->upload_options = array(
            'script_url' => $this->script_url,
            'upload_dir' => $this->upload_dir,
            'upload_url' => $this->upload_url,
            'image_versions' => array(
                'thumbnail' => array(
                    'upload_dir' => $this->upload_dir.'thumbnails/',
                    'upload_url' => $this->upload_url.'thumbnails/',
                    'max_width' => 80,
                    'max_height' => 80
                )
            )
        );
        $this->upload_handler = new UploadHandler($this->upload_options);
    }

    public function index() {

        header('Pragma: no-cache');
        header('Cache-Control: private, no-cache');
        header('Content-Disposition: inline; filename="files.json"');

        switch ($_SERVER['REQUEST_METHOD']) {
            case 'HEAD':
            case 'GET':
                $this->upload_handler->get();
                break;
            case 'POST':
                $this->upload_handler->post();
                break;
            case 'DELETE':
                $this->upload_handler->delete();
                break;
            default:
                header('HTTP/1.0 405 Method Not Allowed');
        }
    }

    public function delete($file) {
        $this->upload_handler->delete($file);
    }
}
