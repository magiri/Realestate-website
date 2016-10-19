<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Uni extends MX_Controller {

    var $data;
    var $template = 'template/template_v';

    function __construct() {
        parent::__construct();
        $this->data = '';
        $this->data['module'] = 'uni';
    }


    public function index() {
        $this->load->module('tables');
        $datatables = new tables;

        $datatables->set_table('users');

        $datatables->set_display_cols(array(
            'username' => 'Name',
            'email' => 'Desc',
        ));
        $datatables->set_edit_field('user_id');
        $datatables->set_edit_links(array(
            'edit' => '/products/admin/edit/',
            'delete' => 'products/admin/delete_product/',
            'Make Home' => 'products/admin/make_home/',
        ));


        $datatables->all_data_output();
        echo $datatables->output();
    }

    public function file_upload() {
        $this->load->helper('security');
        $model = new Gen_model;
        $result = $model->one_file_upload();
        $this->data['subview'] = 'file_upload';
        $this->load->view($this->template, $this->data);
        var_dump($this->input->post('userfile'));
        var_dump($result);
    }

}
