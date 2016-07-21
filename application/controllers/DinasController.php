<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DinasController extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('DinasModel');
	}

	public function lihat()
	{
		$data['h'] = $this->DinasModel->lihat_dinas();
    	$this->load->view('humas/header')->view('humas/dinas/lihat', $data)->view('humas/footer');
	}

	public function tambah()
	{
		$this->load->view('humas/header')->view('humas/dinas/tambah')->view('humas/footer');
	}

	public function insert()
	{
		$NAMA_DINAS=$this->input->post('nama_dinas');
		$USERNAME=$this->input->post('username');
		$TELEPON=$this->input->post('telepon');
		$PASSWORD=$this->input->post('password');

		$data = array(
            'NAMA_DINAS' => $NAMA_DINAS,
            'USERNAME' => $USERNAME,
            'TELP' => $TELEPON,
            'PASSWORD' => $PASSWORD
            );

        $this->DinasModel->tambah_dinas($data);

        redirect(base_url()."DinasController/lihat");
	}

	public function ubah($ID_DINAS)
	{
		$data['h'] = $this->DinasModel->form_ubah_dinas($ID_DINAS);
		$this->load->view('humas/header')->view('humas/dinas/ubah', $data)->view('humas/footer');
	}
}
