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
		$NAMA_DINAS = $this->input->post('nama');
		$ALAMAT_DINAS = $this->input->post('alamat');
		$EMAIL_ADMIN = $this->input->post('email');
		$TELEPON = $this->input->post('telepon');
		$USERNAME = $this->input->post('username');
		$PASSWORD = $this->input->post('password');
		$LEVEL = $this->input->post('level');

		$data = array(
			'NAMA_DINAS' => $NAMA_DINAS,
			'ALAMAT_DINAS' => $ALAMAT_DINAS,
			'EMAIL_ADMIN' => $EMAIL_ADMIN,
			'TELEPON' => $TELEPON,
			'USERNAME' => $USERNAME,
			'PASSWORD' => $PASSWORD,
			'LEVEL' => $LEVEL
			);
		$this->madmin->AddAkun($data, 'admin');
		redirect('Cadmin/lihat');
	}

	public function update($ID_ADMIN)
	{
		$where = array('ID_ADMIN' => $ID_ADMIN);
		$data['admin'] = $this->madmin->UpdateAkun($where, 'admin')->result();
		$this->load->view('humas/header')->view('humas/admin/edit', $data)->view('humas/footer');
	}

	public function do_update($ID_ADMIN)
	{
		$ID_ADMIN = $this->input->post('ID_ADMIN');
		$NAMA_DINAS = $this->input->post('nama');
		$ALAMAT_DINAS = $this->input->post('alamat');
		$EMAIL_ADMIN = $this->input->post('email');
		$TELEPON = $this->input->post('telepon');
		$USERNAME = $this->input->post('username');
		$PASSWORD = $this->input->post('password');
		$LEVEL = $this->input->post('level');

		$data = array(
			'NAMA_DINAS' => $NAMA_DINAS,
			'ALAMAT_DINAS' => $ALAMAT_DINAS,
			'EMAIL_ADMIN' => $EMAIL_ADMIN,
			'TELEPON' => $TELEPON,
			'USERNAME' => $USERNAME,
			'PASSWORD' => $PASSWORD,
			'LEVEL' => $LEVEL
		);

		$where = array(
			'ID_ADMIN' => $ID_ADMIN
		);

		$this->madmin->UpdateAkun1($where, $data, 'admin');
		redirect('Cadmin/lihat');

	}

	public function hapus($ID_ADMIN)
	{
		$this->madmin->Delete($ID_ADMIN);
		redirect(base_url().'Cadmin/lihat');
	}

	public function index()
	{
		$this->load->view('dinas/header')->view('dinas/index')->view('dinas/footer');
	}

	public function dinas_lihat()
	{
		$data['admin'] = $this->madmin->GetAkun();
		$this->load->view('dinas/header')->view('dinas/akun/lihat', $data)->view('dinas/footer');
	}

	public function profil(){   //profil guru
       // $id_admin = $_SESSION['userid'];
        $data['adata']	= $this->madmin->get_profil($id_admin);   //angka 1 nanti diganti dengan id_guru yang login sesuai session
        $this->load->view('dinas/header')->view('dinas/akun/lihat',$data)->view('dinas/footer');
    }
    
	public function dinas_ubah()
	{
		$this->load->view('dinas/header')->view('dinas/akun/ubah')->view('dinas/footer');
	}
}
