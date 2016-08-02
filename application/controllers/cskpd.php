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

	public function tambah()
	{
		$this->load->view('humas/header')->view('humas/skpd/tambah')->view('humas/footer');
	}

	public function do_tambah()
	{
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
		redirect('Cskpd/lihat');
	}

	public function update($id_skpd)
	{
		$where = array('id_skpd' => $id_skpd);
		$data['skpd'] = $this->mskpd->UpdateAkun($where, 'skpd')->result();
		$this->load->view('humas/header')->view('humas/skpd/edit', $data)->view('humas/footer');
	}

	public function do_update($id_skpd)
	{
		$id_skpd = $this->input->post('id_skpd');
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

		$where = array(
			'id_skpd' => $id_skpd
		);

		$this->mskpd->UpdateAkun1($where, $data, 'skpd');
		redirect('Cskpd/lihat');
	}

	public function hapus($id_skpd)
	{
		$this->mskpd->Delete($id_skpd);
		redirect(base_url().'Cskpd/lihat');
	}
}