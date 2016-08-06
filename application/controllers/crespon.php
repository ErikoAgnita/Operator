<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class crespon extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('mrespon');
	}

	public function dariadmin($all)
	{
		$this->load->library('pagination');
        $config = array();
        $config['base_url'] = base_url() . "crespon/dariadmin";
        
        $userid_skpd = $_SESSION['userid_skpd'];
        if($all==1){
        	$total_row = $this->mrespon->record_count();
        }
        elseif($all==2){
        	$total_row = $this->mrespon->record_count_skpd($userid_skpd);
        }
        
        //echo $total_row;
        $config['base_url'] = site_url('crespon/dariadmin/'.$all.'/');
        $config['total_rows'] = $total_row;
        $config['per_page'] = 7;
        $config['cur_tag_open'] = '<a class="current" style="color:#fff; background-color:#358fe4; font-weight: bold;">';
        $config['cur_tag_close'] = '</a>';
        $config['prev_link'] = '<i class="icon wb-chevron-left"></i>';
        $config['next_link'] = '<i class="icon wb-chevron-right"></i>';
        $config['last_link'] = '<b>>></b>';
        $config['first_link'] = '<b><<</b>';
        $config['uri_segment'] = 4;
    
        $this->pagination->initialize($config);
        $strpage = $this->uri->segment(4,0);
        if($all==1){
        	$data['saran'] = $this->mrespon->fetch_data($config['per_page'],$strpage)->result();
        }        
        elseif($all==2){
        	$data['saran'] = $this->mrespon->fetch_data_skpd($config['per_page'],$strpage, $userid_skpd)->result();
        }
        
        $data['links'] = $this->pagination->create_links();

        //echo $total_row;
        $config['total_rows'] = $total_row;
        $config['per_page'] = 7;

		//$data['saran'] = $this->mrespon->lihat_saran();
		$this->load->view('dinas/header')->view('dinas/respon/dariadmin', $data)->view('dinas/footer');
	}

	public function respon($id_saran)
	{
		$userid_skpd = $_SESSION['userid_skpd'];
		$data['saran'] = $this->mrespon->saran($id_saran);
		if($data['saran']){
			$data['respon'] = $this->mrespon->respon($id_saran, $userid_skpd);
		}		
		$data['Idskpd'] = $userid_skpd;
		$data['flag'] = 0;
		$data['id_saran'] = NULL;
		$this->load->view('dinas/header')->view('dinas/respon/respon', $data)->view('dinas/footer');
	}

	public function kirim_respon($id_respon)
	{
		$id_saran = $this->input->post('id_saran');
		$last=$this->mrespon->ambil_id();
		$random_number = substr(number_format(time() * rand(),0,'',''),0,4);
        if($last==0){
            $nm = 0;
            $nmfile = $nm.$random_number;
        }
        else{
            foreach ($last as $l ){
            $nm = $l->id_respon;
            $nmfile = $nm.$random_number;
        }}
        $config = array(
	        'upload_path' => "./uploads/respon",
	        'allowed_types' => "gif|jpg|png|jpeg|bmp",
	        'overwrite' => TRUE,
	        'max_size' => "2048000",
	        'file_name'=> $nmfile
        );
        
		$this->load->library('upload');
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if($_FILES['image']['name']){
            if($this->upload->do_upload('image')){

                $gbr= $this->upload->data();
                $date = date_create();
                $tglapor =  date_format($date, 'Y-m-d H:i:s');
                $data=array('kategori' => $this->input->post('kategori'),
                            'isi_respon' => $this->input->post('isi_respon'),
                            'tanggal_respon' => $tglapor,
                            'lampiran_respon'=>$gbr['file_name']);

                $data_saran = array(
                	'isStatus' => 'respon baru',
                	);
	              
	            $this->mrespon->kirim_respon($id_respon, $data);
	            $this->mrespon->respon_saran($id_saran, $data_saran);
	            redirect (base_url().'crespon/respon/'.$id_saran);
            }
        }
        else{
           	$gbr= $this->upload->data();
            $date = date_create();
            $tglapor =  date_format($date, 'Y-m-d H:i:s');
            $data=array('kategori' => $this->input->post('kategori'),
                        'isi_respon' => $this->input->post('isi_respon'),
                        'tanggal_respon' => $tglapor,);

            $data_saran = array(
            	'isStatus' => 'respon baru',
            	);

            $this->mrespon->kirim_respon($id_respon, $data);
            $this->mrespon->respon_saran($id_saran, $data_saran);
            redirect (base_url().'crespon/respon/'.$id_saran);
        }
	}

	public function kirim_respon2($id_respon)
	{
		$userid_skpd = $_SESSION['userid_skpd'];
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
		$this->mrespon->kirim_respon($id_respon, $data);
		
		$data_saran = array(
			'isStatus' => 'respon baru',
		);
		
		$this->mrespon->respon_saran($id_saran, $data_saran);
		redirect (base_url().'crespon/respon/'.$id_saran);
	}

	public function addRespon()
	{
		$userid_skpd = $_SESSION['userid_skpd'];
		$kategori = $this->input->post('kategori');
		$isi_respon = $this->input->post('isi_respon');
		$lampiran_respon = $this->input->post('lampiran_respon');
		$date = date_create();
		$tanggal_respon = date_format($date, 'Y-m-d H:i:s');
		$id_saran = $this->input->post('id_saran');

		$data = array(
			'id_skpd' => $userid_skpd,
			'id_saran' => $id_saran,
			'kategori' => $kategori,
			'isi_respon' => $isi_respon,
			'lampiran_respon' => $lampiran_respon,
			'tanggal_respon' => $tanggal_respon,
			);
		$this->mrespon->addRespon($data);

		$data_saran = array(
			'isStatus' => 'respon baru',
		);		
		$this->mrespon->respon_saran($id_saran, $data_saran);
		redirect (base_url().'crespon/respon/'.$id_saran);
	}

	public function publish($id_respon)
	{
		$id_saran = $this->input->post('id_saran');
		if($this->input->post('btn2')=="Publish"){
			$data = array (
				'isAktif' => 1,
				);
			$this->mrespon->publish($id_respon, $data);
		}
		else{
			$data = array (
				'isAktif' => 0,
				);

			$this->mrespon->publish($id_respon, $data);
		}
		if($this->input->post('btn2')=="hapus"){
			$this->mrespon->hapus_respon($id_respon);
		}
		redirect(base_url().'SaranController/detail/'.$id_saran);
	}

	public function tes()
	{
		$this->load->view('dinas/respon/balas');
	}
}