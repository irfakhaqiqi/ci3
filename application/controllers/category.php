<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function index() {
		$this->load->model('category_model');
		$data['categorylist'] = $this->category_model->getCategoryList();
		$this->load->view('categorylist', $data);

	}

	public function create()
	{
		$this->load->model('category_model');

		$this->form_validation->set_rules('cat_name', 'Nama Kategory', 'trim|required|is_unique[category.cat_name]',
			array(
				'required'      => 'isi %s dulu',
				'min_length'     => 'isi %s kurang panjang',
				'is_unique'     => 'kategori ' .$this->input->post('cat_name'). ' sudah ada'            
			));

		if ($this->form_validation->run()==FALSE) {
			$this->load->view('input_category');
		}else {
			$this->category_model->insertCategory();
			$this->load->view('sukses_input_category');
		}
	}
	public function update($id) {
		$this->load->model('category_model');
		$this->form_validation->set_rules('cat_name', 'Nama Kategory', 'trim|required|is_unique[category.cat_name]',
			array(
				'required'       => 'isi %s lah',
				'min_length'     => 'isi %s kurang panjang',
				'is_unique'     => 'kategori ' .$this->input->post('cat_name'). ' sudah ada'            
			));

		$data['post']=$this->category_model->getCategory($id);

		if ($this->form_validation->run()==FALSE) {
			$this->load->view('edit_category', $data);
		}else {
			$this->category_model->updateById($id);
			$this->load->view('sukses_edit_category');
		}
	}

	public function delete($id) {
		$this->load->model('category_model');

		$data['post']=$this->category_model->getCategory($id);
		$this->category_model->deleteById($id);
		$this->load->view('sukses_delete_category');
	}
}
