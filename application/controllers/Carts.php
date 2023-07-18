<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carts extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('cart_model');
        $this->load->library('cart');
    }

    public function add_to_cart(){
        $product_id = $this->input->post('product_id', true);
        $qty = $this->input->post('qty', true);
        $product_info = $this->cart_model->select_product_info_by_product_id($product_id);

        $data = array(
            'id'      => $product_info->product_id,
            'qty'     => $qty,
            'price'   => $product_info->product_price,
            'name'    => $product_info->product_name,
            'options' => array('image' => $product_info->product_image, )
        );
            
        $this->cart->insert($data);
        return redirect('show-cart');
    }

    public function show_cart(){
        $data=array();
		$data['title'] = 'Cart';
		$data['slider'] = '';
		
        $data['featured_product'] = $this->load->view('pages/cart_view','',true);
        $data['category_tab'] = '';
		$data['recommended_items'] = '';
		// $data['category_tab'] = $this->load->view('pages/category_tab','',true);
		// $data['recommended_items'] = $this->load->view('pages/recommended_items','',true);
		$this->load->view('master',$data);
    }

    public function delete_to_cart($rowid){
        $data = array(
            'rowid' => $rowid,
            'qty' => 0,
        );
        $this->cart->update($data);
        return redirect('show-cart');
    }

    public function update_cart_product_qty(){
        $rowid = $this->input->post('rowid',true);
        $qty = $this->input->post('qty',true);
        $data = array(
            'rowid' => $rowid,
            'qty' => $qty,
        );

        // echo "<pre>";
        // print_r($data);
        $this->cart->update($data);
        return redirect('show-cart');
    }

}
