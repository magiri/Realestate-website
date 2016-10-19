<?php

class Services extends MG_Controller {

    var $services_m;
    var $all_fields = array('id', 'title', 'img_url', 'summary', 'body', 'blocked');

    function __construct() {
        parent::__construct();
      
        $this->load->module('services');                  //use the methods in this module(posts) ie $this->posts->get();
        $this->load->library('form_validation');
        $this->data = '';
        $this->data['uploaderror'] = array('error' => '');
        $this->data['title'] = 'Admin';
        $this->services_m = new Gen_model;
        $this->services_m->create_model('services');
    }

    public function index() {


        /*         * ****************************pagination logic start here*************************** */

        if ($this->uri->segment(4) < 0) {     //ensure the offset number is not less than data availabale in database
            redirect('management/services', 'location', '301');
        }

        $perpage = 10;
        $count = $this->services_m->count_all();
        if ($this->uri->segment(4) > $count) {      //ensure the offset number is not greater than data availabale in database
            redirect('management/services', 'location', '301');
        }

        if ($count > $perpage) { /* if data greater than per page then set up pagination */

            /* pagination configs */
            $config['per_page'] = $perpage;
            $config['uri_segment'] = 4;
            $config['total_rows'] = $count;
            $config['base_url'] = site_url($this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . 'index' . '/');

            $this->pagination->initialize($config);
            $this->data['pagination'] = $this->pagination->create_links();
            $offset = $this->uri->segment(4);

            /* additional data */
            $this->data['offset_data'] = $offset;
        } else {
            $offset = 0;
            $this->data['pagination'] = '';
        }

        /* fetch  */
        $this->db->limit($perpage, $offset);
        $this->data['services'] = $this->services_m->get_all();

        /* amount of data available according to uri segment(3) or just request */
        if (count($this->data['services'])) {
            $this->data['noOfservices'] = $count;
        } else {
            $this->data['noOfservices'] = 0;
        }

        /*         * ***********pagination logic ends here************************** */


        $this->data['title'] = 'Services';
        $this->data['subview'] = 'services/index';
        $this->output();
    }

    public function add($type) {

        if ($type == 'serv') {
            $type = 1;
        } elseif ($type == 'loan') {
            $type = 2;
        } else {
            $type = 0;
        }
        $this->data['type'] = $type;
        $this->data['services'] = $this->services_m->get_new($this->all_fields);
        $this->data['title'] = 'New Service';
        $this->data['subview'] = 'services/edit';
        $this->output();
    }

    public function edit($id = NULL) {
        if ($id) {
            $this->data['services'] = $this->services_m->get_by(array('id' => $id));
            count($this->data['services']) ? $this->data['title'] = 'Edit Service' : redirect('admin/service', 'location', 301);
        } else {
            $this->data['services'] = $this->services_m->get_new($this->all_fields);
            $this->data['title'] = 'New Service';
        }


        $rules = $this->edit_form_rules();
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() === true) {
            $data = $this->services_m->array_in_post(array('title', 'summary', 'body'));

            $uploadimage = $this->input->post('uploadimage');
            if ($uploadimage == 1) {
                //upload starts here
                $upload = $this->services_m->one_file_upload();  //upload slide image 
                if ($upload['upload'] !== false) {

                    $data['img_url'] = $upload['upload_data']['file_name'];
                }
                //upload ends here 
            }
            if ($this->input->post('id') == '') {
                $id = $this->services_m->insert($data);
            } else {
                $id = $this->input->post('id');
                $this->services_m->update($id, $data);
            }


            redirect('management/services', 'location', 301);

//            $data['slug']= strtolower(url_title($data['name']));
        }

        //$this->data['title'] = 'Service';
        $this->data['subview'] = 'services/edit';
        $this->output();
    }

    public function delete($id = NULL) {

        is_numeric($id) || redirect('management/services', 'location', 301);
        $this->services_m->delete($id);
        redirect('management/services', 'location', 301);
    }

//    public function delete_specific($id = NULL) {
//        
//        is_numeric($id) || redirect('admin/service', 'location', 301);
//        $this->services_m->delete_specific($id);
//        redirect('admin/service');
//    }

    public function deleteall() {

        //is_numeric($id) || redirect('admin/commtestimonials/'.$this->uri->segment(5),'location',301);
        $this->services_m->deleteall();
        redirect('management/services', 'location', 301);
    }

    public function blockopt($opt) {
        $id = $this->uri->segment(5);
        $optsarray = array('block', 'unblock');
        $opt = (in_array($opt, $optsarray)) ? $opt : redirect('management/services', 'location', 301);    //check if the option is the actual one ie either block or unblock
        if ($opt == 'block') {
            $blockopt = 1;
        } else {
            $blockopt = 0;
        }
        $data = array('blocked' => $blockopt);
        $this->services_m->update($id, $data);
        redirect('management/services', 'location', 301);
    }

    public function replace_image($id = null) {


        if ($id == NULL) {
            //upload starts here
            $upload = $this->services_m->one_file_upload();  //upload slide image 

            if ($upload['upload'] == TRUE) {

                $data['img_url'] = $upload['upload_data']['file_name'];
                if ($this->input->post('id') != '') {
                    $id = $this->input->post('id');
                    $this->services_m->update($id, $data);
                }
                redirect('management/services', 'location', 301);
//                redirect('services/admin/edit/' . $id, 'location', 301);
            } else {
                $this->data['uploaderror'] = $upload['error'];
            }
        }  else {
            $this->data['services'] = $this->services_m->get($id); //fetch data from db  
        }
        //upload ends here 


        $this->data['title'] = 'Replace Image';
        $this->data['subview'] = 'services/replace_image';
        $this->output();
    }

    public function edit_form_rules() {
        return array(
            'title' => array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'trim|required'
            ),
            'summary' => array(
                'field' => 'summary',
                'label' => 'Summary',
                'rules' => 'trim|required'
            ),
            'body' => array(
                'field' => 'body',
                'label' => 'Body',
                'rules' => 'trim|required'
            )
        );
    }

}
