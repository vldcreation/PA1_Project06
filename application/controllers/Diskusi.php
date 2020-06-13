<?php

class Diskusi extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('diskusi_model');
        $this->load->model('kategori_model');
        $this->load->model('user_model');
        $this->load->model('info_model');
        $this->load->model('komentar_model');
        $this->load->model('quotes_model');
        //check login
        // // Tambahkan proteksi halaman
		 $url_pengalihan = str_replace('index.php/', '', current_url());
		 $pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
		 //Ambil check login dari simple_login
		 $this->simple_login->check_login($pengalihan);
    }
    public function index(){
        $useraktif = $this->session->userdata('nama');
        $site 		= $this->konfigurasi_model->listing();
        //diskusi populer
        $populer	= $this->diskusi_model->populer();
        // diskusi dan paginasi
		$this->load->library('pagination');
		$config['base_url'] 		= base_url().'diskusi/index/';
		$config['total_rows'] 		= count($this->diskusi_model->total());
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] 		= 5;
		$config['uri_segment'] 		= 3;
		$config['full_tag_open'] 	= '<ul class="pagination">';
        $config['full_tag_close'] 	= '</ul>';
        $config['first_link'] 		= '&laquo; First';
        $config['first_tag_open'] 	= '<li class="prev page">';
        $config['first_tag_close'] 	= '</li>';

        $config['last_link'] 		= 'Last &raquo;';
        $config['last_tag_open'] 	= '<li class="next page">';
        $config['last_tag_close'] 	= '</li>';

        $config['next_link'] 		= 'Next &rarr;';
        $config['next_tag_open'] 	= '<li class="next page">';
        $config['next_tag_close'] 	= '</li>';

        $config['prev_link'] 		= '&larr; Preivious';
        $config['prev_tag_open'] 	= '<li class="prev page">';
        $config['prev_tag_close'] 	= '</li>';

        $config['cur_tag_open'] 	= '<li class="active"><a href="">';
        $config['cur_tag_close'] 	= '</a></li>';

        $config['num_tag_open'] 	= '<li class="page">';
        $config['num_tag_close'] 	= '</li>';
		$config['per_page'] 		= 2;
		$config['first_url'] 		= base_url().'diskusi/';
		$this->pagination->initialize($config); 
		$page 		= ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;
		$diskusi 	= $this->diskusi_model->diskusi($config['per_page'], $page);

        $data = array(
            'title' => "Forum Diskusi - $useraktif",
            'isi' => 'diskusi/list',
            'populer'   => $populer,
            'site'      => $site,
            'pagin' 	=> $this->pagination->create_links(),
            'diskusi' => $diskusi,
        );
        $this->load->view('layout/wrapper',$data,FALSE);
    }

    public function mytopik(){
        $useraktif = $this->session->userdata('nama');
        $total = count($this->diskusi_model->total());
        $totalmytopik = count($this->diskusi_model->total_topik( $this->session->userdata('nama')));
         // diskusi dan paginasi
		$this->load->library('pagination');
		$config['base_url'] 		= base_url().'diskusi/index/';
		$config['total_rows'] 		= $total;
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
		$config['first_url'] 		= base_url().'diskusi/';
		$this->pagination->initialize($config); 
		$page 		= ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;
        $diskusi 	= $this->diskusi_model->diskusi($config['per_page'], $page);
        $data = array(
            'title' => "Forum Diskusi - My-Topik -$useraktif",
            'isi' => 'diskusi/mytopik',
            'useraktif' => $useraktif,
            'total'     => $totalmytopik,
            'diskusi' => $diskusi,
        );
		$this->load->view('layout/wrapper', $data, FALSE);	
    }

    public function viewall(){
        $useraktif = $this->session->userdata('nama');
        //diskusi populer
        $populer	= $this->diskusi_model->populer();
        $site 		= $this->konfigurasi_model->listing();
         // diskusi dan paginasi
		$this->load->library('pagination');
		$config['base_url'] 		= base_url().'diskusi/index/';
		$config['total_rows'] 		= count($this->diskusi_model->total());
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
		$config['per_page'] 		= count($this->diskusi_model->total());;
		$config['first_url'] 		= base_url().'diskusi/';
		$this->pagination->initialize($config); 
		$page 		= ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;
        $diskusi 	= $this->diskusi_model->diskusi($config['per_page'], $page);
        $data = array(
            'title' => "Forum Diskusi - View ALL -$useraktif",
            'isi' => 'diskusi/list',
            'useraktif' => $useraktif,
            'site'      => $site,
            'pagin' 	=> $this->pagination->create_links(),
            'populer'   => $populer,
            'diskusi' => $diskusi,
        );
		$this->load->view('layout/wrapper', $data, FALSE);	
    }

    // Search
	public function search()
	{
		$this->load->helper('security');
		$keyword 	= xss_clean($_GET['s']);
		$keywords	= encode_php_tags($keyword);
		$populer	= $this->diskusi_model->populer();

		if($keywords=="") {
			redirect(base_url('diskusi'),'refresh');
		}

		$site 		= $this->konfigurasi_model->listing();
		
		// Diskusi dan paginasi
		// Diskusi dan paginasi
		$this->load->library('pagination');
		$config['base_url'] 		= base_url().'diskusi/search?s='.$keywords;
		$config['total_rows'] 		= count($this->diskusi_model->total_search($keywords));
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] 		= 5;
		$config['uri_segment'] 		= 3;
		$config['full_tag_open'] 	= '<ul class="pagination">';
        $config['full_tag_close'] 	= '</ul>';
        $config['first_link'] 		= '&laquo; First';
        $config['first_tag_open'] 	= '<li class="prev page">';
        $config['first_tag_close'] 	= '</li>';

        $config['last_link'] 		= 'Last &raquo;';
        $config['last_tag_open'] 	= '<li class="next page">';
        $config['last_tag_close'] 	= '</li>';

        $config['next_link'] 		= 'Next &rarr;';
        $config['next_tag_open'] 	= '<li class="next page">';
        $config['next_tag_close'] 	= '</li>';

        $config['prev_link'] 		= '&larr; Previous';
        $config['prev_tag_open'] 	= '<li class="prev page">';
        $config['prev_tag_close'] 	= '</li>';

        $config['cur_tag_open'] 	= '<li class="active"><a href="">';
        $config['cur_tag_close'] 	= '</a></li>';

        $config['num_tag_open'] 	= '<li class="page">';
        $config['num_tag_close'] 	= '</li>';
		$config['per_page'] 		= count($this->diskusi_model->total_search($keywords));
		$config['first_url'] 		= base_url().'diskusi/search?s='.$keywords;
		$this->pagination->initialize($config); 
		$page 		= ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;
		$diskusi 	= $this->diskusi_model->search($keywords,$config['per_page'], $page);

		$data = array(	'title'		=> 'Hasil pencarian: '.$keywords.' ('. count($this->diskusi_model->total_search($keyword)) .')',
						'deskripsi'	=> 'Diskusi - '.$site->namaweb,
						'keywords'	=> 'Diskusi - '.$site->namaweb,
						'pagin' 	=> $this->pagination->create_links(),
						'diskusi'	=> $diskusi,
                        'site'		=> $site,
                        'total'     => count($this->diskusi_model->total_search($keyword)),
                        'keyword'   => $keyword,
						'populer'	=> $populer,
						'isi'		=> 'diskusi/list');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

    public function read($slug_diskusi)	{
		$site 		= $this->konfigurasi_model->listing();
		$diskusi 	= $this->diskusi_model->read($slug_diskusi);
        $listing 	= $this->diskusi_model->populer();
        $komentar   = $this->komentar_model->listing($diskusi->id_diskusi);
        $user       = $this->info_model->get_one($this->session->userdata('nama'));
        $quotes     = $this->quotes_model->listing();

		if(count(array($diskusi)) < 1) {
			redirect(base_url('oops'),'refresh');
		}

        //updatejlhkomentar
        if($diskusi) {
            $countjlh = count($this->komentar_model->jlhkomentar($diskusi->id_diskusi));
            $hit 		= array(	'id_diskusi'	=> $diskusi->id_diskusi,
                                    'jlh_komentar'		=> $countjlh);
            $this->diskusi_model->update_jlh_komentar($hit);
        }

		// Update hit
		if($diskusi) {
			$newhits 	= $diskusi->hits + 1;
			$hit 		= array(	'id_diskusi'	=> $diskusi->id_diskusi,
									'hits'		=> $newhits);
			$this->diskusi_model->update_hit($hit);
		}
		//  End update hit

		$data = array(	'title'		=> $diskusi->judul_diskusi.' post by -'.$diskusi->penulis_diskusi,
						'deskripsi'	=> $diskusi->judul_diskusi,
						'diskusi'	=> $diskusi,
						'populer'	=> $listing,
                        'site'		=> $site,
                        'user'      => $user,
                        'komentar'  => $komentar,
                        'quotes'    =>  $quotes,
						'isi'		=> 'diskusi/read');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

    // Tambah diskusi
	public function tambah()	{
		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('judul_diskusi','Judul','required',
			array(	'required'	=>  ' %s harus diisi'));

		$valid->set_rules('isi_diskusi','Isi','required',
			array(	'required'	=> '%s galeri harus diisi'));

		if($valid->run()) {
			$config['upload_path']   = './assets/upload/image/';
      		$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
      		$config['max_size']      = '12000'; // KB  
            $this->load->library('upload', $config);
            
            if(! $this->upload->do_upload('gambar')) {
                // End validasi
        
                $data = array(	'title'				=> 'Tambah Diskusi',
                                'error'    			=> $this->upload->display_errors(),
                                'isi'				=> 'diskusi/tambah');
                $this->load->view('layout/wrapper', $data, FALSE);
                // Masuk database
                }else{
      		
			$upload_data        		= array('uploads' =>$this->upload->data());
	        // Image Editor
	        $config['image_library']  	= 'gd2';
	        $config['source_image']   	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
	        $config['new_image']     	= './assets/upload/image/diskusi/';
	        $config['create_thumb']   	= TRUE;
	        $config['quality']       	= "100%";
	        $config['maintain_ratio']   = TRUE;
	        $config['width']       		= 380; // Pixel
	        $config['height']       	= 380; // Pixel
	        $config['x_axis']       	= 0;
	        $config['y_axis']       	= 0;
	        $config['thumb_marker']   	= '';
	        $this->load->library('image_lib', $config);
	        $this->image_lib->resize();

            $i 		= $this->input;
            $slug 	= url_title($i->post('judul_diskusi'),'dash',TRUE);
            $date = date("G:i d/m/Y");
	        $data = array(	'id_users'			=> $this->session->userdata('id_user'),
	        				'judul_diskusi'		=> $i->post('judul_diskusi'),
	        				'isi_diskusi'				=> $i->post('isi_diskusi'),
                            'penulis_diskusi'		=> $this->session->userdata('nama'),
                            'tanggal_diskusi'   =>  date('Y-m-d',strtotime($i->post('tanggal_publish'))).' '.$i->post('jam_publish'),
	        				'gambar_diskusi'			=> $upload_data['uploads']['file_name'],
                            'jlh_komentar'			=> '0',
                            'slug_diskusi' =>  $slug,
                            );
            $this->diskusi_model->tambah($data);
	        $this->session->set_flashdata('sukses', 'Data telah ditambah');
	        redirect(base_url('diskusi/viewall'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'				=> 'Tambah Topik Diskusi Baru',
                        'isi'				=> 'diskusi/tambah');
		$this->load->view('layout/wrapper', $data, FALSE);		
    }

    // Edit diskusi
	public function edit($id_diskusi)	{
		// Validasi
        $valid = $this->form_validation;
        $diskusi = $this->diskusi_model->detail($id_diskusi);

		$valid->set_rules('judul_diskusi','Judul','required',
			array(	'required'	=>  ' %s harus diisi'));

		$valid->set_rules('isi_diskusi','Isi','required',
			array(	'required'	=> '%s galeri harus diisi'));

		if($valid->run()) {
			$config['upload_path']   = './assets/upload/image/';
      		$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
      		$config['max_size']      = '12000'; // KB  
            $this->load->library('upload', $config);
            
            if(! $this->upload->do_upload('gambar')) {
                // End validasi
        
                $data = array(	'title'				=> 'Edit Diskusi : '.$diskusi->judul_diskusi,
                                'error'    			=> $this->upload->display_errors(),
                                'isi'				=> 'diskusi/edit',
                                'diskusi'           => $diskusi,);
                $this->load->view('layout/wrapper', $data, FALSE);
                // Masuk database
                } else {
      		
			$upload_data        		= array('uploads' =>$this->upload->data());
	        // Image Editor
	        $config['image_library']  	= 'gd2';
	        $config['source_image']   	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
	        $config['new_image']     	= './assets/upload/image/diskusi/';
	        $config['create_thumb']   	= TRUE;
	        $config['quality']       	= "100%";
	        $config['maintain_ratio']   = TRUE;
	        $config['width']       		= 380; // Pixel
	        $config['height']       	= 380; // Pixel
	        $config['x_axis']       	= 0;
	        $config['y_axis']       	= 0;
	        $config['thumb_marker']   	= '';
	        $this->load->library('image_lib', $config);
	        $this->image_lib->resize();

            $i 		= $this->input;
            $slug 	= url_title($i->post('judul_diskusi'),'dash',TRUE);
            $date = date("G:i d/m/Y");
	        $data = array(	'id_diskusi'        => $id_diskusi,
                            'id_users'			=> $this->session->userdata('id_user'),
	        				'judul_diskusi'		=> $i->post('judul_diskusi'),
	        				'isi_diskusi'				=> $i->post('isi_diskusi'),
                            'penulis_diskusi'		=> $this->session->userdata('nama'),
                            'tanggal_diskusi'   =>  date('Y-m-d',strtotime($i->post('tanggal_publish'))).' '.$i->post('jam_publish'),
	        				'gambar_diskusi'			=> $upload_data['uploads']['file_name'],
                            'jlh_komentar'			=> '0',
                            'slug_diskusi' =>  $slug,
                            );
            $this->diskusi_model->edit($data);
	        $this->session->set_flashdata('sukses', 'Data telah diubah');
	        redirect(base_url('diskusi/mytopik'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'				=> 'Edit Diskusi - '.$diskusi->judul_diskusi,
                        'isi'				=> 'diskusi/edit',
                        'diskusi'           => $diskusi,
                    );
		$this->load->view('layout/wrapper', $data, FALSE);		
    }

    public function comment(){
        $valid = $this->form_validation;
        // validasi
        $valid->set_rules('isi_komentar','Komentar','required',
            array(	'required'	=> '%s harus diisi'));
        $user = $this->user_model->detail($this->session->userdata('id_user'));
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
    $this->komentar_model->tambah($data);

    $url_refresh = $i->post('slug_diskusi');
    $this->session->set_flashdata('sukses', 'Data telah ditambah');
	redirect(base_url('diskusi/read/'.$url_refresh),'refresh');

    }

    	// Delete
	public function delete($id_diskusi) {
		// Tambahkan proteksi halaman
        $url_pengalihan = str_replace('index.php/', '', current_url());
        $pengalihan 	= $this->session->set_userdata('pengalihan',$url_pengalihan);
        // Ambil check login dari simple_login
        $this->simple_login->check_login($pengalihan);

		$diskusi	= $this->diskusi_model->detail($id_diskusi);
		$data = array('id_diskusi'	=> $id_diskusi);
		$this->diskusi_model->delete($data);		
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
	        redirect(base_url('diskusi/mytopik'),'refresh');

	}
    
    
}