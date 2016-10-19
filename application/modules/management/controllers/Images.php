<?php

class Images extends MG_Controller {

    var $images_m;
    var $all_fields = array();

    function __construct() {
        parent::__construct();
        modules::run('sitesecurity/adminisloggedin');
        $this->load->module('services');                  //use the methods in this module(posts) ie $this->posts->get();
        $this->load->library('form_validation');
        $this->data = '';
        $this->data['uploaderror'] = array('error' => '');
        $this->data['title'] = 'Admin';
        $this->images_m = new Gen_model;
        $this->images_m->create_model('eb_images');
    }

    public function index() {
        $this->view_all();
    }

    public function view_all() {
        $this->paginate(9, $this->images_m->count_all(), 'management/images/view_all/');
        $this->data['images'] = $this->images_m->get_all();

        $this->data['subview'] = 'images/all';
        $this->output();
    }

    public function edit($id = NULL) {
        $data = [];
        if ($id == NULL) {
            $image = $this->images_m->one_file_upload();

            if (!$image['upload']) {
                $this->data["error"] = $image['error'];
            } else {
                $data['file_name'] = $image['upload_data']['file_name'];
            }
            $data['field_id'] = 0;
            $data['caption'] = $this->input->post('caption');
            $data['description'] = $this->input->post('description');
            if ($this->input->post('id') != '') {
                $id = $this->input->post('id');
                $id = $this->images_m->update($this->input->post('id'), $data);
            } else {
                $id = $this->images_m->insert($data);
            }
            redirect('management/images/edit/' . $id);
        }

        $this->data['page_desc'] = 'Images';
        $this->data['image'] = $this->images_m->get_by(['id' => $id]);
        $this->data['subview'] = 'images/edit_images';
        $this->output();
    }

    public function add_images() {

        $images = $this->images_m->file_upload();
        $data = [];
        $this->form_validation->set_rules('field_id', 'Property', 'required');

        if ($this->form_validation->run() == TRUE) {

            if (isset($images['upload_data'])) {
                foreach ($images['upload_data'] as $key => $image) {
                    $data[$key]['file_name'] = $image['file_name'];
                    $data[$key]['field_id'] = $this->input->post('field_id');
                }
                $this->images_m->insert_many($data);
                $id = $this->input->post('field_id');
            }
            redirect('management/images');
        } else {
            if (isset($images['error'])) {
                $this->data["error"] = $images['error'];
            }
        }
        $this->data['subview'] = 'images/add_images';
        $this->output();
    }
    public function add_slider_images() {

        $images = $this->images_m->file_upload();
        $data = [];
        $this->form_validation->set_rules('field_id', 'Property', 'required');

        if ($this->form_validation->run() == TRUE) {

            if (isset($images['upload_data'])) {
                foreach ($images['upload_data'] as $key => $image) {
                    $data[$key]['file_name'] = $image['file_name'];
                    $data[$key]['field_id'] = $this->input->post('field_id');
                    $data[$key]['slider_image'] = 1;
                }
                $this->images_m->insert_many($data);
                $id = $this->input->post('field_id');
            }
            redirect('management/images');
        } else {
            if (isset($images['error'])) {
                $this->data["error"] = $images['error'];
            }
        }
        $this->data['subview'] = 'images/add_slider_image';
        $this->output();
    }

    public function make_slider($id, $opt = 1) {
        if ($opt == 1) {
            $data['slider_image'] = 1;
        } else {
            $data['slider_image'] = 1;
        }
        $this->images_m->update($id, $data);
        redirect($this->agent->referrer());
    }
 

    public function view_all_sort($sort) {
        $this->paginate(9, $this->images_m->count_by(array($sort => 1)), 'management/images/view_all/');
        $this->data['images'] = $this->images_m->get_many_by(array($sort => 1));

        $this->data['subview'] = 'images/all';
        $this->output();
    }

    public function blockopt($opt) {
        $id = $this->uri->segment(5);
        $optsarray = array('block', 'unblock');
        $opt = (in_array($opt, $optsarray)) ? $opt : redirect('management/images', 'location', 301);    //check if the option is the actual one ie either block or unblock
        if ($opt == 'block') {
            $blockopt = 1;
        } else {
            $blockopt = 0;
        }
        $data = array('status' => $blockopt);
        $this->images_m->update($id, $data);
        redirect('management/images', 'location', 301);
    }

}
