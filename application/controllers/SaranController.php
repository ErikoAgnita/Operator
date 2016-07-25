<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SaranController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('SaranModel');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function lihat()
	{
		$data['saran'] = $this->SaranModel->lihat_saran();
    	$this->load->view('humas/header')->view('humas/saran/lihat', $data)->view('humas/footer');
	}

	public function detail($ID_SARAN)
	{
		$data['saran'] = $this->SaranModel->detail_saran($ID_SARAN);
		$this->load->view('humas/header')->view('humas/saran/detail', $data)->view('humas/footer');
	}

	public function saran_respon($ID_SARAN)
	{
		$data['saran'] = $this->SaranModel->saran_respon($ID_SARAN);
		$this->load->view('humas/header')->view('humas/saran/saran_respon', $data)->view('humas/footer');
	}

	public function ubah($ID_SARAN)
	{
		$data['saran'] = $this->SaranModel->ubah_saran($ID_SARAN);
		$this->load->view('humas/header')->view('humas/saran/ubah', $data)->view('humas/footer');
	}

	public function update($ID_SARAN)
	{
		$RESPON_HUMAS=$this->input->post('respon_humas');
		
		$data = array(
            'RESPON_HUMAS' => $RESPON_HUMAS,
            );

        $this->SaranModel->update_saran($ID_SARAN, $data);

        redirect(base_url()."SaranController/detail/".$ID_SARAN);
	}

	public function hapus($ID_SARAN)
	{
		$this->SaranModel->hapus_saran($ID_SARAN);
        redirect(base_url()."SaranController/lihat");
	}

	public function disposisi($ID_SARAN)
	{	
		$data['admin'] = $this->SaranModel->disposisi_saran();
		$this->load->view('humas/header')->view('humas/saran/disposisi', $data, $ID_SARAN)->view('humas/footer');
	}

	public function disposisikan($ID_SARAN)
	{
		$ID_ADMIN = $this->input->post('id_admin');
		$data = array (
			'ID_ADMIN' => $ID_ADMIN,
			);
		$this->SaranModel->disposisikan_saran($ID_SARAN, $data);
		redirect(base_url()."SaranController/detail/".$ID_SARAN);
	}
}
