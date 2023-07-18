<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout_model extends CI_Model {

    public function save_customer_info(){
        $data = array();
        $data['customer_name'] = $this->input->post('customer_name',true);
        $data['email_address'] = $this->input->post('email_address',true);
        $data['password'] = md5($this->input->post('password',true));

        $this->db->insert('tbl_customer',$data);
        $customer_id = $this->db->insert_id();
        return $customer_id;

    }

    public function select_customer_info_by_id($customer_id){
        $customer_info = $this->db->select('*')
                                  ->from('tbl_customer')
                                  ->where('customer_id',$customer_id)
                                  ->get()
                                  ->row();
        return $customer_info;
    }

    public function update_billing_info(){
        $data = array();
        $data['customer_name'] = $this->input->post('customer_name', true);
        $data['email_address'] = $this->input->post('email_address', true);
        $data['mobile_number'] = $this->input->post('mobile_number', true);
        $data['address'] = $this->input->post('address', true);
        $data['country'] = $this->input->post('country', true);
        $data['city'] = $this->input->post('city', true);
        $data['zip_code'] = $this->input->post('zip_code', true);
        $shipping_status = $this->input->post('shipping_status', true);


        if ($shipping_status == 'on') {
            $customer_id = $this->input->post('customer_id', true);
            $this->db->where('customer_id',$customer_id);
            $this->db->update('tbl_customer',$data);

            $data['customer_id'] = $customer_id;
            $this->db->insert('tbl_shipping',$data);
            $shipping_id = $this->db->insert_id();
            $sdata = array();
            $sdata['shipping_id'] = $shipping_id;
            $this->session->set_userdata($sdata);



        } else {
            $customer_id = $this->input->post('customer_id', true);
            $this->db->where('customer_id',$customer_id);
            $this->db->update('tbl_customer',$data);
        }
        

        
    }
}
