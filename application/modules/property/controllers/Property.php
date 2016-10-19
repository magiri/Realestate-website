<?php

class Property extends Public_Controller {

//    var $data;
//    var $template = 'template/template_v';

    function __construct() {
        parent::__construct();
        $this->data['module'] = 'property';
    }

    public function index() {
        $model = new Gen_model;
        $model->create_model('eb_properties');
        $this->paginate(9, $model->count_by(array('status' => 1)), 'property/index/');

        $this->data['properties'] = $model->get_many_by(array('status' => 1));
        $this->data['subview'] = 'p_all';

        $this->output();
//        $this->load->view($this->template, $this->data);
    }

    public function all() {
        $model = new Gen_model;
        $model->create_model('eb_properties');
        $this->paginate(9, $model->count_by(array('status' => 1)), 'property/all/');
        $this->data['properties'] = $model->get_many_by(array('status' => 1));
        $this->data['subview'] = 'p_all';
        $this->load->view($this->template, $this->data);
    }

    public function view_details($id) {
        $model = new Gen_model;
        $model->create_model('eb_properties');
        $modelf = new Gen_model;
        $modelf->create_model('eb_property_features');

        $this->data['p_details'] = $model->get_by(['id' => $id]);
        $this->data['p_features'] = $modelf->get_many_by(array('property_id' => $id));
        $this->data['subview'] = 'p_details';
        $this->load->view($this->template, $this->data);
    }

    public function sort($catid = NULL) {
        if ($catid == null) {
            $this->all();
        } else {
            $modelcat = new Gen_model;
            $modelcat->create_model('categories');
            $cat_data = $modelcat->get($catid);
            if ($cat_data == NULL) {
                $this->all();
            } else {
                $this->data['cat_name'] = $cat_data->name;
                $model = new Gen_model;
                $model->create_model('eb_properties');
                $this->paginate(9, $model->count_by(array('status' => 1, 'category_id' => $catid)), 'property/sort/' . $catid . '/');
                $this->data['properties'] = $model->get_many_by(array('status' => 1, 'category_id' => $catid));

                $this->data['subview'] = 'p_all';
                $this->output();
            }
        }
    }

    public function land_properties() {
        $modelcat = new Gen_model;
        $modelcat->create_model('categories');
        $landcats = $modelcat->get_many_by("name LIKE '%land%'");
//        $categories = array();
        foreach ($landcats as $key => $cat) {
            $categories[$key] = $cat->id;
        }
        $modelp = new Gen_model;
        $modelp->create_model('eb_properties');

//    $this->paginate(9, $modelp->count_by(['category_id' => $categories, 'status' => 1]), 'property/land_properties/');
        $this->data['properties'] = $modelp->get_many_by(array('category_id' => $categories,'status'=>1));
        $this->data['subview'] = 'p_all';
        $this->data['cat_name'] = 'Land Properties';
        $this->output();
    }

}
