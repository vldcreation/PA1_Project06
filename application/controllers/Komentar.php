<?php

class Komentar extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('diskusi_model');
        $this->load->model('kategori_model');
        $this->load->model('user_model');
        $this->load->model('komentar_model');
        //check login
        // // Tambahkan proteksi halaman
		 $url_pengalihan = str_replace('index.php/', '', current_url());
		 $pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
		 //Ambil check login dari simple_login
		 $this->simple_login->check_login($pengalihan);
    }

    public function index(){
        $useraktif = $this->session->userdata('nama');

        // diskusi dan paginasi
		$this->load->library('pagination');
		$config['base_url'] 		= base_url().'komentar/index/';
		$config['total_rows'] 		= count($this->komentar_model->total());
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] 		= 5;
		$config['uri_segment'] 		= 3;
		$config['full_tag_open'] 	= '<ul class="pagination">';
        $config['full_tag_close'] 	= '</ul>';
        $config['first_link'] 		= '&laquo; Awal';
        $config['first_tag_open'] 	= '<li class="prev page">';
        $config['first_tag_close'] 	= '</li>';

        $config['last_link'] 		= 'Akhir &raquo;';
        $config['last_tag_open'] 	= '<li class="next page">';
        $config['last_tag_close'] 	= '</li>';

        $config['next_link'] 		= 'Selanjutnya &rarr;';
        $config['next_tag_open'] 	= '<li class="next page">';
        $config['next_tag_close'] 	= '</li>';

        $config['prev_link'] 		= '&larr; Sebelumnya';
        $config['prev_tag_open'] 	= '<li class="prev page">';
        $config['prev_tag_close'] 	= '</li>';

        $config['cur_tag_open'] 	= '<li class="active"><a href="">';
        $config['cur_tag_close'] 	= '</a></li>';

        $config['num_tag_open'] 	= '<li class="page">';
        $config['num_tag_close'] 	= '</li>';
		$config['per_page'] 		= 8;
		$config['first_url'] 		= base_url().'komentar/';
		$this->pagination->initialize($config); 
		$page 		= ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;
		$komentar 	= $this->komentar_model->komentar($config['per_page'], $page);

        $data = array(
            'komentar' => $komentar,
            'isi'       => 'komentar/list',
        );
        $this->load->view('layout/wrapper',$data,FALSE);
    }

    public function mytopik(){
        $useraktif = $this->session->userdata('nama');
         // diskusi dan paginasi
		$this->load->library('pagination');
		$config['base_url'] 		= base_url().'komentar/index/';
		$config['total_rows'] 		= count($this->komentar_model->total());
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] 		= 5;
		$config['uri_segment'] 		= 3;
		$config['full_tag_open'] 	= '<ul class="pagination">';
        $config['full_tag_close'] 	= '</ul>';
        $config['first_link'] 		= '&laquo; Awal';
        $config['first_tag_open'] 	= '<li class="prev page">';
        $config['first_tag_close'] 	= '</li>';

        $config['last_link'] 		= 'Akhir &raquo;';
        $config['last_tag_open'] 	= '<li class="next page">';
        $config['last_tag_close'] 	= '</li>';

        $config['next_link'] 		= 'Selanjutnya &rarr;';
        $config['next_tag_open'] 	= '<li class="next page">';
        $config['next_tag_close'] 	= '</li>';

        $config['prev_link'] 		= '&larr; Sebelumnya';
        $config['prev_tag_open'] 	= '<li class="prev page">';
        $config['prev_tag_close'] 	= '</li>';

        $config['cur_tag_open'] 	= '<li class="active"><a href="">';
        $config['cur_tag_close'] 	= '</a></li>';

        $config['num_tag_open'] 	= '<li class="page">';
        $config['num_tag_close'] 	= '</li>';
		$config['per_page'] 		= 8;
		$config['first_url'] 		= base_url().'komentar/';
		$this->pagination->initialize($config); 
		$page 		= ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;
        $komentar 	= $this->komentar_model->komentar($config['per_page'], $page);
        $data = array(
            'title' => "Forum komentar - My-Topik -$useraktif",
            'isi' => 'diskusi/mytopik',
            'useraktif' => $useraktif,
            'komentar' => $komentar,
        );
		$this->load->view('layout/wrapper', $data, FALSE);	
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
}