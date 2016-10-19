<?php

class Articles extends Public_Controller {

    var $data;
    var $template;

    function __construct() {
        parent::__construct();

        $this->data = '';
        $this->load->model('articles_m');
        $this->load->model('menu_m');
        $this->load->module('template');
        $this->load->helper('cms_helper');

        $this->template = new template;
        $this->data['menu_list'] = $this->menu_m->get_all();
    }

    public function index() {
        $this->db->where(array('status' => 1));
        $count = $this->articles_m->count_all();
        if ($this->uri->segment(3) > $count) {      //ensure the offset number is not greater than data availabale in database
            redirect('articles', 'location', '301');
        }
        //set up pagination
        $per_page = 16;
        if ($count > $per_page) { /* if data greater than per page then set up pagination */
            $config['base_url'] = site_url($this->uri->segment(1) . '/' . 'index' . '/');
            $config['total_rows'] = $count;
            $config['per_page'] = $per_page;
            $config['uri_segment'] = 3;
            $this->pagination->initialize($config);
            $this->data['pagination'] = $this->pagination->create_links();
            $offset = $this->uri->segment(3);
            /* additional data */
            $this->data['offset_data'] = $offset;
        } else {
            $offset = 0;
            $this->data['pagination'] = '';
        }

        //end of pagination logic//        
        $this->db->limit($per_page, $offset);
        $this->data['articles_count'] = $count;

        $this->db->where(array('status' => 1));
        $this->data['articles'] = $this->articles_m->get_all();
        /* amount of data available according to uri segment(3) or just request */
        if (count($this->data['articles'])) {
            $this->data['noOfarticles'] = $count;
        } else {
            $this->data['noOfarticles'] = 0;
        }

        $this->data['title'] = ucwords('articles');
        $this->data['menu_list'] = $this->menu_m->get_all();
        $this->data['module'] = 'articles';
        $this->data['subview'] = 'gtall';

        $this->template->public_one_col($this->data);
    }

    //articles in homepage
    public function articles_home() {

        $this->db->limit(10);
        $this->db->where(array('status' => 1));
        $this->data['articles'] = $this->articles_m->get_all();
        $this->load->view('art_home', $this->data);
    }

    public function sort($id) {
        //$id = $this->uri->segment(3);        
        $this->db->where(array('status' => 1, 'category' => $id));
        $count = $this->articles_m->count_all();
        if ($this->uri->segment(5) > $count) {      //ensure the offset number is not greater than data availabale in database
            redirect('articles');
        }
        //set up pagination
        $per_page = 12;
        if ($count > $per_page) { /* if data greater than per page then set up pagination */
            $config['base_url'] = site_url('articles' . '/' . 'sort' . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/');
            $config['total_rows'] = $count;
            $config['per_page'] = $per_page;
            $config['uri_segment'] = 5;
            $this->pagination->initialize($config);
            $this->data['pagination'] = $this->pagination->create_links();
            $offset = $this->uri->segment(5);
            /* additional data */
            $this->data['offset_data'] = $offset;
        } else {
            $offset = 0;
            $this->data['pagination'] = '';
        }
        //end of pagination logic//        

        $this->db->where(array('category' => $id, 'status' => 1));
        $this->db->limit($per_page, $offset);
        $this->data['articles'] = $this->articles_m->get_all();
        /* amount of data available according to uri segment(3) or just request */
        if (count($this->data['articles'])) {
            $this->data['noOfarticles'] = $count;
        } else {
            $this->data['noOfarticles'] = 0;
        }


        //get article categories
        $this->data['cat-title'] = $this->menu_m->get($id);
        $this->data['title'] = ucwords($this->data['cat-title']->title);

        // Redirect if slug was incorrect
        $requested_slug = $this->uri->segment(4);
        $set_slug = $this->data['cat-title']->slug;
        if ($requested_slug != $set_slug) {
            redirect('articles/sort/' . $this->data['cat-title']->id . '/' . $this->data['cat-title']->slug, 'location', '301');
        }


        $this->data['module'] = 'articles';
        $this->data['subview'] = 'gtall';

        $this->template->public_one_col($this->data);
    }

    //view a single article
    public function viewart($id) {
        // Fetch the product
        $this->data['article'] = $this->articles_m->get($id);
        $idp = $this->data['article']->category;
        $this->data['cat-title'] = $this->menu_m->get($idp);
        $this->data['title_prev'] = ucwords($this->data['cat-title']->title);
        $this->data['prev_url'] = 'articles/sort' . '/' . $this->data['cat-title']->id . '/' . $this->data['cat-title']->slug;

        // Return 404 if not found
        count($this->data['article']) || show_404(uri_string());
        //add meta title
        $this->data['title'] = ucfirst($this->data['article']->title);
        // Redirect if slug was incorrect
        $requested_slug = $this->uri->segment(4);
        $set_slug = $this->data['article']->slug;
        if ($requested_slug != $set_slug) {
            redirect('articles/viewart/' . $this->data['article']->id . '/' . $this->data['article']->slug, 'location', '301');
        }


        //get related  
        $this->db->limit(4);
        $this->db->where(array('status' => 1, 'category' => $this->data['article']->category));
        $this->data['related'] = $this->articles_m->get_all();


        //add hit view
        $this->articles_m->counter_incr($id);


        // Load view
        $this->data['module'] = 'articles';
        $this->data['subview'] = 'single';

        $this->template->public_one_col($this->data);
    }

    //download an article
    public function download($id) {
        // Fetch the product
        $this->data['article'] = $this->articles_m->get($id);

        $idp = $this->data['article']->category;
        $this->data['cat-title'] = $this->menu_m->get($idp);
        $this->data['title_prev'] = ucwords($this->data['cat-title']->title);
        $this->data['prev_url'] = 'articles/sort' . '/' . $this->data['cat-title']->id . '/' . $this->data['cat-title']->slug;

        // Return 404 if not found
        count($this->data['article']) || show_404(uri_string());
        //add meta title
        $this->data['title'] = ucfirst($this->data['article']->title);
        // Redirect if slug was incorrect
        $requested_slug = $this->uri->segment(4);
        $set_slug = $this->data['article']->slug;
        if ($requested_slug != $set_slug) {
            redirect('articles/viewart/' . $this->data['article']->id . '/' . $this->data['article']->slug, 'location', '301');
        }


        // Load view
//        $this->load->library('cezpdf');
//        $this->prep_pdf();
//
//        $this->cezpdf->ezText(strtoupper(config_item('site_name')), 12, array('justification' => 'center', 'setCcolor' => '#60B001'));
//
//        $this->cezpdf->ezText('Website : http://routine-health.com', 10, array('justification' => 'center'));
//        $this->cezpdf->ezText('Email : contact@routine-health.com / omarnoor811@gmail.com', 10, array('justification' => 'center'));
//        $this->cezpdf->ezText('Phone : +254 722 219944', 10, array('justification' => 'center'));
//        $this->cezpdf->ezText('P.O BOX 46336-00100', 11, array('justification' => 'center'));
//
//        $this->cezpdf->ezSetDy(-15);
//        $this->cezpdf->ezText('DATE : ' . $this->data['article']->pubdate, 10, array('justification' => 'right'));
//        $this->cezpdf->ezSetDy(-5);
//        $this->cezpdf->ezText(ucfirst($this->data['article']->title), 11, array('justification' => 'left'));
//        $this->cezpdf->ezText(strip_tags($this->data['article']->body), 10, array('justification' => 'left'));
//
//        $this->cezpdf->ezSetDy(-10);
//        $this->cezpdf->ezStream();

        $html = '<html>'
                . '<head>'
                . '<head>'
                . '<body>'
                . '<center>'
                . '<h3><font style="color: #60B001">' . strtoupper(config_item('site_name')) . '</font></h3>'
                . ' <h5>Website: <font><a style="color: blue" href="http://routine-health.com">www.routine-health.com</a></font></h5>'
                . ' <h5 class="text text-info">Email: <font style="color: blue">contact@routine-health.com / omarnoor811@gmail.com</font> </h5>'
                . '<h5>Phone: <i class="fa fa-phone"></i>  +254 722 219944</h5>'
                . '<h4>P.O BOX 46336-00100</h4>'
                . '</center'
                . '<hr>'
                . '<p style="text-align:right"><strong>' . 'DATE: ' . date("Y-m-d", strtotime($this->data['article']->pubdate)) . '</strong></p>'
                . '<h3 class="article-titles text-info">' . '<font style="color:blue">' . ucfirst(e($this->data['article']->title)) . '</font>' . '</h3>'
                . '<p>' . ucfirst($this->data['article']->body) . '</p>'
                . '<hr>'
                . '<p>' . 'All right reserved  ' . '      ' . ucwords(config_item('site_name')) . '  website:  ' . '<a href="http://routine-health.com">.' . 'http://routine-health.com' . '</a>' . '.' . '     ' . '  Phone:  +254 722 219944' . '</p>'
                . '</body>'
                . '</html>';

        $pdf_filename = str_replace(' ', '_', $this->data['article']->title);
        $this->load->library('dompdf_lib');
        $this->dompdf_lib->convert_html_to_pdf($html, $pdf_filename, true);
    }

    //create headers and footers
    function prep_pdf($orientation = 'portrait') {
        $CI = & get_instance();
        $CI->cezpdf->selectFont(site_url() . '/fonts');
        $all = $CI->cezpdf->openObject();
        $CI->cezpdf->saveState();
        $CI->cezpdf->setStrokeColor(0, 0, 0, 1);
        if ($orientation == 'portrait') {
            $CI->cezpdf->ezSetMargins(50, 70, 50, 50);
            $CI->cezpdf->ezStartPageNumbers(500, 28, 8, '', '{PAGENUM}', 1);
            $CI->cezpdf->line(20, 40, 578, 40);
            $CI->cezpdf->addText(50, 32, 8, 'Printed on ' . date('m/d/Y h:i:s a'));
            $CI->cezpdf->addText(50, 22, 8, strtoupper(config_item('site_name')) . ' - http://routine-health.com');
        } else {
            $CI->cezpdf->ezStartPageNumbers(750, 28, 8, '', '{PAGENUM}', 1);
            $CI->cezpdf->line(20, 40, 800, 40);
            $CI->cezpdf->addText(50, 32, 8, 'Printed on ' . date('m/d/Y h:i:s a'));
            $CI->cezpdf->addText(50, 22, 8, strtoupper(config_item('site_name')) . ' - http://routine-health.com');
        }
        $CI->cezpdf->restoreState();
        $CI->cezpdf->closeObject();
        $CI->cezpdf->addObject($all, 'all');
    }

    //get limited recent articles in homepage
    public function recent() {


        $this->db->limit(6);
        $this->db->where(array('status' => 1));
        $this->data['articles'] = $this->articles_m->get_all();
        $this->load->view('recent', $this->data);
    }

//search start
    public function search($q = NULL) {
        // If the form has been submitted, rewrite the URL so that the search
        // terms can be passed as a parameter to the action. Note that there
        // are some issues with certain characters here.

        if ($this->input->post('q')) {
            redirect('/articles/search/' . $this->input->post('q'));
        }


        $this->data['title'] = ucwords('search results');
        $this->data['results'] = $this->articles_m->search($q);


        //get event categories
        $this->data['module'] = 'articles';
        $this->data['subview'] = 'searchresults';

        $this->template->public_one_col($this->data);
    }

    //get popular posts
    public function popular() {

        $this->db->limit(5);
        $this->db->order_by("article_hits", "desc");
        $this->db->where(array('status' => 1));
        $this->data['popular_posts'] = $this->articles_m->get_all();
        $this->load->view('popular', $this->data);
    }

}
