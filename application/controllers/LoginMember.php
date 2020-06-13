<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginMember extends CI_Controller {

	// load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('member_model');
	}

	// Login page
	public function index()
	{
		// Validasi input
		$this->form_validation->set_rules('username','Username atau Email','required',
			array(	'required'	=> '%s harus diisi'));

		$this->form_validation->set_rules('password','Password','required',
			array(	'required'	=> '%s harus diisi'));

		if($this->form_validation->run()) {
			$username 	= strip_tags($this->input->post('username'));
			$password 	= strip_tags($this->input->post('password'));
			// Proses ke simple login
			$this->simple_login->loginmember($username,$password);
		}
		// End validasi

		$data = array(	'title'		=> 'Halaman Login Member');
		$this->load->view('loginmember/list', $data, FALSE);
	}

	// Logout
	public function logout()
	{
		// Panggil library logout
		$this->simple_login->logoutuser();
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */