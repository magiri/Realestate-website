<?php

class Property extends MG_Controller {

    function __construct() {
        parent::__construct();

        $this->data['module'] = 'management';
        $this->load->library('form_validation');
        $this->data['subview'] = 'property/edit_main';
        $this->data['property_id'] = 0;
    }

    public function index() {
        $this->data['subview'] = 'property/analysis';
        $this->output();
    }

    public function add_new() {
        $this->edit_basic_info();
    }

    public function all() {
        $this->data['subview'] = 'property/view_all';
        $table = 'eb_properties';
        $columns = array(
            'name' => "Name",
            'address' => "Address",
            'price' => 'Price (Ksh)');
        $links = array(
            'Edit' => "management/property/edit_basic_info/",
        );

        $this->table($table, $columns, $links);
//        $this->output();
    }

    public function edit22($id = NULL) {
        $update = array('category_id', 'rent_sale', 'name', 'address',
            'yearbuilt', 'description', 'image', 'no_of_units', 'size',
            'size_unit', 'price', 'includetax', 'mls', 'amentities', 'stories',
            'floorcoverings', 'rooftype', 'bathroom', 'diningroom', 'bedroom',
            'kitchen', 'livingroom', 'miscrooms', 'heating', 'cooling', 'water',
            'sewer', 'laundry', 'parking', 'swimmingpool', 'garden', 'yardgrounds',
            'handicapfeatures', 'status', 'views', 'contact_id', 'latitude',
            'longitude', 'fulladdress', 'unit', 'modified_at');
        $all = array('id', 'category_id', 'rent_sale', 'name', 'address',
            'yearbuilt', 'description', 'image', 'no_of_units', 'size',
            'size_unit', 'price', 'includetax', 'mls', 'amentities', 'stories',
            'floorcoverings', 'rooftype', 'bathroom', 'diningroom', 'bedroom',
            'kitchen', 'livingroom', 'miscrooms', 'heating', 'cooling', 'water',
            'sewer', 'laundry', 'parking', 'swimmingpool', 'garden', 'yardgrounds',
            'handicapfeatures', 'status', 'views', 'contact_id', 'latitude',
            'longitude', 'fulladdress', 'unit', 'created_at', 'modified_at');
        $model = new Gen_model;
        $model->create_model("properties");
        if ($id == NULL) {
            $this->data['property_info'] = $model->get_new($all);

            $this->form_validation->set_rules($this->property_form_rules());
            if ($this->form_validation->run() == TRUE) {
                $data = $model->array_in_post($update);

                if ($this->input->post('id') == '') {

                    $id = $model->insert($data);
                } else {
                    $id = $this->input->post('id');
                    $model->update($id, $data);

                    $model2 = new Gen_model;
                    $model2->create_model('p_imgs');
                    $upload = $model2->one_file_upload();
                }
                if ($upload['upload'] == TRUE) {
                    $data2['file_name'] = $upload['upload_data']['file_name'];
                    $data2['field_id'] = $id;
                    $data2['main_image'] = 1;
                    $model2->insert($data2);
                }
                redirect('management/property/edit/' . $id);
            } else {
                $this->data['validation_errors'] = validation_errors();
            }
        } else {
            $this->data['property_info'] = $model->get_by(['id' => $id]);
            if ($this->data['property_info'] == NULL) {
                $this->data['subview_string'] = 'Property Not Found';
            }
        }
        $this->get_property_image($id);
        $this->data['edit_subview'] = 'property/edit_basic_info';

        $this->output();
    }

    public function edit_basic_info($id = NULL) {
        $update = array('category_id', 'rent_sale', 'price', 'name', 'address',
            'yearbuilt', 'description', 'no_of_units', 'size',
            'size_unit', 'status', 'latitude',
            'longitude', 'modified_at');
        $all = array('id', 'category_id', 'rent_sale', 'name', 'address',
            'yearbuilt', 'description', 'image', 'no_of_units', 'size',
            'size_unit', 'price', 'includetax', 'mls', 'amentities', 'stories',
            'floorcoverings', 'rooftype', 'bathroom', 'diningroom', 'bedroom',
            'kitchen', 'livingroom', 'miscrooms', 'heating', 'cooling', 'water',
            'sewer', 'laundry', 'parking', 'swimmingpool', 'garden', 'yardgrounds',
            'handicapfeatures', 'status', 'views', 'contact_id', 'latitude',
            'longitude', 'fulladdress', 'unit', 'created_at', 'modified_at');
        $model = new Gen_model;
        $model->create_model("eb_properties");
        if ($id == NULL) {
            $this->data['property_info'] = $model->get_new($all);

            $this->form_validation->set_rules($this->property_form_rules());
            if ($this->form_validation->run() == TRUE) {
                $data = $model->array_in_post($update);
                $data['status'] = 1;

                if ($this->input->post('id') == '') {

                    $id = $model->insert($data);
                } else {
                    $id = $this->input->post('id');
                    $model->update($id, $data);
                }

                redirect('management/property/edit_basic_info/' . $id);
                $this->data['property_id'] = $id;
            } else {
                $this->data['validation_errors'] = validation_errors();
            }
        } else {
            $this->data['property_info'] = $model->get_by(['id' => $id]);

            if ($this->data['property_info'] == NULL) {
                $this->data['subview_string'] = 'Property Not Found';
            } else {
                $this->data['page_title'] = $this->data['property_info']->name;
            }
        }
        $this->get_property_image($id);

        $this->data['page_desc'] = 'Basic Information';
        $this->data['edit_subview'] = 'property/edit_basic_info';
        $this->data['property_id'] = $id;
        $this->output();
    }

    public function edit_images($id = NULL) {

        $model = new Gen_model;
        $model->create_model('eb_images');
        $data = [];
        if ($id == NULL) {
            $image = $model->one_file_upload();

            if (!$image['upload']) {
                $this->data["error"] = $image['error'];
            } else {
                $data['file_name'] = $image['upload_data']['file_name'];
            }
            if ($this->input->post('field_id') != NULL) {
//                    $data['id'] = $this->input->post('id');
                $data['field_id'] = $this->input->post('field_id');
                $data['caption'] = $this->input->post('caption');
                $data['description'] = $this->input->post('description');
                $id = $model->update($this->input->post('id'), $data);
                redirect('management/property/edit_images/' . $data['field_id']);
                $this->data['property_id'] = $data['field_id'];
            }
        }
        $model_p = new Gen_model;
        $model_p->create_model('eb_properties');
        $this->data['property'] = $model_p->get($id);

        if ($this->data['property'] == NULL) {
            $this->data['page_title'] = 'Error!!!! ....Property Not Found';
        } else {
            $this->data['page_title'] = $this->data['property']->name;
            $this->data['p_id'] = $this->data['property']->id;
            $this->data['page_desc'] = 'Images';
            $this->data['images'] = $model->get_many_by(['field_id' => $id]);
            $this->data['edit_subview'] = 'property/edit_images';
            $this->data['property_id'] = $id;
        }
        $this->output();
    }

    public function add_images($id = NULL) {

        $model = new Gen_model;
        $model->create_model('eb_images');
        $images = $model->file_upload();
        $data = [];
        $this->form_validation->set_rules('field_id', 'Property', 'required');

        if ($this->form_validation->run() == TRUE) {

            if (isset($images['upload_data'])) {
                foreach ($images['upload_data'] as $key => $image) {
                    $data[$key]['file_name'] = $image['file_name'];
                    $data[$key]['field_id'] = $this->input->post('field_id');
                }
                $model->insert_many($data);
                $id = $this->input->post('field_id');
            }
        } else {
            if (isset($images['error'])) {
                $this->data["error"] = $images['error'];
            }
        }
        redirect('management/property/edit_images/' . $id);
        $this->data['property_id'] = $id;
    }

    public function default_image($field_id, $id) {
        $model = new Gen_model;
        $model->create_model("eb_images");
        $images = $model->get_many_by(array('field_id' => $field_id));

        if ($images != null) {
            $primary_values = array();
            $data['main_image'] = 0;
            foreach ($images as $key => $image) {
                $primary_values[$key] = $image->id;
            }
            $model->update_many($primary_values, $data);
        }
        $data['main_image'] = 1;
        $model->update($id, $data);

        redirect('management/property/edit_images/' . $field_id);
        $this->data['property_id'] = $field_id;
    }

    public function edit_features($id = NULL) {
        $model = new Gen_model;
        $model->create_model("eb_property_features");
        if ($id == NULL) {

            $this->form_validation->set_rules($this->features_form_rules());

            if ($this->form_validation->run() == TRUE) {
                $data = $model->array_in_post(array('property_id', 'feature_id', 'value'));
                $exists = $model->get_by(array('property_id' => $data['property_id'], 'feature_id' => $data['feature_id']));
                if ($exists == NULL) {
                    $model->insert($data);
                } else {
                    $model->update($exists->id, $data);
                }
                redirect('management/property/edit_features/' . $data['property_id']);
                $this->data['property_id'] = $data['property_id'];
            } else {
                $this->data['validation_errors'] = validation_errors();
            }
        } else {
            $this->data['property_features'] = $model->get_many_by(['property_id' => $id]);
            $model_p = new Gen_model;
            $model_p->create_model('eb_properties');
            $this->data['property'] = $model_p->get($id);

            if ($this->data['property'] == NULL) {
                $this->data['page_title'] = 'Error!!!! ....Property Not Found';
            } else {
                $this->data['page_title'] = $this->data['property']->name;
                $this->data['page_desc'] = 'Features';
            }
        }
        $this->data['edit_subview'] = 'property/edit_features';
        $this->data['property_id'] = $id;
        $this->output();
    }

    private function property_form_rules() {
        $rules = array(
            array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required|min_length[5]'
            ),
            array(
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'required|min_length[8]'
            ),
            array(
                'field' => 'category_id',
                'label' => 'Category',
                'rules' => 'required'
            ),
            array(
                'field' => 'rent_sale',
                'label' => 'Rent/sale',
                'rules' => 'required'
            ),
        );
        return $rules;
    }

    private function features_form_rules() {
        $rules = array(
            array(
                'field' => 'feature_id',
                'label' => 'Select a feature',
                'rules' => 'required|min_length[1]'
            ),
            array(
                'field' => 'property_id',
                'label' => 'property',
                'rules' => 'required|min_length[1]'
            ),
            array(
                'field' => 'value',
                'label' => 'Value',
                'rules' => 'required|min_length[1]|trim'
            ),
        );
        return $rules;
    }

    function get_property_image($id, $main = TRUE) {
        $model = new Gen_model;
        $model->create_model('eb_images');
        if ($main == true) {
            $this->data['p_main_image'] = $model->get_by(['field_id' => $id, 'main_image' => 1]);
        } else {
            $this->data['p_images'] = $model->get_many(['field_id' => $id]);
        }
    }

}
