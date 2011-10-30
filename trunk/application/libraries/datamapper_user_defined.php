<?php
/* This file will be included into datamapper library 
 * The Reason for this is because currently is not possible to 
 * extends the Datamapper class without making modification to
 * the constructor.
 * It expected the current class to be called 'Datamapper'
 */

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
public function get_my_paged($page = 1, $page_size = 10, 
                          $page_num_by_rows = TRUE, 
                          $info_object = 'paged', $iterated = FALSE) {
    return $this->get_paged($page, $page_size, $page_num_by_rows, $info_object, $iterated);
}

/**
 * This function can be called only when get_paged is called. 
 * 
 * @param int $page_size (Default is 10)
 * @return void
 */
public function get_pagination() {
    $this->load->library('MY_Pagination');
    $conf = array(
        'total_rows' => $this->paged->total_rows,
        'base_url'   => $this->_get_curr_url(),
        'per_page'   => $this->paged->page_size
    );
    $pagination = new MY_Pagination();
    $pagination->initialize($conf);
    return $pagination;
}

/**
 * This function will return array as result.
 * NOTE: This function should only called after get() or get_iterated()
 *       is called.
 * 
 * @return array
 */
public function to_array() {
    $result_array = array();
    foreach($this as $obj) {
        $row_array = array();
        foreach($obj->stored as $attr => $value) {
            $row_array[$attr] = $value;
        }
        $result_array[] = $row_array;
    }
    return $result_array;
}

/**
 * This function will return array as result.
 * However, this function should only be call before get() or 
 * get_iterated() is called.
 * 
 * @return array
 */
public function get_array() {
    $this->get_iterated();
    return $this->to_array();
}
