<?php

class Articles_m extends MY_Model {

    protected $_table = 'blog_articles';
    protected $_order_by = 'modified desc, id desc';
    protected $_timestamps = TRUE;
    public $rules = array(
        'pubdate' => array(
            'field' => 'pubdate',
            'label' => 'Publication date',
            'rules' => 'trim|required'),
        'title' => array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'trim|required|max_length[100]'),
//        'slug' => array('field' => 'slug', 'label' => 'Slug', 'rules' => 'trim|required|max_length[100]|url_title|xss_clean'),
//        'category' => array('field' => 'category', 'label' => 'Category', 'rules' => 'trim|required'),
        'body' => array('field' => 'body', 'label' => 'Body', 'rules' => 'trim|required'));

    public function get_new() {
        $article = new stdClass();
        $article->id = '';
        $article->title = '';
        $article->slug = '';
        $article->category = '';
        $article->body = '';
        $article->article_hits = '';
        $article->article_status = 0;
        $article->pubdate = date('Y-m-d');
        return $article;
    }

    public function set_published() {
        $this->db->where('pubdate <=', date('Y-m-d'));
    }

    public function get_recent($limit = 5) {

        // Fetch a limited number of recent articles
        $limit = (int) $limit;
        $this->set_published();
        $this->db->limit($limit);
        $this->db->where(array('article_status' => 1));
        return parent::get();
    }

    //add an hit/article view
    public function counter_incr($id) {
        $id = (int) $id;
        $this->db->select('article_hits')->from($this->_table)->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $hits = $row->article_hits + 1;
            $data = array('`article_hits`' => $hits);
            $this->db->where('id', $id);
            $this->db->update($this->_table, $data);
            return TRUE;
        }
        return FALSE;
    }

    public function article_view_count_incr($id) {
        return "UPDATE `health`.`$this->_table` SET `article_hits` = `article_hits+1` WHERE `articles`.`id` = $id";
    }

//search
    public function search($q) {
        $query = $_GET['q'];
        // gets value sent over search form
        // We preform a bit of filtering 
        $query1 = strip_tags($query);
        $query2 = trim($query1);
        $query3 = preg_replace('/\s+/', ' ', $query2);
        $query4 = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', ' ', $query3);
        $min_length = 3;   // you can set minimum length of the query if you want
        if (strlen($query4) >= $min_length) { // if query length is more or equal minimum length then
            $query5 = htmlspecialchars($query4); // changes characters used in html to their equivalents, for example: < to &gt;

            $query6 = mysql_real_escape_string($query5); // makes sure nobody uses SQL injection

            $this->db->select('*');
            $this->db->from($this->_table);
            $this->db->like('title', $query6, 'both');
            $this->db->or_like('category', $query6, 'both');
            $this->db->or_like('body', $query6, '');
            $result = $this->db->get();
            return $result->result_array();

            // * means that it selects all fields, you can also write: `id`, `title`, `text`
            // articles is the name of our table
            // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
            // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
            // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
        } else { // if query length is less than minimum
            echo "Minimum length is " . $min_length;
        }
    }

    function get_ip() {

        //Just get the headers if we can or else use the SERVER global
        if (function_exists('apache_request_headers')) {

            $headers = apache_request_headers();
        } else {

            $headers = $_SERVER;
        }

        //Get the forwarded IP if it exists
        if (array_key_exists('X-Forwarded-For', $headers) && filter_var($headers['X-Forwarded-For'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {

            $the_ip = $headers['X-Forwarded-For'];
        } elseif (array_key_exists('HTTP_X_FORWARDED_FOR', $headers) && filter_var($headers['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)
        ) {

            $the_ip = $headers['HTTP_X_FORWARDED_FOR'];
        } else {

            $the_ip = filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
        }

        return $the_ip;
    }

    public function array_in_post($fields) {
        $data = array();
        foreach ($fields as $field) {
            if ($this->input->post($field) !== NULL) {
                $data[$field] = $this->input->post($field);
            }
        }

        return $data;
    }

}
