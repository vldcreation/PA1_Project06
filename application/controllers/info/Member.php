<?php

class Member extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('info_model');
        $this->load->model('member_model');

        // Tambahkan proteksi halaman
		$url_pengalihan = str_replace('index.php/', '', current_url());
		$pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
		// Ambil check login dari simple_login
        $this->simple_login->check_login($pengalihan);
        
        // //Check Hak Akses
		// $akses = $this->session->userdata('akses_level');
		// if($akses != 'User'){
		// 	redirect(base_url('home/oops'));
		// }
    }

    public function index(){
        $id_user 	= $this->session->userdata('id_user');
        $member = $this->member_model->detail($id_user);
        $data = array(
            'title' => 'Detail Info -'.$this->session->userdata('nama'),
            'isi'   => 'info/akun/akun',
            'member' => $member,
        );

        $this->load->view('layout/wrapper',$data);
    }

    public function edit(){
        $id_user 	= $this->session->userdata('id_user');
		$member 		= $this->member_model->detail($id_user);

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama Pengguna','required',
			array(	'required'	=> '%s harus diisi'));

		$valid->set_rules('email','Email Pengguna','required|valid_email',
			array(	'required'	=> '%s harus diisi',
					'valid_email'	=> '%s tidak valid. Masukkan email yang benar.'));

		if($valid->run()) {
			if(!empty($_FILES['gambar']['name'])) {
			$config['upload_path'] 		= './assets/upload/member/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400'; // KB
			$config['max_width']  		= '3000'; // Pixel
			$config['max_height']  		= '3000'; //Pixel
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('gambar')){
		// End validasi

		$data = array(	'title'		=> 'Profil Akun Anda: '.$this->session->userdata('nama'),
						'member'		=> $member,
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'info/akun/list'
					);
		$this->load->view('layout/wrapper', $data, FALSE);

		// Masuk database
		}else{
			$upload_data        		= array('uploads' =>$this->upload->data());
	        // Image Editor
	        $config['image_library']  	= 'gd2';
	        $config['source_image']   	= './assets/upload/member/'.$upload_data['uploads']['file_name']; 
	        $config['new_image']     	= './assets/upload/member/thumbs/';
	        $config['create_thumb']   	= TRUE;
	        $config['quality']       	= "100%";
	        $config['maintain_ratio']   = TRUE;
	        $config['width']       		= 360; // Pixel
	        $config['height']       	= 360; // Pixel
	        $config['x_axis']       	= 0;
	        $config['y_axis']       	= 0;
	        $config['thumb_marker']   	= '';
	        $this->load->library('image_lib', $config);
	        $this->image_lib->resize();

			$i = $this->input;
			$this->session->set_userdata('nama',$i->post('nama'));
			$data = array(	'id_user'			=> $id_user,
							'nama'				=> $i->post('nama'),
							'email'				=> $i->post('email'),
                            'gambar'			=> $upload_data['uploads']['file_name'],
                            'Prodi'             => $i->post('Prodi'),
                            'NIM'               => $i->post('NIM'),
                            'Motivasi'          => $i->post('Motivasi'),
						);
			$this->info_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data '.$member->nama.' telah diupdate');
			redirect(base_url('info/member'),'refresh');
		}}else{
			$i = $this->input;
			$this->session->set_userdata('nama',$i->post('nama'));
			$data = array(	'id_user'			=> $id_user,
							'nama'				=> $i->post('nama'),
                            'email'				=> $i->post('email'),
                            'Prodi'             => $i->post('Prodi'),
                            'NIM'               => $i->post('NIM'),
                            'Motivasi'          => $i->post('Motivasi'),
						);
			$this->info_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data '.$member->nama.' telah diupdate');
			redirect(base_url('info/member'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'		=> 'Profil Akun Anda: '.$this->session->userdata('nama'),
						'member'		=> $member,
						'isi'		=> 'info/akun/list',
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}
	
	public function detail_other($slug_member){
		$member = $this->member_model->detail_other($slug_member);
		if($member){
        $data = array(
            'title' => 'Detail Info - '.$member->nama,
            'isi'   => 'info/akun/detail_other',
            'member' => $member,
		);
		$this->load->view('layout/wrapper',$data);
	}
	else{
		echo "<script>
		window.location=history.go(-1);
		</script>";
	}
	}

    // Main page akun
	public function password()
	{
		$id_user 	= $this->session->userdata('id_user');
		$member 		= $this->member_model->detail($id_user);

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('password','Password','required|trim|min_length[6]|max_length[32]',
			array(	'required'		=> '%s harus diisi',
					'min_length'	=> '%s minimal 6 karakter',
					'max_length'	=> '%s maksimal 32 karakter'));

		$valid->set_rules('passconf', 'Konfirmasi password', 'required|matches[password]',
			array(	'required'	=> '%s harus diisi',
					'matches'	=> '%s tidak cocok. Pastikan password Anda sama'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Profil Akun Anda: '.$this->session->userdata('nama'),
						'member'		=> $member,
						'isi'		=> 'admin/akun/password',
					);
		$this->load->view('layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			
			$i = $this->input;
			$this->session->set_userdata('nama',$i->post('nama'));
			$data = array(	'id_user'			=> $id_user,
							'password'			=> sha1($i->post('password')),
						);
			$this->info_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data '.$member->nama.' telah diupdate');
			redirect(base_url('info/member'),'refresh');
		}
	}
}


?>