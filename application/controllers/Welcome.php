<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
      function __construct() {
        parent::__construct();
        $this->load->helper(array('url','form'));
        $this->load->model('msaran');
        }
        public function index()
        {
            $data['aspirasi'] = $this->msaran->preview_asp();
            $this->load->view('header1');
            $this->load->view('aspirasi', $data);
            $this->load->view('footer');
        }
        public function aspirasi()
        {
            $data['aspirasi'] = $this->msaran->list_saran();
            $this->load->view('header2');
            $this->load->view('laporan',$data);
            $this->load->view('footer');
        }
    
        public function add_saran(){
            
            $this->load->model('msaran');
            $last=$this->msaran->ambil_id();
            
            $this->load->library('upload');
            $this->load->library('form_validation');
            foreach ($last as $l ){
                $nmfile = $l->id_saran;
            }
            $config = array(
            'upload_path' => "./uploads/",
            'allowed_types' => "gif|jpg|png|jpeg|bmp",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "3000",
            'max_width' => "3000",
            'file_name'=> $nmfile
            );

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if($_FILES['image']['name']){
                if($this->upload->do_upload('image')){
                    
                    $gbr= $this->upload->data();
                    $status=0;
					$date = date_create();
                    $tglapor =  date_format($date, 'Y-m-d H:i:s');
                    $data=array('nama' => $this->input->post('nama'),
                                'alamat' => $this->input->post('almt'),
                                'telepon' => $this->input->post('telp'),
                                'email' => $this->input->post('email'),
                                'aspirasi' => $this->input->post('aspr'),
								'tanggal_lapor' => $tglapor,
                                'status_laporan' => $status,
                                'lampiran_aspirasi'=>$gbr['file_name']);
                    //var_dump($data);
                $this->msaran->kirim_saran($data);
                //$this->session->set_flashdata("pesan","<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Aspirasi anda sudah kami </div></div>");
                redirect(site_url('../operator'));
    //jika berhasil maka akan ditampilkan view vupload
                }/*
                else{
                    $this->session->set_flashdata("pesan","<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");*/
                    //redirect(site_url('../index.php/admin/form'));//jika gagal maka akan ditampilkan form upload
             /*   }  
            */}
            else{
                $status=0;
                $date = date_create();
                $tglapor =  date_format($date, 'Y-m-d H:i:s');
                $data=array('nama' => $this->input->post('nama'),
                            'alamat' => $this->input->post('almt'),
                            'telepon' => $this->input->post('telp'),
                            'email' => $this->input->post('email'),
                            'aspirasi' => $this->input->post('aspr'),
                            'tanggal_lapor' => $tglapor,
                            'status_laporan' => $status);
                $this->msaran->kirim_saran($data);
                redirect(site_url('../operator'));
            }
        }
    
}
