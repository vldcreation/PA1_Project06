<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginAdmin extends CI_Controller {

	// load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('konfigurasi_model');
	}

	// Login page
	public function index()
	{
		$site = $this->konfigurasi_model->listing();
		// Validasi input
		$this->form_validation->set_rules('username','Username','required',
			array(	'required'	=> '%s harus diisi'));

		$this->form_validation->set_rules('password','Password','required',
			array(	'required'	=> '%s harus diisi'));

		if($this->form_validation->run()) {
			$username 	= strip_tags($this->input->post('username'));
			$password 	= strip_tags($this->input->post('password'));
			// Proses ke simple login
			$this->simple_login->login($username,$password);
		}
		// End validasi

		$data = array(	'title'		=> 'Halaman Login Admin',
						'site'		=> $site,
	);
		$this->load->view('login/list', $data, FALSE);
	}

	// Logout
	public function logout()
	{
		// Panggil library logout
		$this->simple_login->logout();
	}

	public function logout2()
	{
		// Panggil library logout
		$this->simple_login->logoutUser();
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */