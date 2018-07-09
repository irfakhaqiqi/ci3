<?php

class User extends CI_Controller{

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->helper('MY');
		$this->load->model('user_model');
	}

	public function register(){

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 
			'required|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password2', 'Konfirmasi Password', 
			'matches[password]');
		$this->form_validation->set_rules('level', 'Level', 
			'required');
		if($this->form_validation->run() === FALSE){
			$this->load->view('navbar');
			$this->load->view('register');
		} else {
            // Encrypt password
			$enc_password = md5($this->input->post('password'));

			$this->user_model->register($enc_password);

            // Tampilkan pesan
			$this->session->set_flashdata('user_registered', 'Anda telah teregistrasi.');

			redirect('user/login', 'refresh');
		}


	}

	public function login(){

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('navbar');
			$this->load->view('login');
		} else {
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));

			$user_id = $this->user_model->login($username, $password);
			$level = $this->user_model->level($username, $password);

			if($user_id){
				$user_data = array(
					'id_user' => $user_id,
					'username' => $username,
					'logged_in' => true,
					'level' => $level,
				);
				$this->session->set_userdata($user_data);
				$this->session->set_flashdata('user_loggedin', 'You are now logged in');

				redirect('blog');
			} else {
				$this->session->set_flashdata('login_failed', 'Login is invalid');

				redirect('user/login');
			}       
		}
	}

	public function logout(){
        // Unset user data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');

        // Set message
        $this->session->set_flashdata('user_loggedout', 'Anda sudah log out');

        redirect('user/login');



	}
}

?>




