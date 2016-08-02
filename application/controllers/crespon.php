<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class crespon extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('mrespon');
	}

	public function dariadmin()
	{
		$data['saran'] = $this->mrespon->lihat_saran();
		$this->load->view('dinas/header')->view('dinas/respon/dariadmin', $data)->view('dinas/footer');
	}

	//COBA
	public function respon($id_saran)
	{
		$id_skpd = 18; //$id_skpd : di set statis dulu. aturannya diambil dari id_skpd session pengguna

		$data['saran'] = $this->mrespon->saran($id_saran);
		$data['respon'] = $this->mrespon->respon($id_saran, $id_skpd);
		$this->load->view('dinas/header')->view('dinas/respon/respon', $data)->view('dinas/footer');
	}

	//COBA -_-
	public function balas($id_saran)
	{
		$data['respon'] = $this->mrespon->balas_respon($id_saran);
		$this->load->view('dinas/header')->view('dinas/respon/balas', $data)->view('dinas/footer');
	}

	public function kirim_respon($id_respon)
	{
		$kategori = $this->input->post('kategori');
		$isi_respon = $this->input->post('isi_respon');
		$lampiran_respon = $this->input->post('lampiran_respon');
		$date = date_create();
		$tanggal_respon = date_format($date, 'Y-m-d H:i:s');
		$id_saran = $this->input->post('id_saran');

		$data = array(
			'kategori' => $kategori,
			'isi_respon' => $isi_respon,
			'lampiran_respon' => $lampiran_respon,
			'tanggal_respon' => $tanggal_respon,
		);

		$data_saran = array(
			'isStatus' => 'respon baru',
		);
		$this->mrespon->kirim_respon($id_respon, $data);
		$this->mrespon->respon_saran($id_saran, $data_saran);
		redirect (base_url().'crespon/balas/'.$id_respon);
	}

	public function publish($id_respon)
	{
		$id_saran = $this->input->post('id_saran');
		if($this->input->post('btn2')=="publish"){
			$data = array (
				'isAktif' => 1,
				);
		}
		else{
			$data = array (
				'isAktif' => 0,
				);
		}
		$this->mrespon->publish($id_respon, $data);
		redirect(base_url().'SaranController/detail/'.$id_saran);
	}
}