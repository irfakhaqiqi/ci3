<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {
	public function index() {
    	$this->load->model('blog_model');
        $limit_per_page = 4;

        // URI segment untuk mendeteksi "halaman ke berapa" dari URL
        $start_index = ( $this->uri->segment(3) ) ? $this->uri->segment(3) : 0;

        // Dapatkan jumlah data 
        $total_records = $this->blog_model->get_total();
        
        if ($total_records > 0) {
            // Dapatkan data pada halaman yg dituju
            $data["postlist"] = $this->blog_model->getPostList($limit_per_page, $start_index);
            
            $config['base_url'] = $config['base_url'] = base_url() . 'index.php/blog/index';
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
            
            $this->pagination->initialize($config);
                
            // Buat link pagination
            $data["links"] = $this->pagination->create_links();
        }
        $this->load->view('navbar');
    	$this->load->view('postlist', $data);

    }
    public function read($id)
    {
        $this->load->model('blog_model');
        // Mendapatkan data dari model
        $data['artikel'] = $this->blog_model->readPost($id);

        // Jika slug kosong atau tidak ada di db, lempar user ke halaman 404
        if ( empty($id) || !isset($data['artikel']) ) show_404();

        $this->load->view('postread', $data);

    }

	public function create()
	{
		$this->load->model('blog_model');
        $this->load->model('category_model');

    	$this->form_validation->set_rules('judul', 'Judul', 'trim|required|is_unique[post.judul]|min_length[8]',
            array(
                'required'      => 'isi %s dulu',
                'min_length'     => 'isi %s kurang panjang',
                'is_unique'     => 'judul ' .$this->input->post('judul'). ' sudah ada'            
            ));

    	if ($this->form_validation->run()==FALSE) {
            $data['categorylist'] = $this->category_model->getCategoryList();
    		$this->load->view('input_post', $data);
    	}else {
    		$this->blog_model->insertPost();
    		$this->load->view('sukses_input');
    	}
	}


	 public function update($id) {
    	$this->load->model('blog_model');
    	$this->load->model('category_model');
        $this->form_validation->set_rules('judul', 'Judul', 'trim|required|min_length[8]',
            array(
                'required'       => 'isi %s lah',
                'min_length'     => 'isi %s kurang panjang',
                'is_unique'     => 'judul ' .$this->input->post('judul'). ' sudah ada'            
            ));

    	$data['post']=$this->blog_model->getPost($id);

    	if ($this->form_validation->run()==FALSE) {
            $data['categorylist'] = $this->category_model->getCategoryList();
    		$this->load->view('edit_post', $data);
    	}else {
    		$this->blog_model->updateById($id);
    		$this->load->view('sukses_edit');
    	}
    }

    public function delete($id) {
    	$this->load->model('blog_model');

    	$this->blog_model->deletePost($id);
    	$this->load->view('sukses_delete');
    }
    public function datatable() {
        
      $this->load->model('blog_model');
        $artikel['data'] = $this->blog_model->get_all_artikel();
        $this->load->view('navbar');
        $this->load->view('dt_view', $artikel);

    }
}