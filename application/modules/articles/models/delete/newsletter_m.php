<?php

class newsletter_m extends My_Model {

    protected $_table_name = 'subscribers';
    protected $_primary_key = 'id';
    protected $_order_by = 'id desc';
    public $rules = array(
        'formEmail' => array('field' => 'formEmail', 'label' => 'Email Address', 'rules' => 'trim|valid_email|callback__unique_email|xss_clean|required')
    );

    public function get_new() {
        $member = new stdClass();
        $member->formEmail = '';
        return $member;
    }

    public function get_dropdown() {
        $members = $this->get();
        /* return key => pair value array */
        if (count($members)) {
            foreach ($members as $member) {
                //get child
                $array[$member->id] = $member->formEmail;
            }
        }
        return $array;
    }

}
