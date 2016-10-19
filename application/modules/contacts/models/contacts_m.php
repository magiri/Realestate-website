<?php

class contacts_m extends MY_Model {

    protected $_table_name = 'contacts';
    protected $_primary_key = 'id';
    protected $_order_by = 'id desc';
    public $rules = array(
        'formEmail' => array(
            'field' => 'formEmail',
            'label' => 'Email',
            'rules' => 'required|trim|valid_email|xss_clean'
        ),
        'formName' => array(
            'field' => 'formName',
            'label' => 'Name',
            'rules' => 'trim|xss_clean|required'
        ),
        'formMessage' => array(
            'field' => 'formMessage',
            'label' => 'Message',
            'rules' => 'trim|required|xss_clean'
        ),
        'formLocation' => array(
            'field' => 'formLocation',
            'label' => 'Location',
            'rules' => 'trim|required|xss_clean'
        )
    );
    public $myrules = array(
        'email' => array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim'
        ),
        'name' => array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'trim'
        ),
        'phone_numbers' => array(
            'field' => 'phone_numbers',
            'label' => 'Phone Numbers',
            'rules' => 'trim'
        ),
    );

    public function __construct() {
        parent::__construct();
    }

    public function get_new() {
        $contacts = new stdClass();
        $contacts->id = '';
        $contacts->name = '';
        $contacts->email = '';
        $contacts->display_on = '';
        $contacts->status = '';
        $contacts->location = '';
        return $contacts;
    }

}
