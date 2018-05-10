<?php

class Category_model extends CI_Model
{
    /**
     * summary
     */
    public function __construct()
    {
        
    }

    public function getCategoryList () {
    	$query = $this->db->query("SELECT * FROM category");
		return $query->result_array();
    }

    public function insertCategory() {
    	$data = array(
    			'cat_name' => $this->input->post('cat_name'),
    			'cat_description' => $this->input->post('cat_description'),

    		);
    	$this->db->insert('category', $data);
    }

    public function getCategory($id) {
    	$this->db->where('id', $id);
    	$query = $this->db->get('category');
    	return $query->result();
    }

    public function updateById($id) {
    	$data = array(
    		'cat_name' => $this->input->post('cat_name'),
    		'cat_description' => $this->input->post('cat_description'),
    		);

    	$this->db->where('id', $id);
    	$this->db->update('category', $data);
    }

    public function deleteById($id) {
    	$this->db->where('id', $id);
    	$this->db->delete('category');
    }
}