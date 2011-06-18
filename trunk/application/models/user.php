<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_DataMapper {

    var $table = "user";

    $validation = array(
        'username' => array(
            'label' => 'Username',
            'rules' => array('required')
        ),
        'password' => array(
            'label' => 'Password',
            'rules' => array('required', 'trim', 'encrypt')
        ),
        'confirm_password' => array(
            'label' => 'Confirm Password',
            'rules' => array('required', 'matches' => 'password', 'encrypt')
        ),
        'first_name' => array(
            'label' => 'First Name',
            'rules' => array('required')
        ),
        'last_name' => array(
            'label' => 'Last Name',
            'rules' => array('required')
        ),
        'address' => array(
            'label' => 'Address',
            'rules' => array('required')
        ),
        'city' => array(
            'label' => 'City',
            'rules' => array('required')
        ),
        'state' => array(
            'label' => 'State',
            'rules' => array('required')
        ),
        'contact_no' => array(
            'label' => 'Contact No',
            'rules' => array('required')
        ),
        'email' => array(
            'label' => 'Email',
            'rules' => array('required', 'unique' ,'trim')
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
    }

    /**
     * _encrypt 
     * 
     * @param mixed $field 
     * @return void
     */
    private function _encrypt($field) {
        // Don't encrypt an empty string
        if (!empty($this->{$field})) {
            // Generate a random salt if empty
            if (empty($this->salt)) {
                $this->salt = md5(uniqid(rand(), true));
            }

            $this->{$field} = sha1($this->salt . $this->{$field});
        }
    }

    private function _is_password_valid($field) {
        if (strlen($field) < 6)
            return false;
    }

    public function login($user_type = 'MEMBER') {
        // Create a temporary user object
        $u = new User();

        $criteria = array('user_type' => $user_type);
        // Get this users stored record via their username if the username 
        // exist
        if($this->username)
            $criteria['username'] = $this->username;
        // Get this users stored record via their email if the username 
        // doesn't exist
        else if($this->email)
            $criteria['email'] = $this->email;

        $u->where($criteria)->get();

        // Give this user their stored salt
        $this->salt = $u->salt;

        // Validate and get this user by their property values,
        // this will see the 'encrypt' validation run, encrypting the password with the salt
        $this->validate()->get();

        // If the username and encrypted password matched a record in the database,
        // this user object would be fully populated, complete with their ID.

        // If there was no matching record, this user would be completely cleared so their id would be empty.
        if (empty($this->id))
        {
            // Login failed, so set a custom error message
            $this->error_message('login', 'Username or password invalid');

            return false;
        }
        else
        {
            // Login succeeded
            return true;
        }
    }
}

