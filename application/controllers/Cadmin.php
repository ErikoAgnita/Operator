<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadmin extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('madmin');
		$this->load->helper('url');
	}

	public function lihat()
	{
		$data['admin'] = $this->madmin->GetAkun();
		$this->load->view('humas/header')->view('humas/admin/lihat', $data)->view('humas/footer');

	} 

	public function tambah()
	{
		$this->load->view('humas/header')->view('humas/admin/tambah')->view('humas/footer');
	}

	public function do_tambah()
	{
		$NAMA = $this->input->post('nama');
		$EMAIL = $this->input->post('email');
		$TELP = $this->input->post('telepon');
		$ALAMAT = $this->input->post('alamat');
		$USERNAME = $this->input->post('username');
		$PASSWORD = $this->input->post('password');

		$data = array(
			'NAMA' => $NAMA,
			'EMAIL' => $EMAIL,
			'TELP' => $TELP,
			'ALAMAT' => $ALAMAT,
			'USERNAME' => $USERNAME,
			'PASSWORD' => $PASSWORD
			);
		$this->madmin->AddAkun($data, 'admin');
		redirect('Cadmin/lihat');
	}

	public function update($ID_ADMIN)
	{
		$where = array('ID_ADMIN' => $ID_ADMIN);
		$data['admin'] = $this->madmin->UpdateAkun($where, 'admin')->result();
		$this->load->view('edit', $data);
	}

	public function do_update($ID_ADMIN)
	{
		$ID_ADMIN = $this->input->post('ID_ADMIN');
		$NAMA = $this->input->post('nama');
		$EMAIL = $this->input->post('email');
		$TELP = $this->input->post('telepon');
		$ALAMAT = $this->input->post('alamat');
		$USERNAME = $this->input->post('username');
		$PASSWORD = $this->input->post('password');

		$data = array(
			'NAMA' => $NAMA,
			'EMAIL' => $EMAIL,
			'TELP' => $TELP,
			'ALAMAT' => $ALAMAT,
			'USERNAME' => $USERNAME,
			'PASSWORD' => $PASSWORD
		);

		$where = array(
			'ID_ADMIN' => $ID_ADMIN
		);

		$this->madmin->UpdateAkun1($where, $data, 'admin');
		redirect('Cadmin/lihat');

	}

	public function hapus($ID_ADMIN)
	{
		$where = array('ID_ADMIN' => $ID_ADMIN);
		$this->madmin->Delete($where, 'admin');
		redirect('Cadmin/lihat');
	}
}
