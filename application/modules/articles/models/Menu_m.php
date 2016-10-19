<?php

class Menu_m extends MY_Model {

    protected $_table = 'blog_menus';
    protected $_order_by = 'id desc';
    protected $_timestamps = false;
    public $rules = array(
        'title' => array('field' => 'title', 'label' => 'Title', 'rules' => 'trim|required|max_length[100]|xss_clean'),
    );

    public function get_new() {
        $category = new stdClass();
        $category->id = '';
        $category->title = '';
        $category->slug = '';
        return $category;
    }

    //get events dropdown
    public function get_DropdownArray() {
        $articles = $this->get_all();
        /* return key => pair value array */
        $array = $this->uri->segment(1) != 'sitemanagement' ? array() : array(0 => 'Select article category');
        if (count($articles)) {
            foreach ($articles as $article) {
                //get child
                if ($article->slug != 'news') {
                    $array[$article->id] = $article->title;
                }
            }
        }
        return $array;
    }

    /*get events dropdown*/
}
