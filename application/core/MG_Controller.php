<?php

class MG_Controller extends Auth_Controller {

    /**
     * Class constructor
     */
    public function __construct() {
        parent::__construct();
        $this->require_role('admin');
        // Admin sees this ...  
    $this->load->library('form_validation');
        $this->data['main_header'] = '';
        $this->data['page_title'] = 'Site Management';
        $this->data['page_desc'] = 'Ebony Estates Site Management';
        $this->is_logged_in();
        $this->template = "management/template";
//        $this->data['enable_tables'] = FALSE;
    }

    public function table($table, $cols, $links) {
        $this->load->module('uni/tables');
        $datatables = new tables;

        $datatables->set_table($table);

        $datatables->set_display_cols($cols);
        $datatables->set_edit_field('id');
        $datatables->set_edit_links($links);


        $datatables->all_data_output();
        $this->data['subview_string'] = $datatables->output();
        $this->output();
    }

}
