<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Community Auth - MY Controller
 *
 * Community Auth is an open source authentication application for CodeIgniter 3
 *
 * @package     Community Auth
 * @author      Robert B Gottier
 * @copyright   Copyright (c) 2011 - 2016, Robert B Gottier. (http://brianswebdesign.com/)
 * @license     BSD - http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://community-auth.com
 */
//require_once APPPATH . 'third_party/community_auth/core/Auth_Controller.php';

class MY_Controller extends MX_Controller {

    /**
     * Class constructor
     */
    public $data;
    public $template;

    public function __construct() {
        parent::__construct();

        $this->data['main_header'] = '';
        $this->data['page_title'] = 'Ebony Estates';
        $this->data['page_desc'] = 'Ebony Estates';
        $this->template = "management/template";
    }

    public function output($subview = NULL, $subview_string = NULL) {
        if ($subview != NULL) {
            $this->data['subview'] = $subview;
        }
        if ($subview_string != NULL) {
            $this->data['subview_string'] = $subview_string;
        }
        $this->load->view($this->template, $this->data);
    }

    public function paginate($per_page = 12, $total_rows, $url) {
        if ($total_rows < $per_page) {
            return;
        } else {
            $this->load->library('pagination');

            $config['base_url'] = site_url($url);
            $config['total_rows'] = $total_rows;
            $config['per_page'] = $per_page;
            $config['cur_tag_open'] = '<li class = "active"><a href = "#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['full_tag_open'] = '<div> <ul class = "pagination pagination-lg">';
            $config['full_tag_close'] = '</ul></div>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['prev_link'] = 'Prev';
            $config['next_link'] = 'Next';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['attributes'] = array('class' => '');



            $this->pagination->initialize($config);
            $this->data['pagination'] = $this->pagination->create_links();
            $offset = intval($this->get_string_between($this->data['pagination'], $config['cur_tag_open'], $config['cur_tag_close']), 10);
            $offset = ($offset * $per_page) - $per_page;

            if ($total_rows != $per_page) {
                $this->Gen_model->limit($per_page, $offset);
            }
        }
    }

    function get_string_between($string, $start, $end) {
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0)
            return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }

}

/* End of file MY_Controller.php */
/* Location: /community_auth/core/MY_Controller.php */