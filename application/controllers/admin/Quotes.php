<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quotes extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		// Tambahkan proteksi halaman
		$url_pengalihan = str_replace('index.php/', '', current_url());
		$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
		// Ambil check login dari simple_login
		$this->simple_login->check_login($pengalihan);
		$this->load->model('quotes_model');

		//Check Hak Akses
		$akses = $this->session->userdata('akses_level');
		if($akses != 'Admin'){
			redirect(base_url('home/oops'));
		}
	}

	// Halaman utama
	public function index()
	{
		// Ambil data quotes
		$quotes 	= $this->quotes_model->listing();
		$total 	= $this->quotes_model->total();

		$data = array(	'title'		=> 'Kutipan ('.$total->total.' data)',
						'quotes'	=> $quotes,
						'isi'		=> 'admin/kutipan/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Tambah
	public function tambah()
	{
		// Ambil data quotes
		$quotes 	= $this->quotes_model->listing();
		// Validasi
		$validasi = $this->form_validation;

		$validasi->set_rules('title_quotes','Judul Kutipan','required',
			array(	'required'		=> '%s harus diisi'));

		$validasi->set_rules('body_quotes','Isi Kutipan','required',
			array(	'required'		=> '%s harus diisi'));

		if($validasi->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Tambah Kutipan baru',
						'quotes'	=> $quotes,
						'isi'		=> 'admin/kutipan/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk ke database
		}else{
			$inp = $this->input;

			$data = array(	'title_quotes'		=> $inp->post('title_quotes'),
							'body_quotes'		=> $inp->post('body_quotes'),
							'footer_quotes'		=> $inp->post('footer_quotes'),
							'author_quotes'		=> $inp->post('author_quotes'),
							'tanggal_post'		=> date('Y-m-d H:i:s')
						);
			$this->quotes_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambahkan');
			redirect(base_url('admin/quotes'),'refresh');
		}
		// End masuk database
	}

	// Edit
	public function edit($id_quotes)
	{
		// Ambil data bagian yg akan diedit
		$quotes = $this->quotes_model->detail($id_quotes);

		// Validasi
		$validasi = $this->form_validation;

		$validasi->set_rules('title_quotes','Judul Kutipan','required',
			array(	'required'		=> '%s harus diisi'));

		$validasi->set_rules('body_quotes','Isi Kutipan','required',
			array(	'required'		=> '%s harus diisi'));


		if($validasi->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Edit Kutipan: '.$quotes->title_quotes,
						'quotes'		=> $quotes,
						'isi'		=> 'admin/kutipan/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk ke database
		}else{
			$inp = $this->input;

			$data = array(	'id_quotes'			=> $id_quotes,
							'title_quotes'		=> $inp->post('title_quotes'),
							'body_quotes'		=> $inp->post('body_quotes'),
							'footer_quotes'		=> $inp->post('footer_quotes'),
							'author_quotes'		=> $inp->post('author_quotes'),
							'tanggal_post'		=> date('Y-m-d H:i:s')
						);
			$this->quotes_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('admin/quotes'),'refresh');
		}
		// End masuk database
	}

	// Proses
	public function proses()
	{
		$id_bagiannya	= $this->input->post('id_quotes');
		$pengalihan = $this->input->post('pengalihan');

		// Check id_bagian kosong atau tidak
		if($id_bagiannya == "") {
			$this->session->set_flashdata('warning', 'Anda belum memilih data');
			redirect($pengalihan,'refresh');
		}

		// Proses hapus jika klik tombol "hapus", jika ga ada yg kosong
		if(isset($_POST['hapus'])) {
			// Proses hapus diloop
			for($i=0;$i<sizeof($id_bagiannya);$i++)
			{
				$id_bagian = $id_bagiannya[$i];
				$data = array(	'id_quotes'		=> $id_bagian);
				$this->quotes_model->delete($data);
			}
			// End proses hapus
			$this->session->set_flashdata('sukses', 'Data telah dihapus');
			redirect($pengalihan,'refresh');

		}elseif(isset($_POST['aktifkan'])) {
			// Proses aktifkan diloop
			for($i=0;$i<sizeof($id_bagiannya);$i++)
			{
				$id_bagian = $id_bagiannya[$i];
				$data = array(	'id_quotes'		=> $id_bagian);
				$this->quotes_model->edit($data);
			}
			// End proses aktifkan
			$this->session->set_flashdata('sukses', 'Data telah diaktifkan');
			redirect($pengalihan,'refresh');

		}elseif(isset($_POST['non_aktifkan'])) {
			// Proses non aktifkan diloop
			for($i=0;$i<sizeof($id_bagiannya);$i++)
			{
				$id_bagian = $id_bagiannya[$i];
				$data = array(	'id_bagian'		=> $id_bagian);
				$this->quotes_model->edit($data);
			}
			// End proses non aktifkan
			$this->session->set_flashdata('sukses', 'Data telah di non aktifkan');
			redirect($pengalihan,'refresh');
		}
	}

	// Delete
	public function delete($id_quotes)
	{
		$data = array(	'id_quotes'		=> $id_quotes);
		$this->quotes_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/quotes'),'refresh');
	}
}

/* End of file Bagian.php */
/* Location: ./application/controllers/admin/Bagian.php */