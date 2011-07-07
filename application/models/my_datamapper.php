<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * MY_DataMapper 
 * 
 * @uses DataMapper
 * @package 
 * @version $Id$
 * @copyright Copyright (C) 2011-2012 Jeong-Sheng, Lim, TARC. All rights reserved.
 * @author Jeong-Sheng, Lim <jslim89@gmail.com> 
 * @license GPL Version 3 {@link http://www.gnu.org/licenses/gpl.html}
 */
class MY_DataMapper extends DataMapper {

    var $ci;

    /**
     * __construct 
     * 
     * @param mixed $id 
     * @access protected
     * @return void
     */
    function __construct($id = NULL) {
        parent::__construct($id);
        $this->ci =& get_instance();
    }

    /**
     * A general search which pass in only one value and compare with all 
     * the fields. 
     * No result will be returned, you must manually call a get() function.
     * 
     * @param mixed $q 
     * @return void
     */
    public function search($q) {
        foreach ($this->fields as $field) {
            $this->or_ilike($field, $q);
        }
    }

    /**
     * Get the current URL 
     * 
     * @return string
     */
    protected function _get_curr_url() {
        return base_url().$this->ci->router->directory.
               $this->ci->router->class."/".$this->ci->router->method;
    }

    /**
     * This function can be called only when get_paged is called. 
     * 
     * @param int $page_size (Default is 10)
     * @return void
     */
    public function get_pagination($page_size = 10) {
        $this->load->library('MY_Pagination');
        $conf = array(
            'total_rows' => $this->paged->total_rows,
            'base_url' => $this->_get_curr_url(),
            'per_page' => $page_size
        );
        $pagination = new MY_Pagination($conf);
        return $pagination;
    }

	/**
	 * Convenience method that runs a query based on pages.
	 * This object will have two new values, $query_total_pages and
	 * $query_total_rows, which can be used to determine how many pages and
	 * how many rows are available in total, respectively.
	 *
	 * @param	int $page Page (1-based) to start on, or row (0-based) to start on
	 * @param	int $page_size Number of rows in a page
	 * @param	bool $page_num_by_rows When TRUE, $page is the starting row, not the starting page
	 * @param	bool $iterated Internal Use Only
	 * @return	DataMapper Returns self for method chaining.
	 */
    public function get_paged($page = 1, $page_size = 10, 
                              $page_num_by_rows = TRUE, 
                              $info_object = 'paged', $iterated = FALSE) {
        return parent::get_paged($page, $page_size, $page_num_by_rows, $info_object, $iterated);
    }
}
?>
