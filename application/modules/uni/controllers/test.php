<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class test extends MX_Controller {

 
    var $data;

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->module('tables');
        $datatables = new tables;
        
        $datatables->set_table('users');
        
     $datatables->set_display_cols(array(
         'username'=>'Name',
         'email'=>'Desc', 
         
     ));
     $datatables->set_edit_field('user_id');
     $datatables->set_edit_links(array(
         'edit'=>'/products/admin/edit/',
         'delete'=>'products/admin/delete_product/',
         'Make Home'=>'products/admin/make_home/',
       
         
     ));
             
     
     $datatables->all_data_output();
   echo $datatables->output();
    }

}
