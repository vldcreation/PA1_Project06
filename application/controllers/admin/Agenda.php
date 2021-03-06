<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agenda extends CI_Controller {
	
	// Load database
	public function __construct() 	{
		parent::__construct();
		$this->load->model('agenda_model');
		$this->load->model('user_model');
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
	
	// For homepage
	public function index() {
		//detail PIC
		$user 	= $this->user_model->listing();
		// $data['news'] = $this->news_model->get_news();
		$data	= array(
						'title'	=> 'Manajemen Agenda',
						'agenda'	=> $this->agenda_model->listing_agenda(),
						'user'		=> $user,
						'isi'	=> 'admin/agenda/list'
		);
		$this->load->view('admin/layout/wrapper',$data);
	}

	// Proses
	public function proses()
	{
		//detail PIC
		$user 	= $this->user_model->listing();
		$site = $this->konfigurasi_model->listing();
		// PROSES HAPUS MULTIPLE
		if(isset($_POST['hapus'])) {
			$inp 				= $this->input;
			$id_agendanya		= $inp->post('id_agenda');
			$pengalihan = $inp->post('pengalihan');

				// Check id_bagian kosong atau tidak
				if($id_agendanya == "") {
					$this->session->set_flashdata('warning', 'Anda belum memilih data');
					redirect($pengalihan,'refresh');
				}
   			for($i=0; $i < sizeof($id_agendanya);$i++) {
   				$agenda 	= $this->agenda_model->detail($id_agendanya[$i]);
				$data = array(	'id_agenda'	=> $id_agendanya[$i]);
   				$this->agenda_model->delete($data);
   			}

   			$this->session->set_flashdata('sukses', 'Data telah dihapus');
   			redirect(base_url('admin/agenda'),'refresh');
   		// PROSES SETTING DRAFT
   		}
   	}
	
	// For add agenda
	public function tambah() {
		//detail PIC
		$user 	= $this->user_model->listing();
		// Nambah agenda, check validasi
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('jenis_agenda', 'Jenis agenda', 'required');
		$this->form_validation->set_rules('panitia', 'Panitia', 'required');
		$this->form_validation->set_rules('tempat', 'Tempat', 'required');
		$this->form_validation->set_rules('mulai', 'Mulai', 'required');
		$this->form_validation->set_rules('selesai', 'Selesai', 'required');
		$this->form_validation->set_rules('ringkasan', 'Ringkasan', 'required');
		$this->form_validation->set_rules('isi', 'Isi', 'required');
		if($this->form_validation->run() === FALSE) {
		$data	= array(
						'title'		=> 'Tambah agenda baru',
						'isi'		=> 'admin/agenda/tambah',
						'user'		=> $user
						);
		$this->load->view('admin/layout/wrapper',$data);
		}else{
			 	$data = array(
						'nama'			=> $this->input->post('nama'),
						'jenis_agenda' 	=> $this->input->post('jenis_agenda'),
						'panitia'		=> $this->input->post('panitia'),
						'tempat'		=> $this->input->post('tempat'),									
						'mulai'			=> $this->input->post('mulai'),
						'selesai'		=> $this->input->post('selesai'),
						'ringkasan'		=> $this->input->post('ringkasan'),
						'isi'			=> $this->input->post('isi')
				);
		$this->agenda_model->tambah($data);
		$this->session->set_flashdata('sukses','Data agenda berhasil ditambah');
		redirect(base_url().'admin/agenda');
	}}
	
	// Edit agenda
	public function edit($id_agenda) {
		$agenda = $this->agenda_model->listing_agenda($id_agenda);

		//detail PIC
		$user 	= $this->user_model->listing();
		// Nambah agenda, check validasi
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('jenis_agenda', 'Jenis agenda', 'required');
		$this->form_validation->set_rules('panitia', 'Panitia', 'required');
		$this->form_validation->set_rules('tempat', 'Tempat', 'required');
		$this->form_validation->set_rules('mulai', 'Mulai', 'required');
		$this->form_validation->set_rules('selesai', 'Selesai', 'required');
		$this->form_validation->set_rules('ringkasan', 'Ringkasan', 'required');
		$this->form_validation->set_rules('isi', 'Isi', 'required');
		if($this->form_validation->run() === FALSE) {
		$data	= array(
						'title'		=> 'Edit data agenda',
						'agenda'		=> $agenda,
						'isi'		=> 'admin/agenda/edit',
						'user'		=> $user
						);
		$this->load->view('admin/layout/wrapper',$data);
		}else{
			 	$data = array(
						'id_agenda'		=> $this->input->post('id_agenda'),
						'nama'			=> $this->input->post('nama'),
						'jenis_agenda' 	=> $this->input->post('jenis_agenda'),
						'panitia'		=> $this->input->post('panitia'),
						'tempat'		=> $this->input->post('tempat'),									
						'mulai'			=> $this->input->post('mulai'),
						'selesai'		=> $this->input->post('selesai'),
						'ringkasan'		=> $this->input->post('ringkasan'),
						'isi'			=> $this->input->post('isi')
				);
		$this->agenda_model->edit($data);
		$this->session->set_flashdata('sukses','Data agenda berhasil diupdate');
		redirect(base_url().'admin/agenda');
	}}
	
	// Agenda delete
	public function delete($id_agenda) {
		$data = array('id_agenda'	=> $id_agenda);
		$this->agenda_model->delete($data);
		$this->session->set_flashdata('sukses','Data agenda berhasil dihapus');
		redirect(base_url().'admin/agenda');
	}
	
}