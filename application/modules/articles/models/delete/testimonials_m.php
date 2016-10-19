<?php

class testimonials_m extends MY_Model {

    protected $_table_name = 'testimonials';
    protected $_primary_key = 'id';
    protected $_order_by = 'id desc';
    public $rules = array(
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
    );

    public function __construct() {
        parent::__construct();
    }

    public function get_new() {
        $testimonials = new stdClass();
        $testimonials->id = '';
        $testimonials->formEmail = '';
        $testimonials->formMessage = '';
        return $testimonials;
    }

}
