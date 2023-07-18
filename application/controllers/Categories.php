<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

    function __construct(){
        parent::__construct();
        if(!isset($this->session->user_id) && ($this->session->user_status != 1)){
            redirect('admin');
        }
        $this->load->model('categories_model');

    }

    function show_add_category_form(){
        $data = array();
		$data['admin_maincontent'] =  $this->load->view('admin/admin_pages/add_category_form','', true);
		$this->load->view('admin/admin_master', $data);

    }

    function save_category(){

        $this->categories_model->save_category();
        $this->show_all_categories();

        // $data = array();
		// $data['admin_maincontent'] =  $this->load->view('admin/admin_pages/add_category_form','', true);
		// $this->load->view('admin/admin_master', $data);

    }

    function show_all_categories(){

       $category_data['categories']  = $this->categories_model->get_all_categories();
       $data['admin_maincontent'] =  $this->load->view('admin/admin_pages/all_category',$category_data, true);
	   $this->load->view('admin/admin_master', $data);


    }

    function change_category_status($category_id, $status){

        $this->categories_model->change_category_status($category_id, $status);
        $this->show_all_categories();

        // $category_data['categories']  = $this->categories_model->get_all_categories();
        // $data['admin_maincontent'] =  $this->load->view('admin/admin_pages/all_category',$category_data, true);
        // $this->load->view('admin/admin_master', $data);
 
 
     }

     function edit_category($category_id){

        $data['category_data'] = $this->categories_model->get_category_detail($category_id);
        $data['admin_maincontent'] =  $this->load->view('admin/admin_pages/edit_category_form',$data, true);
        $this->load->view('admin/admin_master', $data);
 
 
     }

     function update_category(){
         $this->categories_model->update_category();
         redirect('all-category');

     }








}
