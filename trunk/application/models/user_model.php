<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User_Model 
 * 
 * @uses DataMapper
 * @package 
 * @version $Id$
 * @copyright Copyright (C) 2011-2012 Jeong-Sheng, Lim, TARC. All rights reserved.
 * @author Jeong-Sheng, Lim <jslim89@gmail.com> 
 * @license GPL Version 3 {@link http://www.gnu.org/licenses/gpl.html}
 */
class User_Model extends DataMapper {

    var $table = "user";
    var $has_one = array(
        'country' => array(
            'class'         => 'country_model',
            'other_field'   => 'country',
            'join_self_as' => 'user',
            'join_other_as' => 'country',
            'join_table'    => 'user',
        ),
    );
    var $has_many = array(
        'customer_order' => array(
            'class'        => 'customer_order_model',
            'other_field'  => 'customer_order',
            'join_self_as' => 'user',
            'join_table'   => 'customer_order',
        ),
    );

    /**
     * __construct 
     * 
     * @param mixed $id 
     * @return void
     */
    public function __construct($id = NULL) {
        parent::__construct($id);
        $this->validation = array(
            'password' => array(
                'label' => lang('user_password'),
                'rules' => array('required', 'trim', 'encrypt')
            ),
           // 'confirm_password' => array(
                // 'label' => lang('user_confirm_password'),
                // 'rules' => array('required', 'matches' => 'password', 'encrypt')
            // ),
            // 'email' => array(
                // 'label' => lang('email'),
                // 'rules' => array('required', 'unique' ,'trim')
            // ),
        );
    }

    /**
     * _encrypt 
     * 
     * @param mixed $field 
     * @return void
     */
    protected function _encrypt($field) {
        // Don't encrypt an empty string
        if (!empty($this->{$field})) {
            // Generate a random salt if empty
            if (empty($this->salt)) {
                $this->salt = md5(uniqid(rand(), true));
            }

            $this->{$field} = sha1($this->salt . $this->{$field});
        }
    }

    protected function _is_password_valid($field) {
        if (strlen($field) < 6)
            return false;
    }

    public function login($user_type = 'MEMBER') {
        // Create a temporary user object
        $u = new User_Model();

        $criteria = array('user_type' => $user_type);
        // Get this users stored record via their email
        $criteria['email'] = $this->email;

        $u->where($criteria)->get();

        // Give this user their stored salt
        $this->salt = $u->salt;

        // Validate and get this user by their property values,
        // this will see the 'encrypt' validation run, encrypting the password with the salt
        $this->validate()->get();

        // If the email and encrypted password matched a record in the database,
        // this user object would be fully populated, complete with their ID.

        // If there was no matching record, this user would be completely cleared so their id would be empty.
        if (empty($this->id))
        {
            // Login failed, so set a custom error message
            $this->error_message('login', lang('user_invalid_email_or_password'));

            return false;
        }
        else
        {
            // Login succeeded
            return true;
        }
    }
}
