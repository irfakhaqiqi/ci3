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

   public function getPostList( $limit = FALSE, $offset = FALSE ) 
    {
        // Jika variable $limit ada pada parameter maka kita limit query-nya
        if ( $limit ) {
            $this->db->limit($limit, $offset);
        }
        // Query Manual
        // $query = $this->db->query('
        //      SELECT * FROM blogs
        //  ');

        // Memakai Query Builder

        // Inner Join dengan table Categories
        $this->db->join('category', 'category.id = post.id_category');
        
        $query = $this->db->get('post');

        // Return dalam bentuk object
        return $query->result();
    }

        public function get_total() 
    {
        // Dapatkan jumlah total artikel
        return $this->db->count_all("post");
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
    	$this->db->where('id_post', $id);
    	$query = $this->db->get('post');
    	return $query->result();
    }

    public function readPost($id) {
        $this->db->join('category', 'category.id = post.id_category');
        $this->db->where('id_post', $id);
        $query = $this->db->get('post');
        return $query->row();   
    }

    public function updateById($id) {
    	$data = array(
    		'judul' => $this->input->post('judul'),
            'id_category' => $this->input->post('category'),
    		'konten' => $this->input->post('konten'),
    		);

    	$this->db->where('id_post', $id);
    	$this->db->update('post', $data);
    }

    public function deletePost($id) {
    	$this->db->where('id_post', $id);
    	$this->db->delete('post');
    }

    public function get_all_artikel() 
    {
        $this->db->join('category', 'category.id = post.id_category');
      
       $query = $this->db->get('post');

       // Return dalam bentuk object
       return $query->result();
    }

}
 ?>