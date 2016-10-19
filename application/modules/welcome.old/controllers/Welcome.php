<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MX_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome/welcome_message');
	}
        public function test_model() {
            $model = new Gen_model;
            
            $model->create_model('users', 'user_id');
            
            var_dump($model->get_many(array(1303536069)));
            
        }
        public function test_viewtable() {
            
            $this->load->module('viewtable');
            $viewtable = new viewtable;
            $viewtable->set_table('users');
            $viewtable->set_display_cols(array(
                'id'=>"private",
                'username'=>"Name",
                'email'=>"mail"
            ));
            $viewtable->all_data_output();
            var_dump( $viewtable->output());
        }
}
