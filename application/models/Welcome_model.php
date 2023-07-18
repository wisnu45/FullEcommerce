<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_model extends CI_Model {

	public function get_all_active_products(){
        $result = $this->db->select('*')
                            ->from('tbl_product')
                            ->where('product_status',1)
                            ->get()
                            ->result();
        return $result;
    }

    public function select_product_by_id($product_id){
        $product_info = $this->db->select('*')
                            ->from('tbl_product')
                            ->join('tbl_category','tbl_category.category_id = tbl_product.category_id')
                            ->where('product_id',$product_id)
                            ->get()
                            ->row();
        return $product_info;
    }

    public function is_email_available($email_address){
        $email = $this->db->select('*')
                          ->from('tbl_customer')
                          ->where('email_address',$email_address)
                          ->get();
                          
        if($email->num_rows() > 0){            
            return true;
        }else{
            return false;
        }
    }

}
