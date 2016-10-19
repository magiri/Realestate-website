<?php

class Gen_model extends MY_Model {
    /* --------------------------------------------------------------
     * VARIABLES
     * ------------------------------------------------------------ */

    /**
     * This model's default database table. Automatically
     * guessed by pluralising the model name.
     */
    protected $_table;

    /**
     * The database connection object. Will be set to the default
     * connection. This allows individual models to use different DBs
     * without overwriting CI's global $this->db connection.
     */
    public $_database;

    /**
     * This model's default primary key or unique identifier.
     * Used by the get(), update() and delete() functions.
     */
    protected $primary_key = 'id';

    /**
     * Support for soft deletes and this model's 'deleted' key
     */
    protected $soft_delete = FALSE;
    protected $soft_delete_key = 'deleted';
    protected $_temporary_with_deleted = FALSE;
    protected $_temporary_only_deleted = FALSE;

    /**
     * The various callbacks available to the model. Each are
     * simple lists of method names (methods will be run on $this).
     */
    protected $before_create = array();
    protected $after_create = array();
    protected $before_update = array();
    protected $after_update = array();
    protected $before_get = array();
    protected $after_get = array();
    protected $before_delete = array();
    protected $after_delete = array();
    protected $callback_parameters = array();

    /**
     * Protected, non-modifiable attributes
     */
    protected $protected_attributes = array();

    /**
     * Relationship arrays. Use flat strings for defaults or string
     * => array to customise the class name and primary key
     */
    protected $belongs_to = array();
    protected $has_many = array();
    protected $_with = array();

    /**
     * An array of validation rules. This needs to be the same format
     * as validation rules passed to the Form_validation library.
     */
    protected $validate = array();

    /**
     * Optionally skip the validation. Used in conjunction with
     * skip_validation() to skip data validation for any future calls.
     */
    protected $skip_validation = FALSE;

    /**
     * By default we return our results as objects. If we need to override
     * this, we can, or, we could use the `as_array()` and `as_object()` scopes.
     */
    protected $return_type = 'object';
    protected $_temporary_return_type = NULL;

    /* --------------------------------------------------------------
     * GENERIC METHODS
     * ------------------------------------------------------------ */

    /**
     * Initialise the model, tie into the CodeIgniter superobject and
     * try our best to guess the table name.
     * 
     */
    function __construct() {
        parent::__construct();
    }

    public function create_model($table_name, $primary_key = 'id') {
        $this->_table = $table_name;
        $this->primary_key = $primary_key;
    }

    public function file_upload() {

        $config['upload_path'] = './assets/uploads';
        $config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx';
        $config ['overwrite'] = FALSE;
        $config ['max_filename'] = 10000;
        $config['max_size'] = 0;
//        $config['max_width'] = 1024;
//        $config['max_height'] = 768;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);



        if (!$this->upload->do_multi_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());

            return $error;
        } else {
            $data = array('upload_data' => $this->upload->get_multi_upload_data());

            return $data;
        }
    }

    public function one_file_upload($name = 'userfile') {

        $config['upload_path'] = './assets/uploads';
        $config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx';
//        $config['max_size'] = 500000;
//        $config['max_width'] = 1024;
//        $config['max_height'] = 768;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);


        if (!$this->upload->do_upload($name)) {
            $error = array('error' => $this->upload->display_errors(),
                'upload' => FALSE,);

            return $error;
        } else {
            $data = array('upload_data' => $this->upload->data());
            $data['upload'] = TRUE;
            $this->load->library('image_lib');
            $config['image_library'] = 'gd2';
            $config['source_image'] = $data['upload_data']['full_path'];
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 75;
            $config['height'] = 50;
            $this->load->library('image_lib', $config);

            if ($this->image_lib->resize() == TRUE) {
                return $data;
            }
        }
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

    public function get_new($all) {
        $new = new stdClass();
        foreach ($all as $col) {
            $new->$col = '';
        }
        return($new);
    }

    public function get_categories() {
        $this->_table = 'categories';
        return $this->get_all();
    }

    public function get_features() {
        $this->_table = 'eb_features';
        return $this->get_all();
    }

    public function get_feature_name($id) {
        $this->_table = 'eb_features';
        return $this->get_by(array('id' => $id));
    }

    public function get_property_image($id, $main = TRUE) {
//        $model = new Gen_model;
        $this->create_model('eb_images');
        if ($main == TRUE) {
            $main_image = $this->get_by(array('field_id' => $id, 'main_image' => 1));
            if ($main_image == null) {
                $main_image = $this->get_by(array('field_id' => $id));
            }
            return $main_image;
        } else {
            return $this->get_many_by(array('field_id' => $id));
        }
    }
   public function putDashes($string) {
        //Lower case everything
        $string = strtolower($string);
        //Make alphanumeric (removes all other characters)
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        //Clean up multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);
        return $string;
    }
}
