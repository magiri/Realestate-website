<?php

class Menu_admin extends MX_Controller {

    var $data;

    function __construct() {
        parent::__construct();
        $this->data = '';
        $this->form_validation->CI = & $this;
        $this->load->model('menu_m');
        //secure pages through member login
        $this->load->module('sitesecurity/sitesecurity');
//        $this->sitesecurity->memberisloggedin();
//        $this->sitesecurity->insession_check();
    }

    public function index() {
        $this->data['title'] = ucfirst('menu');
        $this->data['menu'] = $this->menu_m->get();
        $this->data['module'] = 'posts_admin';
        $this->data['subview'] = 'menu/index';
        $this->load->view('dashboard', $this->data);
    }

    //edit menu
    public function edit($id = NULL) {
        // Fetch a article or set a new one
        if ($id) {
            $this->data['menu'] = $this->menu_m->get($id);
            count($this->data['menu']) || $this->data['errors'][] = 'menu could not be found';
        } else {
            $this->data['menu'] = $this->menu_m->get_new();
        }

        // Set up the form
        $rules = $this->menu_m->rules;
        $this->form_validation->set_rules($rules);

        // Process the form
        if ($this->form_validation->run() == TRUE) {
            $data = $this->menu_m->array_from_post(array('title'));
            $data['slug'] = url_title($data['title'], 'dash', TRUE);
            if ($this->menu_m->save($data, $id)) {
                $this->session->set_flashdata('error', 'service ' . '<g class="showtinf">' . $data['title'] . '</g>' . ' update successive');
            }

            redirect('posts_admin/menu');
        }

        $this->data['title'] = ucfirst('update menu');
        $this->data['module'] = 'posts_admin/';
        $this->data['subview'] = 'menu/edit';
        $this->load->view('dashboard', $this->data);
    }

    //delete an article
    public function delete($id) {
        $this->menu_m->delete($id);
        redirect('posts_admin/menu');
    }

}
