<?php

class Reply extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('diskusi_model');
        $this->load->model('kategori_model');
        $this->load->model('user_model');
        $this->load->model('komentar_model');
        $this->load->model('reply_model');
        //check login
        // // Tambahkan proteksi halaman
		 $url_pengalihan = str_replace('index.php/', '', current_url());
		 $pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
		 //Ambil check login dari simple_login
		 $this->simple_login->check_login($pengalihan);
    }

    public function tambah(){

    }

    public function contoh(){
        echo "wkwkwk mana jagungnya ";
        echo "<br> Ularnya enak guys";
        $data = array(
            'title' => 'contoh reply',
            'isi' => '',
        );
        $this->load->view('layout/wrapper',$data);
    }

    	// Delete
	public function delete($id_komentar,$slug_diskusi) {
		// Tambahkan proteksi halaman
        $url_pengalihan = str_replace('index.php/', '', current_url());
        $pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
        // Ambil check login dari simple_login
        $this->simple_login->check_login($pengalihan);
		$data = array('id_komentar'	=> $id_komentar);
		$this->komentar_model->delete($data);		
		$this->session->set_flashdata('sukses','Data deleted successfully');
		redirect(base_url('diskusi/read/'.$slug_diskusi),'refresh');

    }
    
    public function reply_comment(){
        $valid = $this->form_validation;
        $diskusi 	= $this->diskusi_model->mytopik();
        // validasi
        $valid->set_rules('isi_komentar','Komentar','required',
            array(	'required'	=> '%s harus diisi'));
            
        $i = $this->input;
    
        $data = array(  'id_penulis'        => $this->session->userdata('id_user'),
                        'penulis_komentar'  => $this->session->userdata('nama'),
                        'isi_komentar'      => $i->post('isi_komentar'),
                        'tanggal_komentar'  => date('Y-m-d',strtotime($i->post('tanggal_publish'))).' '.$i->post('jam_publish'),
                        'id_post'           => $i->post('id_post'),
                        'pp_penulis'        => $this->session->userdata('pp'),                
                        'penulis_post'      => $i->post('penulis_post'),
    );
    
    //load ke model
    $this->reply_model->tambah($data);
    
    $url_refresh = $i->post('slug_diskusi');
    $this->session->set_flashdata('sukses', 'Data telah ditambah');
    redirect(base_url('diskusi/read/'.$url_refresh),'refresh');
    
    }
}