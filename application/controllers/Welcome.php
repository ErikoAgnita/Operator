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
            $this->load->library('pagination');
            //$data['aspirasi'] = $this->msaran->list_saran();
            
            $config = array();
            $config['base_url'] = base_url() . "welcome/aspirasi";
            $total_row = $this->msaran->record_count();
            //echo $total_row;
            $config['total_rows'] = $total_row;
            $config['per_page'] = 8;
            $config['use_page_numbers'] = TRUE;
            $config['num_links'] = $total_row;
            $config['cur_tag_open'] = '&nbsp;<a class="current">';
            $config['cur_tag_close'] = '</a>';
            $config['next_link'] = 'Next';
            $config['prev_link'] = 'Previous';
            $config['uri_segment'] = 3;
            $choice = $config["total_rows"] / $config["per_page"];
            $config["num_links"] = round($choice);
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            if($page != 0)
                $strpage = ($page-1) * $config['per_page'];
            else   $strpage = 0;
            $data['aspirasi'] = $this->msaran->fetch_data($config['per_page'],$strpage);
            $str_links = $this->pagination->create_links();
            $data['links'] = explode('&nbsp;',$str_links );
            
            $this->load->view('header2');
            $this->load->view('laporan',$data);
            $this->load->view('footer');
        }
    
        public function add_saran(){
            
            $this->load->model('msaran');
            $last=$this->msaran->ambil_id();
            //var_dump($last);
            $this->load->helper('security');
            $this->load->library('upload');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('telp','Contact_no','trim|required|min_length[9]|max_length[15]|regex_match[/^[0123456789+]{9,15}$/]');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if ($this->form_validation->run() == FALSE){
                $this->form_validation->set_message('Incorrect Number type.');
                $this->index();
                //echo "sdaasd";
            }
            
            if($last==0){
                $nmfile = 0;}
            else{
                foreach ($last as $l ){
                $nmfile = $l->id_saran;
            }}  
            $config = array(
            'upload_path' => "./uploads/",
            'allowed_types' => "gif|jpg|png|jpeg|bmp",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            //'max_height' => "3000",
            //'max_width' => "3000",
            'file_name'=> $nmfile
            );
            $hostname = gethostbyNAME($_SERVER['SERVER_ADDR']);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if($_FILES['image']['name']){
                if($this->upload->do_upload('image')){
                    
                    $gbr= $this->upload->data();
					$date = date_create();
                    $tglapor =  date_format($date, 'Y-m-d H:i:s');
                    $data=array('nama' => $this->input->post('nama'),
                                'alamat' => $this->input->post('almt'),
                                'telepon' => $this->input->post('telp'),
                                'email' => $this->input->post('email'),
                                'saran' => $this->input->post('aspr'),
								'tanggal_saran' => $tglapor,
                                'ip' => $hostname,
                                'lampiran_saran'=>$gbr['file_name']);
                  //  var_dump($data);
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
                $date = date_create();
                $tglapor =  date_format($date, 'Y-m-d H:i:s');
                $data=array('nama' => $this->input->post('nama'),
                            'alamat' => $this->input->post('almt'),
                            'telepon' => $this->input->post('telp'),
                            'email' => $this->input->post('email'),
                            'saran' => $this->input->post('aspr'),
                            'ip' => $hostname,
                            'tanggal_saran' => $tglapor);
                $this->msaran->kirim_saran($data);
                redirect(site_url('../operator'));
            }
        }
    
}
