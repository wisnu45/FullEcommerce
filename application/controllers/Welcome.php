<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('welcome_model');
    }

	public function index()
	{
		$data=array();
		$data['title'] = 'Home';
		$data['slider'] = $this->load->view('pages/slider','',true);
		$data['all_active_products'] = $this->welcome_model->get_all_active_products();
		$data['featured_product'] = $this->load->view('pages/featured_product',$data,true);
		$data['category_tab'] = $this->load->view('pages/category_tab','',true);
		$data['recommended_items'] = $this->load->view('pages/recommended_items','',true);
		$this->load->view('master',$data);
	}

	public function accounts()
	{
		$data=array();
		$data['title'] = 'Accounts';
		$data['slider'] = '';
		$data['featured_product'] = "<h1>This is Accounts Page</h1>";
		$data['category_tab'] = $this->load->view('pages/category_tab','',true);
		$data['recommended_items'] = $this->load->view('pages/recommended_items','',true);
		$this->load->view('master',$data);
	}

	public function product_details($product_id){
		$data=array();
		$data['title'] = 'Product Details';
		$data['slider'] = '';
		$data['product_info'] = $this->welcome_model->select_product_by_id($product_id);
		$data['featured_product'] = $this->load->view('pages/product_details',$data,true);
		$data['category_tab'] = $this->load->view('pages/category_tab','',true);
		$data['recommended_items'] = $this->load->view('pages/recommended_items','',true);
		$this->load->view('master',$data);
	}

	public function check_email_avaibility(){
		// echo "QWERTY";
		// exit();
		// $email = $_POST['email'];
		
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			echo "<span style='color:red'>Invalid Email Address!!</span>";
        }else{

            if($this->welcome_model->is_email_available($_POST['email'])){				
                echo "<span style='color:red'>Email Address already exists!!</span>";    
            }else{
                echo "<span style='color:green'>Email Address available!!</span>";
            }
            
        }
            
    }

}
