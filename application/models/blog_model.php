<?php 

/**
 * summary
 */
class Blog_model extends CI_Model
{
    /**
     * summary
     */
    public function __construct()
    {
        
    }

    public function getPostList () {
    	$query = $this->db->query("SELECT p.id AS idp, c.id AS idc, p.id_category, p.judul, p.konten, c.cat_name, c.cat_description FROM post AS p INNER JOIN category AS c ON p.id_category = c.id");
		return $query->result_array();
    }

    public function insertPost() {
    	$data = array(
    			'judul' => $this->input->post('judul'),
                'id_category' => $this->input->post('category'),
    			'konten' => $this->input->post('konten'),

    		);
    	$this->db->insert('post', $data);
    }

    public function getPost($id) {
    	$this->db->where('id', $id);
    	$query = $this->db->get('post');
    	return $query->result();
    }

    public function updateById($id) {
    	$data = array(
    		'judul' => $this->input->post('judul'),
            'id_category' => $this->input->post('category'),
    		'konten' => $this->input->post('konten'),
    		);

    	$this->db->where('id', $id);
    	$this->db->update('post', $data);
    }

    public function deletePost($id) {
    	$this->db->where('id', $id);
    	$this->db->delete('post');
    }
}
 ?>