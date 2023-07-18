<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model {


	public function save_product($product_image){
        $top_product = $this->input->post('top_product', TRUE);
        // echo "<pre>";
        // print_r($top_product);
        // echo "</pre>";
        // exit();

        $product_data = $this->input->post(NULL, TRUE);
        if ($top_product == NULL) {
            $product_data['top_product'] = 0;
        }else if($top_product == 'on'){
            $product_data['top_product'] = 1;
        }
        
        //$product_data['product_status'] = 1;
        $product_data['product_image'] = $product_image;
        $this->db->insert('tbl_product', $product_data);
    }

    public function get_all_products(){
        $all_products = $this->db->select('*')
                                 ->from('tbl_product')
                                 ->get()
                                 ->result();
        return $all_products;
    }

    public function select_top_products(){
        $top_products = $this->db->select('*')
                                 ->from('tbl_product')
                                 ->where('top_product',1)
                                 ->where('product_status',1)
                                 ->get()
                                 ->result();
        return $top_products;
    }

    public function change_product_status($product_id, $status){
        $data['product_status'] = $status;
        $this->db->where('product_id', $product_id);
        $this->db->update('tbl_product', $data);
    }

    public function get_product_detail($product_id){
        $result = $this->db->select('*')
                         ->from('tbl_product')
                         ->where('product_id', $product_id)
                         ->get()
                         ->row();
        return $result;
    }

    public function update_product($product_image){
        $data = array();
        $product_id = $this->input->post('product_id',true);
        $data['category_id'] = $this->input->post('category_id',true);
        $data['product_name'] = $this->input->post('product_name',true);
        $data['product_price'] = $this->input->post('product_price',true);
        $data['product_short_desc'] = $this->input->post('product_short_desc',true);
        $data['product_long_desc'] = $this->input->post('product_long_desc',true);
        $data['product_qty'] = $this->input->post('product_qty',true);
        $data['product_image'] = $product_image;
        $top_product = $this->input->post('top_product',true);
        if ($top_product == NULL) {
            $data['top_product'] = 0;
        }else if($top_product == 'on'){
            $data['top_product'] = 1;
        }

        $this->db->where('product_id', $product_id)
                 ->update('tbl_product',$data);

        $this->session->set_userdata('message', 'Product updated successfully!');
        unlink($this->input->post('product_old_image', true));
        redirect('manage-product');

    }

    

}
