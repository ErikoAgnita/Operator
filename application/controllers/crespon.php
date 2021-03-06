<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class crespon extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('mrespon');
		$this->load->model('msaran');
        	$this->load->library(array('form_validation', 'session'));
	}

	public function dariadmin($all)
	{
		$this->load->library('pagination');
        $config = array();
        $config['base_url'] = base_url() . "crespon/dariadmin/".$this->uri->segment(3);
        
        $userid_skpd = $_SESSION['userid_skpd'];
        if($all=='all'){
        	$total_row = $this->mrespon->record_count();
        }
        elseif($all=='skpd'){
        	$total_row = $this->mrespon->record_count_skpd($userid_skpd);
        }
        elseif($all=='belum'){
            $total_row = $this->mrespon->record_count_unrespon($userid_skpd);
        }
                
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
        if($all=='all'){
        	$data['saran'] = $this->mrespon->fetch_data($config['per_page'],$strpage)->result();
        }        
        elseif($all=='skpd'){
        	$data['saran'] = $this->mrespon->fetch_data_skpd($config['per_page'],$strpage, $userid_skpd)->result();
        }
        elseif($all=='belum'){
            $data['saran'] = $this->mrespon->fetch_data_unrespon($config['per_page'],$strpage, $userid_skpd)->result();
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
		$data['flag'] = FALSE;
		$data['id_saran'] = NULL;
		$this->load->view('dinas/header')->view('dinas/respon/respon', $data)->view('dinas/footer');
	}

	public function kirim_respon($id_respon)
	{
		$id_saran = $this->input->post('id_saran');
		$last=$id_respon;
		$random_number = substr(number_format(time() * rand(),0,'',''),0,4);
        if($last==0){
            $nm = 0;
            $nmfile = $nm.$random_number;
        }
        else{
            $nmfile = $last.$random_number;
        }
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
                $data=array(
                	'kategori' => $this->input->post('kategori'),
                    'isi_respon' => $this->input->post('isi_respon'),
                    'tanggal_respon' => $tglapor,
                    'lampiran_respon'=>$gbr['file_name'],
		    );

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
            $data=array(
                'kategori' => $this->input->post('kategori'),
                'isi_respon' => $this->input->post('isi_respon'),
                'tanggal_respon' => $tglapor,
		);

            $data_saran = array(
            	'isStatus' => 'respon baru',
            	);

            $this->mrespon->kirim_respon($id_respon, $data);
            $this->mrespon->respon_saran($id_saran, $data_saran);
            redirect (base_url().'crespon/respon/'.$id_saran);
        }
	}

	public function addRespon()
	{
        $id_saran = $this->input->post('id_saran');

        $this->load->library('form_validation');
        $this->load->library('session');
        $this->form_validation->set_rules('isi_respon', 'Isi', 'required');
        
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        

        if ($this->form_validation->run() == FALSE){
            $this->respon($id_saran);
        }        
        else{
            $userid_skpd = $_SESSION['userid_skpd'];
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
                }
            }
            $config = array(
                'upload_path' => "./uploads/respon",
                'allowed_types' => "gif|jpg|png|jpeg|bmp",
                'overwrite' => TRUE,
                'max_size' => "2048000",
                'file_name'=> $nmfile);
            
            $this->load->library('upload');
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if($_FILES['image']['name']){
                if($this->upload->do_upload('image')){

                    $gbr= $this->upload->data();
                    $date = date_create();
                    $tglapor =  date_format($date, 'Y-m-d H:i:s');
                    $data=array(
                        'id_saran' => $id_saran,
                        'id_skpd' => $userid_skpd,
                        'kategori' => $this->input->post('kategori'),
                        'isi_respon' => $this->input->post('isi_respon'),
                        'tanggal_respon' => $tglapor,
                        'lampiran_respon' => $gbr['file_name'],
                        'tanggal_disposisi' => $this->input->post('tanggal_disposisi'),
			);

                    $data_saran = array(
                        'isStatus' => 'respon baru',
                        );
                      
                    $this->mrespon->addRespon($data);
                    $this->mrespon->respon_saran($id_saran, $data_saran);
                    redirect (base_url().'crespon/respon/'.$id_saran);
                }
            }
            else{
                $gbr= $this->upload->data();
                $date = date_create();
                $tglapor =  date_format($date, 'Y-m-d H:i:s');
                $data=array(
                    'id_saran' => $id_saran,
                    'id_skpd' => $userid_skpd,
                    'kategori' => $this->input->post('kategori'),
                    'isi_respon' => $this->input->post('isi_respon'),
                    'tanggal_respon' => $tglapor,
                    'tanggal_disposisi'=> $this->input->post('tanggal_disposisi'),
		    );

                $data_saran = array(
                    'isStatus' => 'respon baru',
                    );

                $this->mrespon->addRespon($data);
                $this->mrespon->respon_saran($id_saran, $data_saran);
                redirect (base_url().'crespon/respon/'.$id_saran);
            }
        }
		
	}

	public function publish($id_respon)
	{
		$id_saran = $this->input->post('id_saran');
		if($this->input->post('btn2')=="Publish"){
			$data = array (
				'isAktif' => 1,
				);
			$this->mrespon->publish($id_respon, $data);
			$this->session->set_flashdata("pesansaran","<div class=\"alert alert-success\" id=\"alert\">Respon berhasil dipublish<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");		
	                redirect(base_url().'csaran/detail/'.$id_saran);
		}
		elseif($this->input->post('btn2')=="Unpublish"){
			$data = array (
				'isAktif' => 0,
				);

			$this->mrespon->publish($id_respon, $data);
			$this->session->set_flashdata("pesansaran","<div class=\"alert alert-success\" id=\"alert\">Respon berhasil di-unpublish<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");		
	                redirect(base_url().'csaran/detail/'.$id_saran);
		}
		elseif($this->input->post('btn2')=="hapus"){
			$this->mrespon->hapus_respon($id_respon);
			$this->session->set_flashdata("pesansaran","<div class=\"alert alert-success\" id=\"alert\">Respon berhasil dihapus<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");		
	                redirect(base_url().'csaran/detail/'.$id_saran);
		}
        elseif($this->input->post('btn2')=="ubah"){
            //$this->ubah($id_respon, $id_saran);
            redirect(base_url().'crespon/ubah/'.$id_respon);
        }	
}
	public function ubah($id_respon)
    {
        $data['respon'] = $this->mrespon->getRespon($id_respon);
        $idSaran = $this->mrespon->getId($id_respon);
        foreach($idSaran as $row)
        {
            $id_saran = $row->id_saran;
            $data['saran'] = $this->msaran->getSaran($id_saran);
        }        
        $this->load->view('humas/header');
        $this->load->view('humas/saran/ubahrespon', $data);
        $this->load->view('humas/footer');
    }

    public function ubah_respon($id_respon)
    {
        $id_saran = $this->input->post('id_saran');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('isi_respon', 'Respon', 'trim|min_length[1]|required|regex_match[/^[a-zA-Z0-9  &_.~,!"\/@%()+=?-]{1,}$/]');
        
        $this->form_validation->set_message('required', '{field} tidak boleh kosong.');
        $this->form_validation->set_message('min_length', '{field} minimal {param} karakter.');
        $this->form_validation->set_message('regex_match', '{field} tidak sesuai format penulisan yang benar');
            
        if ($this->form_validation->run() == FALSE){
            $this->ubah($id_respon);
        }else{
            $isi_respon = $this->input->post('isi_respon');
            $data = array (
                'isi_respon' => $isi_respon,
                );
            $this->mrespon->ubah_respon($id_respon, $data);
	    $this->session->set_flashdata("pesansaran","<div class=\"alert alert-success\" id=\"alert\">Berhasil mengubah isi respon<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
            redirect(base_url()."csaran/detail/".$id_saran);
        }
    }

	public function tes()
	{
		$this->load->view('dinas/respon/balas');
	}
}