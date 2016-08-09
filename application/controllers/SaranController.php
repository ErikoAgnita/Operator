<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SaranController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('msaran');
        $this->load->library('form_validation');

	}
	
	

	


	

	public function ubah($id_saran)
	{
		$data['saran'] = $this->msaran->ubah_saran($id_saran);
		$this->load->view('humas/header')->view('humas/saran/ubah', $data)->view('humas/footer');
	}

	public function update($id_saran)
	{
		$RESPON_HUMAS=$this->input->post('respon_humas');
		
		$data = array(
            'RESPON_HUMAS' => $RESPON_HUMAS,
            );

        $this->msaran->update_saran($id_saran, $data);

        redirect(base_url()."SaranController/detail/".$id_saran);
	}

	public function hapus($id_saran)
	{
		$this->msaran->hapus_saran($id_saran);
        redirect(base_url()."SaranController/lihat");
	}

	//coba: untuk disposisi ke banyak skpd scr sekaligus
	//bisa klik tambah skpd atau centang mungkin????
	//isAktif => 1 -> saran bukan spam, dapat dilihat oleh skpd dan masyarakat sekaligus disposisi
	
    public function coba()
    {	
    	$data['skpd'] = $this->msaran->getskpd();
    	$this->load->view('humas/header');
    	$this->load->view('humas/saran/coba', $data);
    	$this->load->view('humas/footer');
    }
}
