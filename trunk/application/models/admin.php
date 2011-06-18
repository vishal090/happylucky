<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends User {

    public function __construct($id = NULL) {
        parent::__construct($id);
    }

    /**
     * Login as Admin
     * 
     * @return boolean
     */
    public function login() {
        return parent::login('ADMIN');
    }
}
?>
