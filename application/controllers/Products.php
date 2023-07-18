<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    function __construct(){
        parent::__construct();
        if(!isset($this->session->user_id) && ($this->session->user_status != 1)){
            redirect('admin');
        }
        $this->load->model('categories_model');
        $this->load->model('products_model');

    }

    function get_all_active_categories(){
        return $this->categories_model->get_all_active_categories();
    }

    function add_product(){
        $data = array();
        $data['categories'] = $this->get_all_active_categories();
		$data['admin_maincontent'] =  $this->load->view('admin/admin_pages/add_product_form',$data, true);
		$this->load->view('admin/admin_master', $data);

    }

    function manage_product(){
        $data = array();
        $data['all_products'] = $this->products_model->get_all_products();
		$data['admin_maincontent'] =  $this->load->view('admin/admin_pages/manage_product',$data, true);
		$this->load->view('admin/admin_master', $data);

    }


    function change_product_status($product_id, $status){

        $this->products_model->change_product_status($product_id, $status);
        redirect('manage-product'); 
 
     }

     private function upload_product_image(){
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 1000;
        $config['max_width']            = 1024;
        $config['max_height']           = 1024;
        //$config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( $this->upload->do_upload('product_image'))
        {
            $data =  $this->upload->data();
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            $image_path = "uploads/$data[file_name]";
            return $image_path;
                
        }
        else
        {
            $error = $this->upload->display_errors();
            print_r($error);
            
        }
    }

    function save_product(){
        $product_image = $this->upload_product_image();
        $this->products_model->save_product($product_image);
        $this->session->set_userdata('message', 'Product saved successfully!');
        $this->add_product();
    }

     function edit_product($product_id){

        $data['category_info'] = $this->get_all_active_categories();
        $data['product_info'] = $this->products_model->get_product_detail($product_id);
        $data['admin_maincontent'] =  $this->load->view('admin/admin_pages/edit_product_form',$data, true);
        $this->load->view('admin/admin_master', $data);
     }

     function update_product(){
        // echo "<pre>";
        // print_r($_FILES);
        // echo "</pre>";
        if ($_FILES['product_image']['name'] == '' || $_FILES['product_image']['size']==0) {
            $product_image = $this->input->post('product_old_image', true);
            $this->products_model->update_product($product_image);
            
        } else {
            $product_image = $this->upload_product_image();
            $this->products_model->update_product($product_image);
            
        }
        
     }







}
