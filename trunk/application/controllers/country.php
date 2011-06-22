<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Country 
 * 
 * @uses MY_Controller
 * @package 
 * @version $Id$
 * @copyright Copyright (C) 2010-2011 John Doe. All rights reserved.
 * @author John Doe <johndoe@gmail.com> 
 * @license GPL Version 3 {@link http://www.gnu.org/licenses/gpl.html}
 */
class Country extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('country_model', 'country');
    }

    /**
     * Process Login
     * 
     * @return void
     */
	public function index()
	{
	}

    /**
     * Search for matches country
     * 
     * @return void
     */
    public function search() {
        $q = get_post('term');
        $country = $this->country->search($q);
        echo json_encode($country);
    }
}

/* End of file country.php */
/* Location: ./application/controllers/country.php */
