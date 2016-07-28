<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SaranController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('SaranModel');
	}
	
	//gak dipake
	public function html($id_saran)
	{
		$data['saran'] = $this->SaranModel->detail_saran($id_saran);
		$this->load->view('humas/header')->view('humas/saran/htmldetail', $data)->view('humas/footer');
	}

	//gak dipake
	public function html2()
	{
		$data['saran'] = $this->SaranModel->lihat_saran();
		$this->load->view('humas/header')->view('humas/saran/htmllihat', $data)->view('humas/footer');
	}

	//gak dipake
	public function html3()
	{
		$this->load->view('humas/header')->view('humas/saran/htmllihat2')->view('humas/footer');
	}

	public function lihat()
	{
		$data['saran'] = $this->SaranModel->lihat_saran();
		$this->load->view('humas/header')->view('humas/saran/lihat', $data)->view('humas/footer');
		
	}

	//coba: untuk menampilkan respon juga
	public function detail($id_saran)
	{
		$data['saran'] = $this->SaranModel->detail_saran($id_saran);
		$data['respon'] = $this->SaranModel->respon($id_saran);
		$this->load->view('humas/header')->view('humas/saran/detail', $data)->view('humas/footer');
	}

	//coba: untuk menampilkan respon juga
	public function detail2($id_saran)
	{
		$data['saran'] = $this->SaranModel->detail_saran($id_saran);
		$data['respon'] = $this->SaranModel->respon($id_saran);
		$this->load->view('humas/header')->view('humas/saran/detail2', $data)->view('humas/footer');
	}

	//belum bisa
	public function saran_respon($id_saran)
	{
		$data['saran'] = $this->SaranModel->saran_respon($id_saran);
		$this->load->view('humas/header')->view('humas/saran/saran_respon', $data)->view('humas/footer');
	}

	public function ubah($id_saran)
	{
		$data['saran'] = $this->SaranModel->ubah_saran($id_saran);
		$this->load->view('humas/header')->view('humas/saran/ubah', $data)->view('humas/footer');
	}

	public function update($id_saran)
	{
		$RESPON_HUMAS=$this->input->post('respon_humas');
		
		$data = array(
            'RESPON_HUMAS' => $RESPON_HUMAS,
            );

        $this->SaranModel->update_saran($id_saran, $data);

        redirect(base_url()."SaranController/detail/".$id_saran);
	}

	public function hapus($id_saran)
	{
		$this->SaranModel->hapus_saran($id_saran);
        redirect(base_url()."SaranController/lihat");
	}

	//coba: untuk disposisi ke banyak skpd scr sekaligus
	//bisa klik tambah skpd atau centang mungkin????
	public function disposisi($id_saran)
	{	
		$data['skpd'] = $this->SaranModel->disposisi_saran();
		$data['id_saran'] = $id_saran;
		$data['saran'] = $this->SaranModel->detail_saran($id_saran);
		$this->load->view('humas/header')->view('humas/saran/disposisi', $data)->view('humas/footer');
	}

	public function disposisikan($id_saran)
	{
		$id_skpd = $this->input->post('id_skpd');
		$topik = $this->input->post('topik');
		//$nama = $this->SaranModel->skpd($id_skpd); //belum bisa
		$date = date_create();
		$tanggal =  date_format($date, 'Y-m-d H:i:s');
		$isStatus = 'disposisi';
		$data = array (
			'topik' => $topik,
			'isStatus' => $isStatus
			);
		$data_respon = array (
			'id_skpd' => $id_skpd,
			'id_saran' => $id_saran,
			);
		$this->SaranModel->disposisikan_saran($id_saran, $data);
		$this->SaranModel->addRespon($data_respon);
		redirect(base_url()."SaranController/detail/".$id_saran);
	}
	
	//isAktif untuk publish ke masyarakat
	public function publish($id_saran)
	{
		$data = array (
			'isStatus' => 'publish',
			'isAktif' => 1,
			);
		$this->SaranModel->publish_saran($id_saran, $data);
		redirect(base_url()."SaranController/detail/".$id_saran);
	}
}
