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
		$data['ID_SARAN'] = $ID_SARAN;
		$this->load->view('humas/header')->view('humas/saran/disposisi', $data)->view('humas/footer');
	}

	public function disposisikan($ID_SARAN)
	{
		$ID_ADMIN = $this->input->post('id_admin');
		$NAMA_DINAS = $this->SaranModel->dinas($ID_ADMIN); //belum bisa
		$date = date_create();
		$tanggal =  date_format($date, 'Y-m-d H:i:s');
		$RESPON_HUMAS = "Laporan telah didisposisikan kepada ".$NAMA_DINAS." sejak tanggal ".$tanggal;
		$STATUS_LAPORAN = 1;
		$data = array (
			'ID_ADMIN' => $ID_ADMIN,
			'RESPON_HUMAS' => $RESPON_HUMAS,
			'STATUS_LAPORAN' => $STATUS_LAPORAN,
			'TANGGAL_DISPOSISI' =>$tanggal,
			);
		$this->SaranModel->disposisikan_saran($ID_SARAN, $data);
		redirect(base_url()."SaranController/detail/".$ID_SARAN);
	}

	public function publish($ID_SARAN)
	{
		$data = array (
			'STATUS_LAPORAN' => 3,			
			);
		$this->SaranModel->publish_saran($ID_SARAN, $data);
		redirect(base_url()."SaranController/detail/".$ID_SARAN);
	}
}
