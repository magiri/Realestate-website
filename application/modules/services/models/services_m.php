<?php

class services_m extends MY_Model {

    var $img_upload_path;
    protected $_table= 'services';
    protected $_primary_key = 'id';
    protected $_order_by = 'id desc';
    public function rules() { 
        return array(
        'title' => array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'trim|xss_clean|required'
        ),
        'summary' => array(
            'field' => 'summary',
            'label' => 'Summary',
            'rules' => 'trim|xss_clean|required'
        ),
        'body' => array(
            'field' => 'body',
            'label' => 'Body',
            'rules' => 'trim|required'
        )
    );}
    public function myrules(){
            return array(
        'names' => array(
            'field' => 'names',
            'label' => 'Names',
            'rules' => 'trim|xss_clean'
        ),
        'phone_number' => array(
            'field' => 'phone_number',
            'label' => 'phone_number',
            'rules' => 'trim|xss_clean'
        ),
        'email' => array(
            'field' => 'email',
            'label' => 'email',
            'rules' => 'trim|xss_clean'
        ),
        'message' => array(
            'field' => 'message',
            'label' => 'message',
            'rules' => 'trim|required|xss_clean'
        )
);}

    public function __construct() {
        parent::__construct();
        $this->img_upload_path = 'assets/filesManagement/album';
    }

    public function get_new() {
        $servicess = new stdClass();
        $servicess->id = '';
        $servicess->title = '';
        $servicess->summary = '';
        $servicess->body = '';
        $servicess->img_url = '';
        $servicess->blocked = '';
        return $servicess;
    }

//    public function get_DropdownArray() {
//        
//        $servicess = $this->get();
//        /* return key => pair value array */
//        $array = $this->uri->segment(1) != 'admin' ? array() : array(0 => 'No Car Model');
//        if (count($servicess)) {
//            foreach ($servicess as $modelCar) {
//                //get child
//                $array[$modelCar->id] = $modelCar->name;
//            }
//        }
//        return $array;
//    }



    public function delete($id) {
        $data = $this->get($id, true);

        unlink('./' . $data->img_url); /*         * ***delete slider from disk space***** */
        parent::delete($data->id);
    }

    public function deleteall() {
        $data = $this->get();

        foreach ($data as $data) {
            unlink('./' . $data->img_url); /*             * ***delete slider from disk space***** */
            parent::delete($data->id);
        }
    }

    public function delete_previous($img_url) {
        unlink('./' . $img_url); /*         * ***delete slider from disk space***** */
    }

//    public function deleteall($id) {
//
//        $this->load->module('images');
//        $CarItemsData = $this->get_by(array('new_used' => $id));
//
//        foreach ($CarItemsData as $CarItemData) {  //this single image parent
//            $childimages = $this->images->get_by(array('parent_image_id' => $CarItemData->id)); //fetch all images with this image parent id
//            foreach ($childimages as $childimage) {
//                $this->images->_delete($childimage->id);
//            }
//
//            $this->deletethis($CarItemData);
//        }
//    }
//
//    public function deletethis($data) {
//        unlink('./' . $data->car_image_url); /*         * ***delete logo from disk space***** */
//        unlink('./' . $data->car_thumbnail_url); /*         * ***delete logo from disk space***** */
//        parent::delete($data->id);                                     /*         * ****delete from db*************** */
//    }
//        unlink('./' . $CarItemData->car_image_url); /*         * ***delete logo from disk space***** */
//        unlink('./' . $CarItemData->car_thumbnail_url); /*         * ***delete logo from disk space***** */
//        parent::delete($id);                         /*         * ****delete from db******* */


    public function _upload_image() {
        $this->load->library('upload');
        $config['upload_path'] = $this->img_upload_path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        //$config['max_size'] = '5000';
        $config['remove_spaces'] = true;
        $this->upload->initialize($config);

        if (!($this->upload->do_upload())) {
            return false;
        } else {

            $image_data = $this->upload->data();
            $data['img_url'] = $this->img_upload_path . '/' . $image_data['file_name'];  //ulr of the img to be sent to the db.

            return $data;
        }
    }

    public function countAllResults() {
        return $this->db->count_all_results($this->_table_name);
    }

}
