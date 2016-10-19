<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_Controller {

    var $data;
    var $template = 'template/home_template';

    function __construct() {
        $this->data = '';
        $this->data['module'] = 'home';
    }

    public function index() {
        $model = new Gen_model;
        $model->create_model('eb_properties');
//         $this->paginate(9, $model->count_by(array('status' => 1)), 'home/index/');
        $model->limit(3);
        $this->data['properties'] = $model->get_many_by(array('status' => 1));

        $this->data['subview'] = 'home_v';
        $this->load->view($this->template, $this->data);
    }

}
