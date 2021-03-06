<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_diskusi extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('kategori_diskusi_model');
		$this->log_user->add_log();
		// Tambahkan proteksi halaman
		$url_pengalihan = str_replace('index.php/', '', current_url());
		$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
		// Ambil check login dari simple_login
		$this->simple_login->cek_login_admin($pengalihan);

		//Check Hak Akses
		$akses = $this->session->userdata('akses_level');
		if($akses != 'Admin'){
			redirect(base_url('home/oops'));
		}
	}

	// Halaman utama
	public function index()	{

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_kategori_diskusi','Nama kategori','required|is_unique[kategori_diskusi.nama_kategori_diskusi]',
			array(	'required'		=> 'Nama kategori harus diisi',
					'is_unique'		=> 'Nama kategori sudah ada. Buat Nama kategori baru!'));

		$valid->set_rules('urutan','Urutan','required',
			array(	'required'		=> 'Urutan harus diisi'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Kategori Diskusi',
						'kategori'	=> $this->kategori_diskusi_model->listing(),
						'isi'		=> 'admin/kategori_diskusi/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
		}else{
			$i 	= $this->input;
			$slug 	= url_title($i->post('nama_kategori_diskusi'),'dash',TRUE);

			$data = array(	'id_user'		=> $this->session->userdata('id_user'),
							'nama_kategori_diskusi'	=> $i->post('nama_kategori_diskusi'),
							'slug_kategori'	=> $slug,
							'urutan'		=> $i->post('urutan'),
						);
			$this->kategori_diskusi_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/kategori_diskusi'),'refresh');
		}
		// End proses masuk database
	}

	// Edit kategori
	public function edit($id_kategori)	{

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_kategori_diskusi','Nama kategori','required',
			array(	'required'		=> 'Nama kategori harus diisi'));

		$valid->set_rules('urutan','Urutan','required',
			array(	'required'		=> 'Urutan harus diisi'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Edit Kategori Diskusi',
						'kategori'	=> $this->kategori_diskusi_model->detail($id_kategori),
						'isi'		=> 'admin/kategori_diskusi/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
		}else{
			$i 	= $this->input;
			$slug 	= url_title($i->post('nama_kategori_diskusi'),'dash',TRUE);

			$data = array(	'id_kategori_diskusi'	=> $id_kategori,
							'id_user'		=> $this->session->userdata('id_user'),
							'nama_kategori_diskusi'	=> $i->post('nama_kategori_diskusi'),
							'slug_kategori_diskusi'	=> $slug,
							'urutan'		=> $i->post('urutan'),
						);
			$this->kategori_diskusi_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/kategori_diskusi'),'refresh');
		}
		// End proses masuk database
	}

	// Delete user
	public function delete($id_kategori_diskusi) {
		// Proteksi proses delete harus login
		// Tambahkan proteksi halaman
$url_pengalihan = str_replace('index.php/', '', current_url());
$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
// Ambil check login dari simple_login
$this->simple_login->check_login($pengalihan);


		$data = array('id_kategori_diskusi'	=> $id_kategori_diskusi);
		$this->kategori_diskusi_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/kategori_diskusi'),'refresh');
	}
}

/* End of file Kategori.php */
/* Location: ./application/controllers/admin/Kategori_diskusi.php */