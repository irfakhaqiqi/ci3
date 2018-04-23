<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function getData($table){
		return $this->db->get('$table');
	}

	public function setData($table, $data, $id = 0){
		if($id == 0){
			return $this->db->insert($table, $data);
		}else{
			$this->db->where('id', $data['id']);
			return $this->db->update($table, $data);
		}	
	}

	public function delete($table, $id){
		$this->db->where('id', $id);
		return $this->db->delete($table);
	}
}

/* End of file data_model.php */
/* Location: ./application/models/data_model.php */
?>