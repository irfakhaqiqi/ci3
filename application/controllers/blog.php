<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {
	public function index() {
    	$this->load->model('blog_model');
    	$data['postlist'] = $this->blog_model->getPostList();
    	$this->load->view('postlist', $data);

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
}