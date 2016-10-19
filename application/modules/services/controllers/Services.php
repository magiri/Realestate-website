<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class Services extends Public_Controller {

    var $services_m;

    public function __construct() {
        parent::__construct();
        $this->data = "";
        $this->services_m = new Gen_model;
        $this->services_m->create_model('services');
        $this->data['title'] = "Services";
        $this->load->helper('text');
        $this->load->helper('string');
    }

    public function index() {

        $this->data['services'] = $this->get_by(array('blocked' => 0));
        $this->data['loans'] = $this->get_by(array('blocked' => 0));

     
        $this->data['subview'] = "services_v";
     $this->output();
    }

    public function read_more($id = null) {

        $this->data['service'] = $this->services_m->get_by(array('id' => $id, 'blocked' => 0), TRUE);

        count($this->data['service']) || redirect('services');

     
        $this->data['subview'] = "read_more";
     $this->output();
    }

    public function enquire() {

        $this->load->module('mail');
        $service = $this->get($this->input->post('service_id'), true);
        $rules = $this->services_m->myrules;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == true) {
            $data = $this->services_m->array_in_post(array('names', 'phone_number', 'email', 'message'));
            $message = '<b>Enquiry On:</b> ' . $service->title . '<br/><br/><b>From:<b> ' . $data['names'] .
                    '<br/><br/><b>Email:</b> ' . $data['email'] . '<br/><br/><b>Phone Number</b> ' . $data['phone_number'] .
                    '<br/><br/><b>Message</b><br/> ' . $data['message'];

            //save in the database
            $data['service_id'] = $this->input->post('service_id');
            $this->db->insert('enquiries', $data);
            $mailstatus = $this->mail->sendmail($data['email'], $data['names'], $message, 'Events By premier Enquiry', array('0' => 'japhethwaswa@gmail.com'));
        }

        redirect('services', 'location', 301);
    }

    public function get($id = NULL) {
        return $this->services_m->get_many_by($id);
    }

    public function get_by($where ) {
        return $this->services_m->get_many_by($where);
    }

//    public function gt($slug) {
//        $data['title'] = $slug;
//        $data['carItems'] = $this->services_m->get_by(array('slug' => $slug, 'blocked !=' => 1,'is_deleted'=>0), true);
//        $data['subview'] = 'index';
//     
//        $this->template->public_two_col($data);
//    }
//
//    public function carItemsall() {
//        /*         * ****************************pagination logic start here*************************** */
//
//        if ($this->uri->segment(3) < 0) {     //ensure the offset number is not less than data availabale in database
//            redirect('carItems/carItemsall', 'location', '301');
//        }
//
//        $perpage = 10;
//        $count = $this->db->where(array('blocked'=>0,'is_deleted'=>0,'pubdate <=' => date('y-m-d')))->from('carItems')->count_all_results();
//
//        if ($this->uri->segment(3) > $count) {      //ensure the offset number is not greater than data availabale in database
//            redirect('carItems/carItemsall', 'location', '301');
//        }
//
//        if ($count > $perpage) { /* if data greater than per page then set up pagination */
//
//            /* pagination configs */
//            $config['per_page'] = $perpage;
//            $config['uri_segment'] = 3;
//            $config['total_rows'] = $count;
//            $config['base_url'] = site_url($this->uri->segment(1) . '/' . 'carItemsall' . '/');
//
//            $this->pagination->initialize($config);
//            $this->data['pagination'] = $this->pagination->create_links();
//            $offset = $this->uri->segment(3);
//
//            /* additional data */
//            $this->data['offset_data'] = $offset;
//        } else {
//            $offset = 0;
//            $this->data['pagination'] = '';
//        }
//
//        /* fetch courses */
//        $this->db->limit($perpage, $offset);
//        $this->db->where(array('pubdate <=' => date('y-m-d'),'blocked' => 0,'is_deleted'=>0));
//        $this->data['carItemsall'] = $this->get();
//
//        /* amount of data available according to uri segment(3) or just request */
//        if (count($this->data['carItemsall'])) {
//            $this->data['noOfcarItemsall'] = $count;
//        } else {
//            $this->data['noOfcarItemsall'] = 0;
//        }
//
//        /*         * ***********pagination logic ends here************************** */
//
//        $this->data['title'] = 'All News';
//        $this->data['subview'] = 'carItemsallsum';
//     
//        $this->template->public_two_col($this->data);
//    }

    public function _upload_image() {
        return $this->services_m->one_file_upload();
    }

//    public function get_DropdownArray(){
//        return $this->services_m->get_DropdownArray();
//    }

    public function _delete_previous($img_url = null) {
        return $this->services_m->_delete_previous($img_url);
    }

    public function get_new() {
        return $this->services_m->get_new();
    }

//    public function get_recent($limit = 3) {
//        return $this->services_m->get_recent($limit);
//    }

    public function _rules() {
        return $this->services_m->rules;
    }

    public function _array_in_post($fields) {
        return $this->services_m->array_in_post($fields);
    }

    public function _save($data, $id = null) {
        $this->services_m->update($id, $data);
    }

    public function _delete($id = NULL) {
        $this->services_m->_delete($id);
    }

    public function _deleteall() {
        $this->services_m->_deleteall();
    }

    public function countAllResults() {
        return $this->db->from('services')->count_all_results();
    }

}
