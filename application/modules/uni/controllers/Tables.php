<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tables extends MX_Controller {

    public $model = null;
    var $data;

    public function __construct() {
        parent::__construct();

        $ci = &get_instance();


        $this->model = new Gen_model;
        $this->data = '';
        $this->data['field'] = 'id';
    }

    public function set_display_cols($display_cols) {
        $this->data['display_cols'] = $display_cols;
    }

    public function set_table($table) {
        $this->model->create_model($table);
    }

    public function set_edit_field($field) {
        $this->data['field'] = $field;
    }

    public function set_edit_links($links) {
        $this->data['links'] = $links;
    }

//
//    public function set_image_col($col) {
//        $this->data['image_col'] = $col;
//    }

    public function all_data_output() {

        $this->data['rows'] = $this->model->get_all();
    }

    public function select_data_output($where) {

        $this->data['rows'] = $this->model->get_many_by($where);
    }

    public function set_id_name($id_name) {
        $this->data['id_name'] = $id_name;
    }

    public function output() {
        $this->data['enable_tables'] = TRUE;
        return $this->load->view('table', $this->data, TRUE);
    }

}
