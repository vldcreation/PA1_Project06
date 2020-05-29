<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	// load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('member_model');
	}

	// Login page
	public function index()
	{
		$data = array(	'title'		=> 'Halaman Register');
		$this->load->view('register/list', $data, FALSE);
	}
	
	public function member()
	{
		// Validasi input
		$this->form_validation->set_rules('nama','Nama Lengkap','required',
			array(	'required'	=> '%s harus diisi'),'refresh');

		$this->form_validation->set_rules('email','Email anda','required',
			array(	'required'	=> '%s harus diisi'));

		$this->form_validation->set_rules('NIM','NIM','required',
			array(	'required'	=> '%s harus diisi'));
		
		$this->form_validation->set_rules('Prodi','Prodi Anda','required',
			array(	'required'	=> '%s harus diisi'));
		
		$this->form_validation->set_rules('Motivasi','Motivasi anda','required',
			array(	'required'	=> '%s harus diisi'));
		
		$this->form_validation->set_rules('username','Username anda','required',
			array( 	'required' => '%s harus diisi'));

		$this->form_validation->set_rules('password','Password anda','required',
			array( 	'required' => '%s harus diisi'));

			$i = $this->input;
		if($this->form_validation->run()) {
			$Nama_Lengkap = htmlspecialchars($i->post('nama'));
			$email	= $i->post('email');
			$nim	= $i->post('NIM');
			$prodi	= $i->post('Prodi');
			$motivasi	= $i->post('Motivasi');
			$username 	= htmlspecialchars($i->post('username'));
			$password 	= sha1($i->post('password'));
			$pass_hint = htmlspecialchars($i->post('password_hint'));

			// Proses ke database registrasi member
			$data = array(
				'NIM' => $nim,
				'Prodi' => $prodi,
				'nama' => $Nama_Lengkap,
				'email' => $email,
				'username' => $username,
				'password' => $password,
				'password_hint' => $pass_hint,
				'akses_level' => 'User',
				'Motivasi'	=> $motivasi,
				'tanggal_daftar' => date('Y-m-d',strtotime($i->post('tanggal_publish'))).' '.$i->post('jam_publish'),

			);
			$this->member_model->tambah($data);

			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('loginmember'),'refresh');
		
	}
		// End validasi

		$data = array(	'title'		=> 'Halaman Register');
		$this->load->view('register/list', $data, FALSE);
    }
}