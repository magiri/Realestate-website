<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class Pages extends MG_Controller {

    public function __construct() {
        parent::__construct();
        $this->data['module'] = 'management';
        $this->load->library('form_validation');
        $this->data['subview'] = 'pages/edit_page';
    }

    public function index() {
        
    }
    public function all() {
        $this->data['subview'] = 'pages/view_all';
        $table = 'pages';
        $columns = array(
            'name' => "Name",
            'status' => 'Status');
        $links = array(
            'Edit' => "management/pages/edit_page/",
        );

        $this->table($table, $columns, $links);  
    }
    public function add_new() {
        $this->edit_page();
    }
    public function edit_page($id = NULL) {
        $model = new Gen_model;
        $model->create_model('pages');
        $all = array('id', 'name', 'content', 'image', 'slug', 'status', 'modified_at');

        $update = array('name', 'content', 'image', 'slug', 'status');
        if ($id == NULL) {
            $this->data['page_info'] = $model->get_new($all);
            $this->form_validation->set_rules($this->edit_form_rules());
            if ($this->form_validation->run() == TRUE) {
                $data = $model->array_in_post($update);
                $data['slug'] = $model->putDashes($data['name']);
                $data['modified_at'] = date('Y:m:d H:i:s');
                $upload = $model->one_file_upload();
                if ($upload['upload'] == TRUE) {
                    $data['image'] = $upload['upload_data']['file_name'];
                }
                if ($this->input->post('id') == '') {
//                    $id = $model->insert($data);
                } else {
                    $id = $this->input->post('id');
                    $model->update($id, $data);
                }
                
                redirect('management/pages/edit_page/' . $id);
            } else {
                $this->data['validation_errors'] = validation_errors();
            }
        } else {
            $this->data['page_info'] = $model->get_by(array('id' => $id));
            if ($this->data['page_info'] == NULL) {
                $this->data['subview_string'] = 'Page Not Found';
            }
        }


        $this->data['subview'] = 'pages/edit_page';
        $this->output();
    }

    private function edit_form_rules() {
        $rules = array(
            array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required|min_length[5]'
            ),
            array(
                'field' => 'content',
                'label' => 'Body',
                'rules' => 'required|min_length[8]'
            )
        );
        return $rules;
    }

}
