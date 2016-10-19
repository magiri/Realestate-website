<?php

class Management extends MG_Controller {

    function __construct() {
        parent::__construct();

        $this->data['module'] = 'management';
    }

    public function index() {

        $this->data['subview'] = 'dashboard';

        $this->load->view('template', $this->data);
    }

    public function users() {
        $this->data['page_title'] = "Manage Users";
        $this->load->module('uni/tables');
        $table = new tables;

        $table->set_table('users');

        $table->set_display_cols(array(
            'username' => 'Name',
            'email' => 'Desc',
        ));
        $table->set_edit_field('user_id');
        $table->set_edit_links(array(
            'Edit' => '/auth/edit/',
            'Block' => '/auth/burn/',
        ));


        $table->all_data_output();
        $this->data['subview_string'] = $table->output();

        $this->load->view('template', $this->data);
    }

    public function preferences($type = 'categories', $edit = false) {
        if ($edit == FALSE) {
            $model = new Gen_model;
            $this->data['pref'] = $model->get_new(array('id', 'name', 'description'));
        }
        $this->data['subview'] = 'preferences/edit_v';

        if ($type == 'categories') {
            $table = 'categories';
              $this->data['pref_type']='categories';
        } elseif ($type == 'features') {
            $table = 'eb_features';
              $this->data['pref_type']='features';
        }

        $columns = array(
            'name' => "Name",
            'description' => "Description",
        );
        $links = array(
            'Edit' => 'management/edit_pref/' . $type . '/',
            'Delete' => 'management/delete_pref/' . $type . '/',
        );

        $this->table($table, $columns, $links);
    }

    public function delete_pref($type, $id) {
        $model = new Gen_model;
        if ($type == 'categories') {
            $model->create_model('categories');
        } elseif ($type == 'features') {
            $model->create_model('eb_features');
        }
        $model->delete($id);
        redirect('management/website_prefs/' . $type);
    }

    public function edit_pref($type, $id = NULL) {
        $model = new Gen_model;
        if ($type == 'categories') {
            $model->create_model('categories');
            $this->data['pref_type']='categories';
        } elseif ($type == 'features') {
            $this->data['pref_type']='features';
            $model->create_model('eb_features');
        }

        $this->form_validation->set_rules('name', 'Name', 'required|trim');

        if ($this->form_validation->run() == TRUE) {
            $data = $model->array_in_post(array('name', 'description'));
            var_dump($this->input->post('id'));
            if ($this->input->post('id') == '') {
                $id = $model->insert($data);
            } else {
                $id = $this->input->post('id');
                $model->update($id, $data);
            }
            redirect('management/preferences/' . $type);
        }
        if ($id != NULL) {
            $this->data['pref'] = $model->get_by(array('id' => $id));
        } else {
            redirect('management/preferences/' . $type);
        }

        $this->preferences($type, TRUE);
    }

}
