<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		// Tambahkan proteksi halaman
		$url_pengalihan = str_replace('index.php/', '', current_url());
		$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
		// Ambil check login dari simple_login
		$this->simple_login->check_login($pengalihan);
		
		//Check Hak Akses
		$akses = $this->session->userdata('akses_level');
		if($akses != 'Admin'){
			redirect(base_url('home/oops'));
		}
	}

	// General Configuration
	public function index() {
		$site = $this->konfigurasi_model->listing();
		
		// Validasi 
		$this->form_validation->set_rules('namaweb','Website name website','required');
		$this->form_validation->set_rules('email','Email','valid_email');
		
		if($this->form_validation->run() === FALSE) {
			
		$data = array(	'title'	=> 'General Configuration',
						'site'	=> $site,
						'isi'	=> 'admin/konfigurasi/list');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
			$i = $this->input;
			$data = array(	'id_konfigurasi'	=> $i->post('id_konfigurasi'),
							'namaweb'			=> $i->post('namaweb'),
							'singkatan'			=> $i->post('singkatan'),
							'tagline'			=> $i->post('tagline'),
							'tentang'			=> $i->post('tentang'),
							'website'			=> $i->post('website'),
							'email'				=> $i->post('email'),
							'alamat'			=> $i->post('alamat'),
							'telepon'			=> $i->post('telepon'),
							'hp'				=> $i->post('hp'),
							'fax'				=> $i->post('fax'),
							'keywords'			=> $i->post('keywords'),
							'metatext'			=> $i->post('metatext'),
							'facebook'			=> $i->post('facebook'),
							'twitter'			=> $i->post('twitter'),
							'instagram'			=> $i->post('instagram'),
							'google_map'		=> $i->post('google_map'),
							'id_user'			=> $this->session->userdata('id'));
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses','Site configuration updated successfully');
			redirect(base_url('admin/konfigurasi'));
		}
	}

	// General Configuration
	public function email_setting() {
		$site = $this->konfigurasi_model->listing();
		
		// Validasi 
		$this->form_validation->set_rules('smtp_user','User email','required');
		$this->form_validation->set_rules('smtp_pass','Password Email','required');
		
		if($this->form_validation->run() === FALSE) {
			
		$data = array(	'title'	=> 'Email Setting',
						'site'	=> $site,
						'isi'	=> 'admin/konfigurasi/email');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
			$i = $this->input;
			$data = array(	'id_konfigurasi'	=> $i->post('id_konfigurasi'),
							'protocol'			=> $i->post('protocol'),
							'smtp_host'			=> $i->post('smtp_host'),
							'smtp_port'			=> $i->post('smtp_port'),
							'smtp_timeout'		=> $i->post('smtp_timeout'),
							'smtp_user'			=> $i->post('smtp_user'),
							'smtp_pass'			=> $i->post('smtp_pass'),
							);
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses','Data Email telah diupdate');
			redirect(base_url('admin/konfigurasi/email_setting'));
		}
	}

	// General Setting
	public function setting() {
		$site = $this->konfigurasi_model->listing();
		
		// Validasi 
		$this->form_validation->set_rules('status_buka','Website name website','required');
		
		if($this->form_validation->run() === FALSE) {
			
		$data = array(	'title'	=> 'Buka/Tutup Pendaftaran untuk Umum',
						'site'	=> $site,
						'isi'	=> 'admin/konfigurasi/setting');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
			$i = $this->input;
			$data = array(	'id_konfigurasi'	=> $i->post('id_konfigurasi'),
							'tanggal_buka'		=> date('Y-m-d',strtotime($i->post('tanggal_buka'))),
							'tanggal_tutup'		=> date('Y-m-d',strtotime($i->post('tanggal_tutup'))),
							'status_buka'		=> $i->post('status_buka'),
							'id_user'			=> $this->session->userdata('nrk'));
			// print_r($data);
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses','Site configuration updated successfully');
			redirect(base_url('admin/konfigurasi/setting'));
		}
	}
	
	// New logo
	public function logo() {
		$site = $this->konfigurasi_model->listing();
		
		$v = $this->form_validation;
		$v->set_rules('id_konfigurasi','ID Konfigurasi','required');
		
		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '12000'; // KB	
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('logo')) {
				
		$data = array(	'title'	=> 'New logo',
						'site'	=> $site,
						'error'	=> $this->upload->display_errors(),
						'isi'	=> 'admin/konfigurasi/logo');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 150; // Pixel
				$config['height'] 			= 150; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				// Hapus gambar lama
				unlink('./assets/upload/image/'.$site->logo);
				unlink('./assets/upload/image/thumbs/'.$site->logo);
				// End hapus gambar lama
				// Masuk ke database
				$i = $this->input;
				$data = array(	'id_konfigurasi'=> $i->post('id_konfigurasi'),
								'logo'			=> $upload_data['uploads']['file_name'],
								'id_user'			=> $this->session->userdata('id'));
				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('sukses','Logo changed');
				redirect(base_url('admin/konfigurasi/logo'));
		}}
		// Default page
		$data = array(	'title'	=> 'New logo',
						'site'	=> $site,
						'isi'	=> 'admin/konfigurasi/logo');
		$this->load->view('admin/layout/wrapper',$data);
	}
	// Konfigurasi Icon
	public function icon() {
		$site = $this->konfigurasi_model->listing();
		
		$v = $this->form_validation;
		$v->set_rules('id_konfigurasi','ID Konfigurasi','required');
		
		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '12000'; // KB	
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('icon')) {
				
		$data = array(	'title'	=> 'New Icon',
						'site'	=> $site,
						'error'	=> $this->upload->display_errors(),
						'isi'	=> 'admin/konfigurasi/icon');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 150; // Pixel
				$config['height'] 			= 150; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				// Hapus gambar lama
				unlink('./assets/upload/image/'.$site->icon);
				unlink('./assets/upload/image/thumbs/'.$site->icon);
				// End hapus gambar lama
				$this->image_lib->resize();
				// Masuk ke database
				$i = $this->input;
				$data = array(	'id_konfigurasi'=> $i->post('id_konfigurasi'),
								'icon'			=> $upload_data['uploads']['file_name'],
								'id_user'			=> $this->session->userdata('id'));
				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('sukses','Icon changed');
				redirect(base_url('admin/konfigurasi/icon'));
		}}
		// Default page
		$data = array(	'title'	=> 'New Icon',
						'site'	=> $site,
						'isi'	=> 'admin/konfigurasi/icon');
		$this->load->view('admin/layout/wrapper',$data);
	}

	// Konfigurasi Footer
	public function footer() {
		$site = $this->konfigurasi_model->listing();
		
		$v = $this->form_validation;
		$v->set_rules('id_konfigurasi','ID Konfigurasi','required');
		
		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '12000'; // KB	
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('footer')) {
				
		$data = array(	'title'	=> 'New Footer',
						'site'	=> $site,
						'error'	=> $this->upload->display_errors(),
						'isi'	=> 'admin/konfigurasi/footer');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 150; // Pixel
				$config['height'] 			= 150; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				// Hapus gambar lama
				unlink('./assets/upload/image/'.$site->footer);
				unlink('./assets/upload/image/thumbs/'.$site->footer);
				// End hapus gambar lama
				$this->image_lib->resize();
				// Masuk ke database
				$i = $this->input;
				$data = array(	'id_konfigurasi'=> $i->post('id_konfigurasi'),
								'footer'			=> $upload_data['uploads']['file_name'],
								'id_user'			=> $this->session->userdata('id'));
				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('sukses','Footer changed');
				redirect(base_url('admin/konfigurasi/footer'));
		}}
		// Default page
		$data = array(	'title'	=> 'New Footer',
						'site'	=> $site,
						'isi'	=> 'admin/konfigurasi/footer');
		$this->load->view('admin/layout/wrapper',$data);
	}


	// New banner
	public function banner() {
		$site = $this->konfigurasi_model->listing();
		
		$v = $this->form_validation;
		$v->set_rules('id_konfigurasi','ID Konfigurasi','required');
		
		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '12000'; // KB	
$this->load->library('upload', $config);
			if(! $this->upload->do_upload('banner')) {
				
		$data = array(	'title'	=> 'New banner',
						'site'	=> $site,
						'error'	=> $this->upload->display_errors(),
						'isi'	=> 'admin/konfigurasi/banner');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 150; // Pixel
				$config['height'] 			= 150; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				// Hapus gambar lama
				unlink('./assets/upload/image/'.$site['banner']);
				unlink('./assets/upload/image/thumbs/'.$site['banner']);
				// End hapus gambar lama
				// Masuk ke database
				$i = $this->input;
				$data = array(	'id_konfigurasi'=> $i->post('id_konfigurasi'),
								'banner'			=> $upload_data['uploads']['file_name'],
								'id_user'			=> $this->session->userdata('id'));
				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('sukses','Logo changed');
				redirect(base_url('admin/konfigurasi/banner'));
		}}
		// Default page
		$data = array(	'title'	=> 'New banner',
						'site'	=> $site,
						'isi'	=> 'admin/konfigurasi/banner');
		$this->load->view('admin/layout/wrapper',$data);
	}
	

}

/* End of file Konfigurasi.php */
/* Location: ./application/controllers/admin/Konfigurasi.php */