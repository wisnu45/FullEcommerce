<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends CI_Model {

    public function select_product_info_by_product_id($product_id){
        $product_info = $this->db->select('*')
                         ->from('tbl_product')
                         ->where('product_id', $product_id)
                         ->get()
                         ->row();
        return $product_info;
    }
}
