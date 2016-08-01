<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->helper(array('url','form','captcha'));
        $this->load->model('msaran');
        $this->load->helper('security');
        }
        public function index()
        {
            $data['aspirasi'] = $this->msaran->preview_asp();
            
            $random_number = substr(number_format(time() * rand(),0,'',''),0,6);
              // setting up captcha config
            $vals = array(
                     'word' => $random_number,
                     'img_path' => './captcha/',
                     'img_url' => base_url().'captcha/',
                     'img_width' => 140,
                     'img_height' => 35,
                     'expiration' => 7200
                    );
            $data['captcha'] = create_captcha($vals);
            $this->session->set_userdata('captchaWord',$data['captcha']['word']);
            
            $this->load->view('header1');
            $this->load->view('aspirasi', $data);
            $this->load->view('footer');
        }
    public function dadda(){
        $d= "selamat pagi. kepada bapak gubernur ganjar pranowo yang saya hormati. saya wahab warga desa ngemplik wetan karanganyar demak. lapor di desa saya ada w..";
        echo strlen($d);
    }
        public function aspirasi()
        {
            $this->load->library('pagination');
            $config = array();
            $config['base_url'] = base_url() . "welcome/aspirasi";
            $total_row = $this->msaran->record_count();
            //echo $total_row;
            $config['total_rows'] = $total_row;
            $config['per_page'] = 4;
            $config['cur_tag_open'] = '<a class="current" style="color:#fff; background-color:#358fe4; font-weight: bold;">';
            $config['cur_tag_close'] = '</a>';
            $config['prev_link'] = '<i class="fa fa-caret-left"></i>';
            $config['next_link'] = '<i class="fa fa-caret-right"></i>';
            $config['last_link'] = '<i class="fa fa-forward"></i>';
            $config['first_link'] = '<i class="fa fa-backward"></i>';
            $config['uri_segment'] = 3;
        
            $this->pagination->initialize($config);
            $strpage = $this->uri->segment(3,0);
            $data['aspirasi'] = $this->msaran->fetch_data($config['per_page'],$strpage)->result();
            
            $data['balasan'] = $this->msaran->balasan();
            $data['links'] = $this->pagination->create_links();
            
            $this->load->view('header2');
            $this->load->view('laporan',$data);
            $this->load->view('footer');
        }
       
        public function add_saran(){
            $this->load->library('form_validation');
            
            $this->load->model('msaran');
            
            $last=$this->msaran->ambil_id();
            //var_dump($last);
            
            $this->load->library('upload');
            
            $this->form_validation->set_rules('nama','Nama','trim|min_length[4]|max_length[50]|regex_match[/^[a-zA-Z .]{2,100}$/]');
            $this->form_validation->set_rules('almt','Alamat','trim|min_length[1]|max_length[255]|required|xss_clean|regex_match[/^[a-zA-Z0-9  _.,\/@()-]{1,}$/]');
            $this->form_validation->set_rules('telp','Telepon','trim|required|xss_clean|min_length[4]|max_length[20]|regex_match[/^[+0-9 ()-]{4,20}$/]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('aspr','Saran','trim|min_length[1]|required|xss_clean|regex_match[/^[a-zA-Z0-9  &_.~,!"\/@%()+=?-]{1,}$/]');
            $this->form_validation->set_rules('userCaptcha', 'Captcha', 'required|callback_check_captcha');
            $userCaptcha = $this->input->post('userCaptcha');
            
            $this->form_validation->set_message('min_length', '{field} minimal {param} karakter.');
            $this->form_validation->set_message('max_length', '{field} maksimal {param} karakter.');
            $this->form_validation->set_message('regex_match', '{field} tidak sesuai format penulisan yang benar');
            
            if ($this->form_validation->run() == FALSE){
                $this->index();
            }else{
                    $random_number = substr(number_format(time() * rand(),0,'',''),0,4);
                    if($last==0){
                        $nm = 0;
                        $nmfile = $nm.$random_number;
                    }
                    else{
                        foreach ($last as $l ){
                        $nm = $l->id_saran;
                        $nmfile = $nm.$random_number;
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
                    $ip = $_SERVER['SERVER_ADDR'];
                    $hostname = gethostbyNAME($ip);
                    
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
                                        'ip' => $ip,
                                        'host' => $hostname,
                                        'lampiran_saran'=>$gbr['file_name']);
                          //  var_dump($data);
                        $this->msaran->kirim_saran($data);
                        $this->session->set_flashdata("pesan","<div class=\"alert alert-success\" id=\"alert\">Pesan anda sudah kami simpan, tunggu tindak lanjut dari kami<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
                        redirect(base_url());
                        }
                    }
                    else{
                        $date = date_create();
                        $tglapor =  date_format($date, 'Y-m-d H:i:s');
                        $data=array('nama' => $this->input->post('nama'),
                                    'alamat' => $this->input->post('almt'),
                                    'telepon' => $this->input->post('telp'),
                                    'email' => $this->input->post('email'),
                                    'saran' => $this->input->post('aspr'),
                                    'ip' => $ip,
                                    'host' => $hostname,
                                    'tanggal_saran' => $tglapor);
                        $this->msaran->kirim_saran($data);
                        $this->session->set_flashdata("pesan","<div class=\"alert alert-success\" id=\"alert\">Pesan anda sudah kami simpan, tunggu tindak lanjut dari kami<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
                        redirect(base_url());
                    }
                
            }
        }
    public function check_captcha($str){
        $word = $this->session->userdata('captchaWord');
        if(strcmp(strtoupper($str),strtoupper($word)) == 0){
          return true;
        }
        else{
          $this->form_validation->set_message('check_captcha', 'Kode keamanan tidak sesuai!');
          return false;
        }
    }
    
}
