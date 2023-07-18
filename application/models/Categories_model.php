<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories_model extends CI_Model {

	public function save_category()
	{
        $data['category_name'] = $this->input->post('category_name', TRUE);
        $data['category_short_desc'] = $this->input->post('category_short_desc', TRUE);
        $data['category_long_desc'] = $this->input->post('category_long_desc', TRUE);
        $data['category_status'] = 1;

        $this->db->insert('tbl_category', $data);
        }
    
        public function get_all_categories(){
                $all_categories = $this->db->select('*')
                                        ->from('tbl_category')
                                        ->get()
                                        ->result();

                return $all_categories;
        }

        public function change_category_status($category_id, $status){
                $data['category_status'] = $status;
                $this->db->where('category_id', $category_id);
                $this->db->update('tbl_category', $data);
        }

        public function get_category_detail($category_id){
                $result = $this->db->select('*')
                                 ->from('tbl_category')
                                 ->where('category_id', $category_id)
                                 ->get()
                                 ->row();
                return $result;
        }

        public function update_category(){
                $data = $this->input->post(NULL, TRUE);
                $category_id = $data['category_id'];
                unset($data['category_id']);

                $this->db->where('category_id', $category_id)
                         ->update('tbl_category', $data);

        }

        public function get_all_active_categories(){
                $result = $this->db->select('*')
                                 ->from('tbl_category')
                                 ->where('category_status', 1)
                                 ->get()
                                 ->result();
                return $result;
        }




}
