<?php

class Admin extends MG_Controller {

    var $template = 'management/template';

    function __construct() {
        parent::__construct();

        modules::run('sitesecurity/adminisloggedin');


        $this->load->helper('cms_helper');
        $this->load->model('articles_m');
        $this->load->model('menu_m');
    }

    public function index() {
        $count = $this->db->count_all_results('blog_articles');
        if ($this->uri->segment(4) > $count) {      //ensure the offset number is not greater than data availabale in database
            redirect('articles/admin', 'location', '301');
        }
        //set up pagination
        $per_page = 16;
        if ($count > $per_page) { /* if data greater than per page then set up pagination */
            $config['base_url'] = site_url($this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . 'index' . '/');
            $config['total_rows'] = $count;
            $config['per_page'] = $per_page;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $this->data['pagination'] = $this->pagination->create_links();
            $offset = $this->uri->segment(4);
            /* additional data */
            $this->data['offset_data'] = $offset;
        } else {
            $offset = 0;
            $this->data['pagination'] = '';
        }

        //end of pagination logic//        
        $this->db->limit($per_page, $offset);
        $this->data['articles_count'] = $count;
        $this->data['articles'] = $this->articles_m->get_all();

        $this->data['menu_cont'] = $this->menu_m->get_all();
        $this->data['title'] = ucfirst('articles');
        $this->data['module'] = 'articles';
        $this->data['subview'] = 'admin_articles/index';
        $this->load->view($this->template, $this->data);
    }

    //add a articles item or edit if available//
    public function edit($id = NULL, $othe = NULL) {
        // Fetch a article or set a new one
        if ($id) {
            $this->data['articles'] = $this->articles_m->get_by(array('id' => $id));
//            count($this->data['articles']) || $this->data['errors'][] = 'articles article could not be found';
        } else {
            $this->data['articles'] = $this->articles_m->get_new();
        }

        //dropdown of artical categories//
        $this->data['category'] = $this->get_DropdownArray();
        //dropdown of artical categories//
        // Set up the form
        $rules = $this->articles_m->rules;
        $this->form_validation->set_rules($rules);
     
        // Process the form
        if ($this->form_validation->run() == TRUE) {
            $data = $this->articles_m->array_in_post(array(
                'title',
                'body',
                'pubdate',
                'article_date',
                'status'
            ));
            $data['slug'] = url_title($data['title'], 'dash', TRUE);
            $data['category'] = 1;
            $data['article_date'] = date("Y-m-d", strtotime($data['pubdate']));
            
            if ($this->input->post('id') == '') {
                $id = $this->articles_m->insert($data);
            } else {
                if ($this->articles_m->update($id, $data)) {
                    $this->session->set_flashdata('success', 'Article updated successively');
                    $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable col-md-6 col-lg-offset-3">' . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . '<strong>Success!</strong> Article updated successively</div>');
                }
            }

            redirect('articles/admin');
        }
        $this->data['title'] = ucfirst('manage articles');
        $this->data['module'] = 'articles';
        $this->data['subview'] = 'admin_articles/edit';
        $this->load->view($this->template, $this->data);
    }

    //fecth a single article//
    public function viewart($id, $slug) {
        // Fetch the article
        $this->data['article'] = $this->articles_m->get_by(array('id' => $id));
        // Return 404 if not found
        count($this->data['article']) || show_404(uri_string());
        //add meta title
        $this->data['title'] = $this->data['article']->title;
        // Redirect if slug was incorrect
        $requested_slug = $this->uri->segment(5);
        $set_slug = $this->data['article']->slug;
        if ($requested_slug != $set_slug) {
            redirect('articles/admin/single/' . $this->data['article']->id . '/' . $this->data['article']->slug, 'location', '301');
        }

        // Load view
        $this->data['module'] = 'articles';
        $this->data['subview'] = 'admin_articles/single';
        $this->load->view($this->template, $this->data);
    }

    //block unblock an article
    public function blockopt($opt = null) {
        $id = $this->uri->segment(5);
        $optsarray = array('block', 'unblock');
        $opt = (in_array($opt, $optsarray)) ? $opt : redirect('articles/admin', 'location', 301);    //check if the option is the actual one ie either block or unblock
        if ($opt == 'block') {
            $blockopt = 0;
        } else {
            $blockopt = 1;
        }
        $data = array('status' => $blockopt);
        $this->articles_m->update($id, $data);
        redirect('articles/admin', 'location', 301);
    }

    //delete an article
    public function delete($id) {
        $this->articles_m->delete($id);
        redirect('articles/admin');
    }

    //get dropdown events category//
    public function get_DropdownArray() {
        return $this->menu_m->get_DropdownArray();
    }

    public function broadcast($id) {
        // Fetch the article
        $this->data['article'] = $this->articles_m->get_all($id);
        // Return 404 if not found
        count($this->data['article']) || show_404(uri_string());
        //add meta title
        $this->data['title'] = $this->data['article']->title;


        $this->load->model('newsletter_m');
        $this->data['subscribers'] = $this->newsletter_m->get_dropdown();
        $arrayMembers = $this->data['subscribers'];

        $this->load->model('newsletter_m');
        $message = '<p class="timestamp">' . '<i class="fa fa-calendar"></i>' . '  ' . $this->data['article']->pubdate . '</p>'
                . '<h3 class="text text-info">' . ucfirst(e($this->data['article']->title)) . '</h3>'
                . ucfirst($this->data['article']->body) . '</p>'
                . '<div class="clearfix">' . '</div>'
                . '<h2>' . config_item('site_name') . '</h2>'
                . '<p>' . anchor(site_url(), 'www.frank-set.com') . '</p>'
                . '<p>' . ' (+257) 714 328314' . '</p>'
                . '<div class="clearfix">' . '</div>'
                . '<p>' . 'If you do not want to receive this emails in future, follow link below to unsubscribe' . '</p>'
                . '<div class="clearfix">' . '</div>'
                . '<p>' . anchor(site_url('newsletter/unsubscribe'), '<button class="btn btn-primary">' . 'Unsunscribe' . '</button>') . '</p>';



        $this->load->module('mail');
        if ($this->mail->newsletter('contact@frankset.com', ucwords(config_item('site_name')), $message, $this->data['article']->title, array($arrayMembers))) {
            $this->session->set_flashdata('success', 'Your contact mail has been sent');
            redirect(site_url('posts_admin'));
        } else {
            show_error($this->email->print_debugger());
        }
    }

}
