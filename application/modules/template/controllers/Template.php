<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends Public_Controller {

    var $data;

    function __construct() {
        parent::__construct();
        $this->data = '';
    }

    public function index() {
        $this->data['subview'] = 'welcome_message';
        $this->load->view('template', $this->data);
    }

    public function test_model() {
        $model = new Gen_model;

        $model->create_model('users', 'user_id');

        var_dump($model->get_many(array(1303536069)));
    }

    public function test_viewtable() {

        $this->load->module('viewtable');
        $viewtable = new viewtable;
        $viewtable->set_table('users');
        $viewtable->set_display_cols(array(
            'id' => "private",
            'username' => "Name",
            'email' => "mail"
        ));
        $viewtable->all_data_output();
        var_dump($viewtable->output());
    }

    function public_two_col($data) {

        $this->load->view('template_v', $data);
    }

    function public_three_col($data) {

        $this->load->view('template_v', $data);
    }

    function public_one_col($data) {

        $this->load->view('home_template', $data);
    }

    function admin($data) {
        $this->load->view('admin', $data);
    }

}
