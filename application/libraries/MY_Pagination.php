<?php

class MY_Pagination extends CI_Pagination {

    public function __construct() {
        parent::__construct();
    }

    /**
     * You can set your own configuration here as default value,
     * except for 'base_url', 'total_rows' and 'per_page'
     * 
     * @return array
     */
    public function get_pagination_config() {
        return array(
            'base_url'        => $this->base_url,
            'total_rows'      => $this->total_rows,
            'per_page'        => $this->per_page,
            'first_link'      => $this->first_link,
            'next_link'       => $this->next_link,
            'prev_link'       => $this->prev_link,
            'last_link'       => $this->last_link,
            'full_tag_open'   => $this->full_tag_open,
            'full_tag_close'  => $this->full_tag_close,
            'first_tag_open'  => $this->first_tag_open,
            'first_tag_close' => $this->first_tag_close,
            'last_tag_open'   => $this->last_tag_open,
            'last_tag_close'  => $this->last_tag_close,
            'cur_tag_open'    => $this->cur_tag_open,
            'cur_tag_close'   => $this->cur_tag_close,
            'next_tag_open'   => $this->next_tag_open,
            'next_tag_close'  => $this->next_tag_close,
            'prev_tag_open'   => $this->prev_tag_open,
            'prev_tag_close'  => $this->prev_tag_close,
            'num_tag_open'    => $this->num_tag_open,
            'num_tag_close'   => $this->num_tag_close,
        );
    }
}
