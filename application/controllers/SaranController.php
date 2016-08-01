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
		$this->load->library('pagination');
        $config = array();
        $config['base_url'] = base_url() . "SaranController/lihat";
        $total_row = $this->SaranModel->record_count();
        //echo $total_row;
        $config['total_rows'] = $total_row;
        $config['per_page'] = 2;
        $config['cur_tag_open'] = '<a class="current" style="color:#fff; background-color:#358fe4; font-weight: bold;">';
        $config['cur_tag_close'] = '</a>';
        $config['prev_link'] = '<i class="fa fa-caret-left"></i>';
        $config['next_link'] = '<i class="fa fa-caret-right"></i>';
        $config['last_link'] = '<i class="fa fa-forward"></i>';
        $config['first_link'] = '<i class="fa fa-backward"></i>';
        $config['uri_segment'] = 3;
    
        $this->pagination->initialize($config);
        $strpage = $this->uri->segment(3,0);
        $data['saran'] = $this->SaranModel->fetch_data($config['per_page'],$strpage)->result();
        
        $data['links'] = $this->pagination->create_links();

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
	//isAktif => 1 -> saran bukan spam, dapat dilihat oleh skpd dan masyarakat sekaligus disposisi
	public function disposisi($id_saran)
	{	
		$data['skpd'] = $this->SaranModel->disposisi_saran();
		$data['id_saran'] = $id_saran;
		$data['saran'] = $this->SaranModel->detail_saran($id_saran);
		$this->load->view('humas/header')->view('humas/saran/disposisi', $data)->view('humas/footer');
	}

	public function disposisikan($id_saran)
	{
		$id_skpd_list = $this->input->post('id_skpd');
		$topik = $this->input->post('topik');
		//$nama = $this->SaranModel->skpd($id_skpd); //belum bisa
		$date = date_create();
		$tanggal =  date_format($date, 'Y-m-d H:i:s');
		$isStatus = 'disposisi';
		$data = array (
			'topik' => $topik,
			'isStatus' => $isStatus,
			'isAktif' => 1,
			);		
		$this->SaranModel->disposisikan_saran($id_saran, $data);
		foreach($id_skpd_list as $id_skpd) {
			$data_respon = array(
				'id_skpd' => $id_skpd,
				'id_saran' => $id_saran,
				);
			$this->SaranModel->addRespon($data_respon);	
		}
		redirect(base_url()."SaranController/detail/".$id_saran);
	}


    public function dropdown($id_saran)
    {
    	$data['skpd'] = $this->SaranModel->disposisi_saran();
		$data['id_saran'] = $id_saran;
		$data['saran'] = $this->SaranModel->detail_saran($id_saran);
        $this->load->view('humas/saran/dw_clist', $data);
    }

	public function nonAktif($id_saran)
	{
		$data = array (
			'isAktif' => 0,
			);
		$this->SaranModel->publish_saran($id_saran, $data);
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
