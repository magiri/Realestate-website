<?php

class Admin extends MX_Controller {

    var $data;

    function __construct() {
        parent::__construct();
        modules::run('sitesecurity/adminisloggedin');
        $this->load->module('services');                  //use the methods in this module(posts) ie $this->posts->get();
        $this->form_validation->CI = & $this;
        $this->data = '';
        $this->data['uploaderror'] = array('error' => '');
        $this->data['title'] = 'Admin';
        $this->load->model('services_m');
        //$this->data['replacingsliderimage'] = false;
    }

    public function index() {


        /*         * ****************************pagination logic start here*************************** */

        if ($this->uri->segment(4) < 0) {     //ensure the offset number is not less than data availabale in database
            redirect('services/admin', 'location', '301');
        }

        $perpage = 10;
        $count = $this->services_m->countAllResults();
        if ($this->uri->segment(4) > $count) {      //ensure the offset number is not greater than data availabale in database
            redirect('services/admin', 'location', '301');
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
        $this->data['services'] = $this->services_m->get();

        /* amount of data available according to uri segment(3) or just request */
        if (count($this->data['services'])) {
            $this->data['noOfservices'] = $count;
        } else {
            $this->data['noOfservices'] = 0;
        }

        /*         * ***********pagination logic ends here************************** */


        $this->data['title'] = 'Services';
        $this->data['subview'] = 'admin/index';
        $this->load->view('admin/_admin_main_layout', $this->data);
    }

//    public function view_units($id = null){
//        
//        if ($this->uri->segment(5) < 0) {     //ensure the offset number is not less than data availabale in database
//            redirect('admin/service', 'location', '301');
//        }
//
//        $perpage = 14;
//        $count = $this->db->where(array('relatedproperty' => $id))->from('services')->count_all_results();
//        $count > 0 || redirect('admin/service', 'location', '301');
//        if ($this->uri->segment(5) > $count) {      //ensure the offset number is not greater than data availabale in database
//            redirect('admin/service', 'location', '301');
//        }
//
//        if ($count > $perpage) { /* if data greater than per page then set up pagination */
//
//            /* pagination configs */
//            $config['per_page'] = $perpage;
//            $config['uri_segment'] = 5;
//            $config['total_rows'] = $count;
//            $config['base_url'] = site_url($this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . 'view_units' . '/'.$id.'/');
//
//            $this->pagination->initialize($config);
//            $this->data['pagination'] = $this->pagination->create_links();
//            $offset = $this->uri->segment(5);
//
//            /* additional data */
//            $this->data['offset_data'] = $offset;
//        } else {
//            $offset = 0;
//            $this->data['pagination'] = '';
//        }
//
//        /* fetch  */
//        $this->db->limit($perpage, $offset);
//        $this->db->where(array('relatedproperty' => $id));
//        $this->data['services'] = $this->services_m->get();
//
//        /* amount of data available according to uri segment(3) or just request */
//        if (count($this->data['services'])) {
//            $this->data['noOfservices'] = $count;
//        } else {
//            $this->data['noOfservices'] = 0;
//        }
//
//        /*         * ***********pagination logic ends here************************** */
//
//        
//        $this->data['propid'] = $id;
//        if($id !=0){
//         $this->data['title'] = modules::run('liberty/get',$id,true)->name.' Units';
//        }else{
//        $this->data['title'] = 'Non Categorized Units';
//        }
//        $this->data['subview'] = 'service/viewunits';
//        $this->load->view('_admin_main_layout', $this->data);
//        
//    }
    public function add($type) {
        
        if ($type=='serv'){
            $type=1;
        }elseif($type=='loan'){
              $type=2;
        }  else {
              $type=0; 
        }
        $this->data['type']=$type;
        $this->data['services'] = $this->services_m->get_new();
        $this->data['title'] = 'New Service';
        $this->data['subview'] = 'admin/edit';
        $this->load->view('admin/_admin_main_layout', $this->data);
    }

    public function edit($id = NULL) {
        if ($id) {
            $this->data['services'] = $this->services_m->get($id);
            count($this->data['services']) ? $this->data['title'] = 'Edit Service' : redirect('admin/service', 'location', 301);
        } else {
            $this->data['services'] = $this->services_m->get_new();
            $this->data['title'] = 'New Service';
        }

        /*         * ****fetch properties for dropdown for dropdown****** */
//        $this->load->module('liberty');
//        $this->data['libproperties']= $this->liberty->get_DropdownArray();

        $rules = $this->services_m->rules();
        $this->form_validation->set_rules($rules);


        if ($this->form_validation->run() === true) {
            $data = $this->services_m->array_in_post(array('title', 'summary', 'body','type'));

            $uploadimage = $this->input->post('uploadimage');
            if ($uploadimage == 1) {
                //upload starts here
                $this->data['uploadstatus'] = $this->services_m->_upload_image();  //upload slide image 
                if ($this->data['uploadstatus'] !== false) {

                    $data['img_url'] = $this->data['uploadstatus']['img_url'];
                } else {
                    $this->data['uploaderror'] = array('error' => $this->upload->display_errors());
                }
                //upload ends here 
            }

            if (strlen($this->data['uploaderror']['error']) < 1) {
                $this->services_m->save($data, $id);
                redirect('services/admin', 'location', 301);
            }
//            $data['slug']= strtolower(url_title($data['name']));
        }

        //$this->data['title'] = 'Service';
        $this->data['subview'] = 'admin/edit';
        $this->load->view('admin/_admin_main_layout', $this->data);
    }

    public function delete($id = NULL) {

        is_numeric($id) || redirect('services/admin', 'location', 301);
        $this->services_m->delete($id);
        redirect('services/admin', 'location', 301);
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
        redirect('services/admin', 'location', 301);
    }

    public function blockopt($opt) {
        $id = $this->uri->segment(5);
        $optsarray = array('block', 'unblock');
        $opt = (in_array($opt, $optsarray)) ? $opt : redirect('services/admin', 'location', 301);    //check if the option is the actual one ie either block or unblock
        if ($opt == 'block') {
            $blockopt = 1;
        } else {
            $blockopt = 0;
        }
        $data = array('blocked' => $blockopt);
        $this->services_m->save($data, $id);
        redirect('services/admin', 'location', 301);
    }

    public function replace_image($id = null) {

        $id || redirect('services/admin', 'location', 301);

        $this->data['services'] = $this->services_m->get($id, true); //fetch data from db

        $replaceinspectorvalue = $this->input->post('replaceinspector');

        if (isset($replaceinspectorvalue) && $replaceinspectorvalue == true) {
            //upload starts here
            $this->data['uploadstatus'] = $this->services_m->_upload_image();  //upload slide image 
            if ($this->data['uploadstatus'] !== false) {

                $data['img_url'] = $this->data['uploadstatus']['img_url'];
                //delete previous image
                $this->services_m->delete_previous($this->data['services']->img_url);
            } else {
                $this->data['uploaderror'] = array('error' => $this->upload->display_errors());
            }
            //upload ends here 

            if (strlen($this->data['uploaderror']['error']) < 1) {
                $this->services_m->save($data, $id);
                redirect('services/admin/edit/' . $id, 'location', 301);
            }
        }


        $this->data['title'] = 'Replace Image';
        $this->data['subview'] = 'admin/replace_image';
        $this->load->view('admin/_admin_main_layout', $this->data);
    }

}
