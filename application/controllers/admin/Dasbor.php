<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// Tambahkan proteksi halaman
		$url_pengalihan = str_replace('index.php/', '', current_url());
		$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
		// Ambil check login dari simple_login
		$this->simple_login->cek_login_admin($pengalihan);
		$this->load->model('dasbor_model');

		//Check Hak Akses
		$akses = $this->session->userdata('akses_level');
		if($akses != 'Admin'){
			redirect(base_url('home/oops'));
		}
	}

	// Halaman dasbor
	public function index()
	{

		$data = array(	'title'					=> 'Halaman Dasbor',
						'isi'					=> 'admin/dasbor/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

}

/* End of file Dasbor.php */
/* Location: ./application/controllers/admin/Dasbor.php */