<?php

class works_m extends My_Model {

    protected $_table_name = 'works';
    protected $_order_by = 'id desc';
    protected $_timestamps = false;
    public $rules = array(
        'title' => array('field' => 'title', 'label' => 'Work title', 'rules' => 'trim|xss_clean|required'),
        'description' => array('field' => 'description', 'label' => 'Work description', 'rules' => 'required|xss_clean|trim'),
    );

    public function __construct() {
        parent::__construct();
    }

    public function get_new() {
        $work = new stdClass();
        $work->id = '';
        $work->title = '';
        $work->description = '';
        return $work;
    }

}
