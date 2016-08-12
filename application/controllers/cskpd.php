<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cskpd extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('mskpd');
		$this->load->helper(array('form', 'url'));
	}

	public function lihat()
	{
		$this->load->database();
		$jumlah_data = $this->mskpd->jumlah_data();
		$this->load->library('pagination');
		$config['base_url'] = base_url().'index.php/cskpd/lihat/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
        
        $config['cur_tag_open'] = '<a class="current" style="color:#fff; background-color:#358fe4; font-weight: bold;">';
        $config['cur_tag_close'] = '</a>';
        $config['prev_link'] = '<';
        $config['next_link'] = '>';
        $config['last_link'] = '>>';
        $config['first_link'] = '<<';
        
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);

		$data['skpd'] = $this->mskpd->GetAkunskpd($config['per_page'], $from);
        $data['links'] = $this->pagination->create_links();
		$this->load->view('humas/header')->view('humas/skpd/lihat', $data)->view('humas/footer');
	} 

	public function search()
	{
	    $this->load->library('form_validation');
	    $this->form_validation->set_rules('cari','Pencarian','trim|regex_match[/^[a-zA-Z .0-9]{1,100}$/]');
	    $this->form_validation->set_message('regex_match', '{field} tidak ditemukan');
	        
	    if ($this->form_validation->run() == FALSE){
	        $this->session->set_flashdata("pesan","<div class=\"alert alert-warning\" id=\"alert\">Pencarian tidak ditemukan<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
	        $this->lihat();
	        
	    }
	    else{
	    	$this->load->database();
	        $cari = $this->input->POST('cari');
	        $this->load->library('pagination');
	        $config = array();
	        $config['base_url'] = base_url() . "Cskpd/search";
	        $total_row = $this->mskpd->record_count_search($cari);
	            //var_dump($total_row);
	        $config['total_rows'] = $total_row;
	        $config['per_page'] = 10;
	        $config['cur_tag_open'] = '<a class="current" style="color:#fff; background-color:#358fe4; font-weight: bold;">';
	   	    $config['cur_tag_close'] = '</a>';
	        $config['prev_link'] = '<i class="fa fa-caret-left"></i>';
	        $config['next_link'] = '<i class="fa fa-caret-right"></i>';
	        $config['last_link'] = '<i class="fa fa-forward"></i>';
	        $config['first_link'] = '<i class="fa fa-backward"></i>';
	        $config['uri_segment'] = 3;
	        
	        $this->pagination->initialize($config);
	        $strpage = $this->uri->segment(3,0);
	            
	        $data['skpd'] = $this->mskpd->pencarian($cari,$config['per_page'],$strpage);
	        $data['links'] = $this->pagination->create_links();
	            
	   	    if($data['skpd'] == NULL || $cari==''){
	            $this->session->set_flashdata("pesan","<div class=\"alert alert-warning\" id=\"alert\">Pencarian tidak ditemukan<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
	            //$this->lihat();
	        }
	        else{   
	            $this->load->view('humas/header')->view('humas/skpd/lihat', $data)->view('humas/footer');
	        }   
	    }
	}

	public function tambah()
	{
		$this->load->view('humas/header')->view('humas/skpd/tambah')->view('humas/footer');
	}

	public function do_tambah()
	{
		$this->load->library('form_validation');
        $this->load->library('session');
        $this->form_validation->set_rules('kodeUnit', 'kodeUnit', 'trim|max_length[25]|regex_match[/^[a-z]{0,25}$/]');
        $this->form_validation->set_rules('bagian', 'Bagian', 'trim|max_length[50]');
        $this->form_validation->set_rules('bentuk', 'Bentuk', 'trim|max_length[25]');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|max_length[100]|required|regex_match[/^[a-zA-Z .]{1,100}$/]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|max_length[255]');
        $this->form_validation->set_rules('telepon', 'Telepon', 'trim|max_length[20]|regex_match[/^[+0-9 ()-]{3,20}$/]');
        $this->form_validation->set_rules('fax', 'Fax', 'trim|max_length[20]');
        $this->form_validation->set_rules('email', 'Email', 'trim|max_length[255]|valid_email');
        $this->form_validation->set_rules('website', 'Website', 'trim|max_length[255]');

        $this->form_validation->set_message('max_length', '{field} maksimal {param} karakter.');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        $this->form_validation->set_message('regex_match', '{field} tidak sesuai format penulisan yang benar');
        $this->form_validation->set_message('valid_email', '{field} tidak sesuai format penulisan yang benar');

		if ($this->form_validation->run() == FALSE){
            $this->tambah();
        }
        else{
			$kodeUnit = $this->input->post('kodeUnit');
			$bagian = $this->input->post('bagian');
			$bentuk = $this->input->post('bentuk');
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');
			$telepon = $this->input->post('telepon');
			$fax = $this->input->post('fax');
			$email = $this->input->post('email');
			$website = $this->input->post('website');
			$urut = $this->input->post('urut');
			if ($urut==NULL) {
				$urut=99;
			}
			$tema = $this->input->post('tema');

			$data = array(
				'kodeUnit' => $kodeUnit,
				'bagian' => $bagian,
				'bentuk' => $bentuk,
				'nama' => $nama,
				'alamat' => $alamat,
				'telepon' => $telepon,
				'fax' => $fax,
				'email' => $email,
				'website' => $website,
				'urut' => $urut,
				'tema' => $tema
				);
			$this->mskpd->AddAkun1($data, 'skpd');
			$this->session->set_flashdata("pesan","<div class=\"alert alert-success\" id=\"alert\">Berhasil menambah data SKPD<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
			redirect('Cskpd/lihat');
		}
	}

	public function update($id_skpd)
	{
		$where = array('id_skpd' => $id_skpd);
		$data['skpd'] = $this->mskpd->UpdateAkun($where, 'skpd')->result();
		$this->load->view('humas/header')->view('humas/skpd/edit', $data)->view('humas/footer');
	}

	public function do_update()
	{
		$this->load->library('form_validation');
        $this->load->library('session');
        $this->form_validation->set_rules('kodeUnit', 'kodeUnit', 'trim|max_length[25]|regex_match[/^[a-z]{0,25}$/]');
        $this->form_validation->set_rules('bagian', 'Bagian', 'trim|max_length[50]');
        $this->form_validation->set_rules('bentuk', 'Bentuk', 'trim|max_length[25]');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|max_length[100]|required|regex_match[/^[a-zA-Z .]{1,100}$/]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|max_length[255]');
        $this->form_validation->set_rules('telepon', 'Telepon', 'trim|max_length[20]|regex_match[/^[+0-9 ()-]{3,20}$/]');
        $this->form_validation->set_rules('fax', 'Fax', 'trim|max_length[20]');
        $this->form_validation->set_rules('email', 'Email', 'trim|max_length[255]|valid_email');
        $this->form_validation->set_rules('website', 'Website', 'trim|max_length[255]');
        //$this->form_validation->set_rules('urut', 'Urut', 'trim|max_length[6]|');
        //$this->form_validation->set_rules('tema', 'Tema', 'trim|max_length[25]|');

        $this->form_validation->set_message('max_length', '{field} maksimal {param} karakter.');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        $this->form_validation->set_message('regex_match', '{field} tidak sesuai format penulisan yang benar');
        $this->form_validation->set_message('valid_email', '{field} tidak sesuai format penulisan yang benar');

        $id_skpd = $this->input->post('id_skpd');

		if ($this->form_validation->run() == FALSE){
            $this->update($id_skpd);
        }
        else{
			$kodeUnit = $this->input->post('kodeUnit');
			$bagian = $this->input->post('bagian');
			$bentuk = $this->input->post('bentuk');
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');
			$telepon = $this->input->post('telepon');
			$fax = $this->input->post('fax');
			$email = $this->input->post('email');
			$website = $this->input->post('website');
			$urut = $this->input->post('urut');
			$tema = $this->input->post('tema');
			$isLink = $this->input->post('isLink');
			$isAktif = $this->input->post('isAktif');

			$data = array(
				'kodeUnit' => $kodeUnit,
				'bagian' => $bagian,
				'bentuk' => $bentuk,
				'nama' => $nama,
				'alamat' => $alamat,
				'telepon' => $telepon,
				'fax' => $fax,
				'email' => $email,
				'website' => $website,
				'urut' => $urut,
				'tema' => $tema,
				'isLink' => $isLink,
				'isAktif' => $isAktif
			);
			
			$this->mskpd->UpdateAkun1($id_skpd, $data);
			$this->session->set_flashdata("pesan","<div class=\"alert alert-success\" id=\"alert\">Perubahan berhasil disimpan<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
			redirect('Cskpd/lihat');
		}
	}

	 public function hapus($id_skpd)
    {
        $this->mskpd->DeleteSKPD($id_skpd);
        redirect('Cskpd/lihat');
    }
}