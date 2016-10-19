<?php

class uni extends MY_Model {

    protected $_table_name = '';
  

    public function __construct() {
        parent::__construct();
    }

   

    public function setTable($table) {
        return $this->_table_name = $table;
    }
    
     public function flike($where = Array(), $single = FALSE) {
        $this->db->or_like($where);
       return $this->get(NULL,$single);
         
    }

}
