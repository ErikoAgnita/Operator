<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Csaran extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->helper(array('url','form','captcha'));
        $this->load->model('msaran');
        $this->load->helper('security');
        $this->load->library('fpdf');
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
    public function search(){
        
        $cari = $this->input->post('cari');
       // echo $cari;

        if (!empty($cari)) {
            $data['ringkasan'] = $this->input->post('cari');
            $this->session->set_userdata('sess_ringkasan', $data['ringkasan']);
        }
        else {
            $data['ringkasan'] = $this->session->userdata('sess_ringkasan');
        }

        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = base_url() . "csaran/search/";
        $total_row = $this->msaran->record_count_search($data['ringkasan']);
        //var_dump($total_row);
        $config['total_rows'] = $total_row;
        $config['per_page'] = 8;
        $config['cur_tag_open'] = '<a class="current" style="color:#fff; background-color:#358fe4; font-weight: bold;">';
        $config['cur_tag_close'] = '</a>';
        $config['prev_link'] = '<i class="fa fa-caret-left"></i>';
        $config['next_link'] = '<i class="fa fa-caret-right"></i>';
        $config['last_link'] = '<i class="fa fa-forward"></i>';
        $config['first_link'] = '<i class="fa fa-backward"></i>';
        $config['uri_segment'] = 3;
    
        $this->pagination->initialize($config);
        $strpage = $this->uri->segment(3,0);
        
        $data['aspirasi'] = $this->msaran->pencarian($data['ringkasan'],$config['per_page'],$strpage);
        $data['balasan'] = $this->msaran->balasan();
        $data['links'] = $this->pagination->create_links();
        
        if($data['aspirasi'] == NULL){
            $this->session->set_flashdata("pesancari","<div class=\"alert alert-warning\" id=\"alert\">Pencarian ".$cari." tidak ditemukan<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
            $this->aspirasi();
        }
        else{
            $this->session->set_flashdata("pesancari","<div class=\"alert alert-success\" id=\"alert\">Ada ".$total_row." hasil pencarian ".$data['ringkasan']."<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");   
            $this->load->view('header2');
            $this->load->view('laporan',$data);
            $this->load->view('footer');
        }
    }
        public function aspirasi()
        {
            $this->load->library('pagination');
            $config = array();
            $config['base_url'] = base_url() . "csaran/aspirasi";
            $total_row = $this->msaran->record_count();
            //echo $total_row;
            $config['total_rows'] = $total_row;
            $config['per_page'] = 8;
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
            
            $this->form_validation->set_rules('nama','Nama','trim|required|min_length[4]|max_length[50]|regex_match[/^[a-zA-Z .]{2,100}$/]');
            $this->form_validation->set_rules('almt','Alamat','trim|required|min_length[1]|max_length[255]|xss_clean|regex_match[/^[a-zA-Z0-9  _.,\/@()-]{1,}$/]');
            $this->form_validation->set_rules('telp','Telepon','trim|required|xss_clean|min_length[4]|max_length[20]|regex_match[/^[+0-9 ()-]{4,20}$/]');
            $this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
            $this->form_validation->set_rules('aspr','Saran','trim|min_length[1]|required|xss_clean|regex_match[/^[^#*;:$\<>]{1,}$/]');
            $this->form_validation->set_rules('userCaptcha', 'Kode Keamanan', 'required|callback_check_captcha');
            $userCaptcha = $this->input->post('userCaptcha');
            
            $this->form_validation->set_message('min_length', '{field} minimal {param} karakter.');
            $this->form_validation->set_message('max_length', '{field} maksimal {param} karakter.');
            $this->form_validation->set_message('regex_match', '{field} tidak sesuai format penulisan yang benar');
            $this->form_validation->set_message('valid_email', '{field} tidak sesuai format penulisan yang benar');
            $this->form_validation->set_message('required', '{field} tidak boleh kosong');

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
                    'upload_path' => "./uploads/saran",
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
    public function cetak($ctk){
        $this->load->model('msaran');
        $res['data'] = $this->msaran->detail_saran($ctk);
        $this->load->view('humas/saran/saran_pdf',$res);
    }


    //Admin
    public function lihat()
    {   
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = base_url() . "csaran/lihat";

        $total_row = $this->msaran->record_count_saran();

        //echo $total_row;
        $config['total_rows'] = $total_row;
        $config['per_page'] = 7;
        $config['cur_tag_open'] = '<a class="current" style="color:#fff; background-color:#358fe4; font-weight: bold;">';
        $config['cur_tag_close'] = '</a>';
        $config['prev_link'] = '<i class="icon wb-chevron-left"></i>';
        $config['next_link'] = '<i class="icon wb-chevron-right"></i>';
        $config['last_link'] = '<b>>></b>';
        $config['first_link'] = '<b><<</b>';
        $config['uri_segment'] = 3;
    
        $this->pagination->initialize($config);
        $strpage = $this->uri->segment(3,0);
        $data['saran'] = $this->msaran->fetch_data_saran($config['per_page'],$strpage)->result();
	$data['respon'] = $this->msaran->fetch_data_balasan();
        $data['balasan'] = $this->msaran->fetch_data_dibalas();
        
        $data['links'] = $this->pagination->create_links();

        //$data['saran'] = $this->msaran->lihat_saran();
        $this->load->view('humas/header')->view('humas/saran/lihat', $data)->view('humas/footer');
        
    }

    public function search_saran(){     
        $cari = $this->input->post('cari');
        $this->load->library('pagination');
        if (!empty($cari)) {
            $data['ringkasan'] = $this->input->post('cari');
            $this->session->set_userdata('sess_ringkasan', $data['ringkasan']);
        }
        else {
            $data['ringkasan'] = $this->session->userdata('sess_ringkasan');
        }
            
        $config = array();
        $config['base_url'] = base_url() . "csaran/search_saran";
        $total_row = $this->msaran->record_count_search_saran($data['ringkasan']);
        //var_dump($total_row);
        $config['total_rows'] = $total_row;
        $config['per_page'] = 7;
        $config['cur_tag_open'] = '<a class="current" style="color:#fff; background-color:#358fe4; font-weight: bold;">';
        $config['cur_tag_close'] = '</a>';
        $config['prev_link'] = '<i class="icon wb-chevron-left"></i>';
        $config['next_link'] = '<i class="icon wb-chevron-right"></i>';
        $config['last_link'] = '<b>>></b>';
        $config['first_link'] = '<b><<</b>';
        $config['uri_segment'] = 3;
    
        $this->pagination->initialize($config);
        $strpage = $this->uri->segment(3,0);
        
        $data['saran'] = $this->msaran->pencarian_saran($data['ringkasan'],$config['per_page'],$strpage);
        $data['links'] = $this->pagination->create_links();
        
        if($data['saran'] == NULL){
            $this->session->set_flashdata("pesancari","<div class=\"alert alert-warning\" id=\"alert\">Pencarian ".$cari." tidak ditemukan<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
            $this->lihat();
        }
        else{
            $this->session->set_flashdata("pesancari","<div class=\"alert alert-success\" id=\"alert\">Ada ".$total_row." hasil pencarian ".$data['ringkasan']."<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
            $this->load->view('humas/header');
            $this->load->view('humas/saran/lihat',$data);
            $this->load->view('humas/footer');
        }

        
    }

    public function search_saranop(){     
        $cari = $this->input->post('cari');       
        $this->load->library('pagination');
        if (!empty($cari)) {
            $data['ringkasan'] = $this->input->post('cari');
            $this->session->set_userdata('sess_ringkasan', $data['ringkasan']);
        }
        else {
            $data['ringkasan'] = $this->session->userdata('sess_ringkasan');
        }
        
        $config = array();
        $config['base_url'] = base_url() . "csaran/search_saranop";
        $total_row = $this->msaran->record_count_searchop($data['ringkasan']);
        //var_dump($total_row);
        $config['total_rows'] = $total_row;
        $config['per_page'] = 7;
        $config['cur_tag_open'] = '<a class="current" style="color:#fff; background-color:#358fe4; font-weight: bold;">';
        $config['cur_tag_close'] = '</a>';
        $config['prev_link'] = '<i class="icon wb-chevron-left"></i>';
        $config['next_link'] = '<i class="icon wb-chevron-right"></i>';
        $config['last_link'] = '<b>>></b>';
        $config['first_link'] = '<b><<</b>';
        $config['uri_segment'] = 3;
    
        $this->pagination->initialize($config);
        $strpage = $this->uri->segment(3,0);
       
        $data['saran'] = $this->msaran->pencarianop($data['ringkasan'],$config['per_page'],$strpage);
        $data['links'] = $this->pagination->create_links();
        
        if($data['saran'] == NULL){
            $this->session->set_flashdata("pesancari","<div class=\"alert alert-warning\" id=\"alert\">Pencarian ".$cari." tidak ditemukan<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
            redirect(base_url()."crespon/dariadmin/all");
        }
        else{   
            $this->session->set_flashdata("pesancari","<div class=\"alert alert-success\" id=\"alert\">Ada ".$total_row." hasil pencarian ".$data['ringkasan']."<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
            $this->load->view('dinas/header');
            $this->load->view('dinas/respon/dariadmin',$data);
            $this->load->view('dinas/footer');
        }
    }

    public function detail($id_saran)
    {
        $data['saran'] = $this->msaran->detail_saran($id_saran);
        $data['respon'] = $this->msaran->respon($id_saran);
        $this->load->view('humas/header')->view('humas/saran/detail', $data)->view('humas/footer');
    }

    public function hapus($id_saran)
    {
        $this->msaran->hapus_saran($id_saran);
        redirect(base_url()."csaran/lihat");
    }

    public function disposisi($id_saran)
    {
        if($this->input->post('btn')=="Bukan Spam"){
            $data = array (
                'isSpam' => 0,
                );      
            $this->msaran->publish_saran($id_saran, $data);
	    $this->session->set_flashdata("pesansaran","<div class=\"alert alert-success\" id=\"alert\">Saran bukan spam.<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");		
            redirect(base_url()."csaran/detail/".$id_saran);
        }
        elseif($this->input->post('btn')=="Spam"){
            $data = array (
                'isSpam' => 1,
                );      
            $this->msaran->publish_saran($id_saran, $data);
	    $this->session->set_flashdata("pesansaran","<div class=\"alert alert-success\" id=\"alert\">Saran spam. Tidak dipublikasikan<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");		

            redirect(base_url()."csaran/detail/".$id_saran);
        }
        elseif($this->input->post('btn')=="Aktif"){
            $data = array (
                'isAktif' => 1,
                );      
            $this->msaran->aktif_saran($id_saran, $data);
	    $this->session->set_flashdata("pesansaran","<div class=\"alert alert-success\" id=\"alert\">Saran aktif<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");		
            redirect(base_url()."csaran/detail/".$id_saran);
        }
        elseif($this->input->post('btn')=="Non-Aktif"){
            $data = array (
                'isAktif' => 0,
                );      
            $this->msaran->aktif_saran($id_saran, $data);
	    $this->session->set_flashdata("pesansaran","<div class=\"alert alert-success\" id=\"alert\">Saran non-aktif. Tidak dipublikasikan<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");		
            redirect(base_url()."csaran/detail/".$id_saran);
        }
        elseif($this->input->post('btn')=="hapus"){ 
            $this->msaran->hapus_saran($id_saran);
            redirect(base_url()."csaran/lihat/");
        }
        elseif($this->input->post('btn')=="edit"){
            redirect(base_url()."csaran/ubah/".$id_saran);
        }
        else{
            $data = array (
                'isSpam' => 0,
                );
            $this->msaran->publish_saran($id_saran, $data);
            $data['skpd'] = $this->msaran->getskpd();
            $data['id_saran'] = $id_saran;
            $data['saran'] = $this->msaran->detail_saran($id_saran);    
            $this->load->view('humas/header')->view('humas/saran/disposisi', $data)->view('humas/footer');
        }  
    }

    public function ubah($id_saran)
    {
        $data['saran'] = $this->msaran->getSaran($id_saran);
        $this->load->view('humas/header');
        $this->load->view('humas/saran/ubah', $data);
        $this->load->view('humas/footer');
    }

    public function ubah_saran($id_saran)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('saran', 'Saran', 'trim|min_length[1]|required|xss_clean|regex_match[/^[a-zA-Z0-9  &_.~,!"\/@%()+=?-]{1,}$/]');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong.');
        $this->form_validation->set_message('min_length', '{field} minimal {param} karakter.');
        $this->form_validation->set_message('regex_match', '{field} tidak sesuai format penulisan yang benar');
            
        if ($this->form_validation->run() == FALSE){
            $this->ubah($id_saran);
        }else{
            $saran = $this->input->post('saran');
            $data = array (
                'saran' => $saran,
                );
            $this->msaran->ubah_saran($id_saran, $data);
	    $this->session->set_flashdata("pesansaran","<div class=\"alert alert-success\" id=\"alert\">Berhasil mengubah isi saran<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
            redirect(base_url()."csaran/detail/".$id_saran);
        }
    }

    public function disposisikan($id_saran)
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('topik','Topik','trim|required|min_length[1]|max_length[255]|xss_clean|regex_match[/^[a-zA-Z0-9  _.,\/@()-]{1,}$/]');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong.');
        $this->form_validation->set_message('min_length', '{field} minimal {param} karakter.');
        $this->form_validation->set_message('max_length', '{field} maksimal {param} karakter.');
        $this->form_validation->set_message('regex_match', '{field} tidak sesuai format penulisan yang benar');

        if ($this->form_validation->run() == FALSE){
            $this->disposisi($id_saran);
        }
        else{
            $id_skpd_list = $this->input->post('id_skpd');
            $topik = $this->input->post('topik');
            $keterangan = $this->input->post('keterangan');
            $date = date_create();
            $tglapor =  date_format($date, 'Y-m-d H:i:s');
            $isStatus = 'disposisi';
            //update saran
            $data = array (
                'topik' => $topik,
                'isStatus' => $isStatus,
                'keterangan' => $keterangan,
                );      
            $this->msaran->disposisikan_saran($id_saran, $data);
            $flag;
            //membuat respon
            if($id_skpd_list){
                foreach($id_skpd_list as $id_skpd) {
                    $data_respon = array(
                        'id_skpd' => $id_skpd,
                        'id_saran' => $id_saran,
                        'tanggal_disposisi' => $tglapor,
                        );
                    //work here
                    $sudah_disposisi = $this->msaran->cekDisposisi($id_saran, $id_skpd);
                    if(!$sudah_disposisi->result()){
                        $this->msaran->addRespon($data_respon);
                    }
                }
            }
	    $this->session->set_flashdata("pesansaran","<div class=\"alert alert-success\" id=\"alert\">Saran berhasil didisposisikan<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");     
            redirect(base_url()."csaran/detail/".$id_saran);
        }
    }

    public function respon()
    {
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = base_url() . "csaran/respon";

        $total_row = $this->msaran->record_count_respon();

        //echo $total_row;
        $config['total_rows'] = $total_row;
        $config['per_page'] = 10;
        $config['cur_tag_open'] = '<a class="current" style="color:#fff; background-color:#358fe4; font-weight: bold;">';
        $config['cur_tag_close'] = '</a>';
        $config['prev_link'] = '<i class="icon wb-chevron-left"></i>';
        $config['next_link'] = '<i class="icon wb-chevron-right"></i>';
        $config['last_link'] = '<b>>></b>';
        $config['first_link'] = '<b><<</b>';
        $config['uri_segment'] = 3;
    
        $this->pagination->initialize($config);
        $strpage = $this->uri->segment(3,0);
        $data['respon'] = $this->msaran->fetch_data_respon($config['per_page'],$strpage)->result();
        
        $data['links'] = $this->pagination->create_links();

        //$data['saran'] = $this->msaran->lihat_saran();
        $this->load->view('humas/header')->view('humas/respon/unpublish', $data)->view('humas/footer');
    }
}