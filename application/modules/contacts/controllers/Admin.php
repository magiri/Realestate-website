<?php

class Admin extends MG_Controller {

    var $contacts_model;

    function __construct() {
        parent::__construct();

        $this->load->module('contacts');                  //use the methods in this module(contacts) ie $this->contacts->get();
        $this->data = '';
        $this->data['title'] = 'Admin';
        $this->contacts_model = new Gen_model;
        $this->contacts_model->create_model('contacts');
    }

    public function index() {


        /*         * ****************************pagination logic start here*************************** */

        if ($this->uri->segment(4) < 0) {     //ensure the offset number is not less than data availabale in database
            redirect('contacts/admin', 'location', '301');
        }

        $perpage = 10;
        $count = $this->contacts->countAllResults();

        if ($this->uri->segment(4) > $count) {      //ensure the offset number is not greater than data availabale in database
            redirect('contacts/admin', 'location', '301');
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

        /* fetch contacts */
        $this->db->limit($perpage, $offset);
        $this->data['contacts'] = $this->contacts->get();
        /* amount of data available according to uri segment(3) or just request */
        if (count($this->data['contacts'])) {
            $this->data['noOfcontacts'] = $count;
        } else {
            $this->data['noOfcontacts'] = 0;
        }

        /*         * ***********pagination logic ends here************************** */


        $this->data['title'] = 'Posts';
        $this->data['subview'] = 'admin/index';
        $this->output();
    }

    public function edit($id = NULL) {
        if ($id) {
            $this->data['contacts'] = $this->contacts->get($id);
            count($this->data['contacts']) ? $this->data['title'] = 'Edit contact Item' : redirect('admin/contact', 'location', '301');
        } else {
            redirect('contacts/admin', 'location', 301);
        }


        $rules = $this->contacts->_myrules();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() === true) {
            $data = $this->contacts->_array_in_post(array('email', 'name', 'display_on', 'phone_numbers', 'status', 'location'));
            $this->contacts->_save($data, $id);
            redirect('contacts/admin', 'location', 301);
        }

        $this->data['subview'] = 'admin/edit';
        $this->output();
    }

}
