<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once "my_datamapper.php";

class User_Model extends MY_DataMapper {

    var $table = "user";
    var $validation;

    /**
     * __construct 
     * 
     * @param mixed $id 
     * @return void
     */
    public function __construct($id = NULL) {
        $this->validation = array(
            'username' => array(
                'label' => lang('user_username'),
                'rules' => array('required')
            ),
            'password' => array(
                'label' => lang('user_password'),
                'rules' => array('required', 'trim', 'encrypt')
            ),
            'confirm_password' => array(
                'label' => lang('user_confirm_password'),
                'rules' => array('required', 'matches' => 'password', 'encrypt')
            ),
            'first_name' => array(
                'label' => lang('user_first_name'),
                'rules' => array('required')
            ),
            'last_name' => array(
                'label' => lang('user_last_name'),
                'rules' => array('required')
            ),
            'address' => array(
                'label' => lang('adreess'),
                'rules' => array('required')
            ),
            'city' => array(
                'label' => lang('city'),
                'rules' => array('required')
            ),
            'state' => array(
                'label' => lang('state'),
                'rules' => array('required')
            ),
            'contact_no' => array(
                'label' => lang('user_contact_no'),
                'rules' => array('required')
            ),
            'email' => array(
                'label' => lang('email'),
                'rules' => array('required', 'unique' ,'trim')
            ),
        );
        parent::__construct($id);
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

    public function to_array($users) {
        $array = array();
        foreach($users as $u) {
            $temp = array();
            $temp['user_id']           = $u->user_id;
            $temp['username']          = $u->username;
            $temp['first_name']        = $u->first_name;
            $temp['last_name']         = $u->last_name;
            $temp['address']           = $u->address;
            $temp['town']              = $u->town;
            $temp['postcode']          = $u->postcode;
            $temp['city']              = $u->city;
            $temp['state']             = $u->state;
            $temp['country_id']        = $u->country_id;
            $temp['contact_no']        = $u->contact_no;
            $temp['email']             = $u->email;
            $temp['password']          = $u->password;
            $temp['registration_date'] = $u->registration_date;
            $temp['display_picture']   = $u->display_picture;
            $temp['age']               = $u->age;
            $temp['sex']               = $u->sex;
            $temp['user_type']         = $u->user_type;
            $array[] = $temp;
        }
        return $array;
    }
}
