<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class Pages extends Public_Controller {

    var $data;
    var $pages_m;

    public function __construct() {
        parent::__construct();
        $this->data = "";
        $this->pages_m = new Gen_model;
        $this->pages_m->create_model('pages');
        $this->data['title'] = "Services";
        $this->load->helper('text');
        $this->load->helper('string');
        $this->data['module']='pages';
    }

    public function index() {
        $this->all();
    }

    public function view($slug) {
        $this->data['page'] = $this->pages_m->get_by(array('slug' => $slug, 'status' => 0));
        $this->data['subview'] = "pages_v";
        $this->output();
    }

    public function all() {
        $this->data['pages'] = $this->pages_m->get_many_by(array('status' => 0));
        $this->data['subview'] = "pages_all";
        $this->output();
    }

}
