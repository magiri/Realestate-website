<?php

class user_m extends My_Model {

    protected $_table_name = 'members';
    protected $_order_by = 'id';
    public $member_rules_register = array(
        'firstname' => array('field' => 'firstname', 'label' => 'First Name', 'rules' => 'required|trim'),
        'middle_name' => array('field' => 'middle_name', 'label' => 'Middle Name', 'rules' => 'required|trim'),
        'last_name' => array('field' => 'last_name', 'label' => 'Last Name', 'rules' => 'required|trim'),
        'email' => array('field' => 'email', 'label' => 'Email', 'rules' => 'trim|valid_email|callback__unique_email|xss_clean|required'),
        'phone' => array('field' => 'phone', 'label' => 'Phone No', 'rules' => 'required|xss_clean'),
        'password' => array('field' => 'password', 'label' => 'Password', 'rules' => 'required|trim|max_lenght[12]|min_length[6]'),
        'passwordconf' => array('field' => 'passwordconf', 'label' => 'password confirmation', 'rules' => 'required|trim|matches[password]'),
    );

    function __construct() {
        parent::__construct();
    }

    //add user if not exists
    public function get_new() {
        $member = new stdClass();
        $member->firstname = '';
        $member->middle_name = '';
        $member->last_name = '';
        $member->email = '';
        $member->phone = '';
        $member->password = '';
        $member->passwordconf = '';
        $member->activated = 0;
        $member->access_level = '';
        return $member;
    }

//hash the password for security purposes
    public function hash($string) {
        return hash('sha512', $string . config_item('encryption_key'));
    }

}
