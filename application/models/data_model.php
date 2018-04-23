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

	public function setData($table, $data){
		return $this->db->insert($table, $data);
	}

}

/* End of file data_model.php */
/* Location: ./application/models/data_model.php */
?>