<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function upload_multiple_files()
    {
        $this->load->helper('form');
        $data['title'] = 'Multiple file upload';

        if ($this->input->post()) {
            $config = array(
                'upload_path' => 'http://127.0.0.1/ebony/assets/uploads/',
                'allowed_types' => 'gif|jpg|png',
                'max_size' => '2048'
            );

            // load Upload library
            $this->load->library('upload', $config);

            $this->upload->do_upload('uploadedimages');

            echo '<pre>';
            $uploaded = $this->upload->data();
            print_r($uploaded);
            echo '</pre>';
            echo '<hr />';
            echo '<pre>';
            print_r($this->upload->display_errors());
            echo '</pre>';
            exit();
        }
        $this->load->view('upload_form', $data);
    }
}