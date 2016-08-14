<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpengguna extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('mpengguna');
        $this->load->library(array('form_validation', 'session'));
    }

    public function lihat()
    {
       $this->load->database();
        $jumlah_data = $this->mpengguna->jumlah_data();
        $this->load->library('pagination');
        $config['base_url'] = base_url().'Cpengguna/lihat/';
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 10;
        
        $config['cur_tag_open'] = '<a class="current" style="color:#fff; background-color:#358fe4; font-weight: bold;">';
        $config['cur_tag_close'] = '</a>';
        $config['prev_link'] = '<';
        $config['next_link'] = '>';
        $config['last_link'] = '>>';
        $config['first_link'] = '<<';
        
        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);

        $data['pengguna'] = $this->mpengguna->GetPengguna($config['per_page'], $from);
        $data['links'] = $this->pagination->create_links();
        $this->load->view('humas/header')->view('humas/pengguna/lihat', $data)->view('humas/footer');

    } 

    public function search()
    {
        $this->load->database();
        $cari = $this->input->POST('cari');
        if (!empty($cari)) {
            $data['ringkasan'] = $this->input->post('cari');
            $this->session->set_userdata('sess_ringkasan', $data['ringkasan']);
        }
        else {
            $data['ringkasan'] = $this->session->userdata('sess_ringkasan');
        }
        $this->load->library('pagination');
        $config = array();
        $config['base_url'] = base_url() . "Cpengguna/search";
        $total_row = $this->mpengguna->record_count_search($data['ringkasan']);
            //var_dump($total_row);
        $config['total_rows'] = $total_row;
        $config['per_page'] = 5;
        $config['cur_tag_open'] = '<a class="current" style="color:#fff; background-color:#358fe4; font-weight: bold;">';
        $config['cur_tag_close'] = '</a>';
        $config['prev_link'] = '<i class="fa fa-caret-left"></i>';
        $config['next_link'] = '<i class="fa fa-caret-right"></i>';
        $config['last_link'] = '<i class="fa fa-forward"></i>';
        $config['first_link'] = '<i class="fa fa-backward"></i>';
        $config['uri_segment'] = 3;
        
        $this->pagination->initialize($config);
        $strpage = $this->uri->segment(3,0);
            
        $data['pengguna'] = $this->mpengguna->pencarian($data['ringkasan'],$config['per_page'],$strpage);
        $data['links'] = $this->pagination->create_links();
            
        if($data['pengguna'] == NULL){
            $this->session->set_flashdata("pengpesan","<div class=\"alert alert-warning\" id=\"alert\">Pencarian ".$cari." tidak ditemukan<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
            //$this->lihat();
        }
        else{
            $this->session->set_flashdata("pengpesan","<div class=\"alert alert-success\" id=\"alert\">Ada ".$total_row." hasil pencarian ".$data['ringkasan']."<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
            $this->load->view('humas/header')->view('humas/pengguna/lihat', $data)->view('humas/footer');
        }   
    }
    
    public function ganti_password($id_pengguna)
    {
        $data['pengguna'] = $this->mpengguna->get_profil($id_pengguna);
        $this->load->view('humas/header')->view('humas/pengguna/ganti_pass1', $data)->view('humas/footer');
    }

    public function do_update_password() //update profil operator
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        
        $this->form_validation->set_rules('password','Password','trim|required|min_length[6]');
        $this->form_validation->set_rules('konfir_password', 'Konfirmasi Password', 'trim|required|matches[password]');
        
        $this->form_validation->set_message('min_length', '{field} minimal {param} karakter.');
        $this->form_validation->set_message('matches', 'konfirmasi password tidak sesuai');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        
        $id= $this->input->post('id_pengguna');
        $pass = md5(md5($this->input->post('password'))."UnS1h6e@hXh");
        
        if ($this->form_validation->run() == FALSE){    
            $this->ganti_password($id);
        }else{
            
            $this->mpengguna->get_update_pass($id, $pass);
            $this->session->set_flashdata("pesan_password","<div class=\"alert alert-success\" id=\"alert\">Password baru berhasil disimpan<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
            $this->ganti_password($id);
        }

    }

    public function tambah()
    {
        $data['skpd'] = $this->mpengguna->data_skpd();
        $this->load->view('humas/header')->view('humas/pengguna/tambah', $data)->view('humas/footer');
    }

    public function do_tambah()
    {
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->form_validation->set_rules('username', 'Username', 'trim|max_length[25]|required|regex_match[/^[a-zA-Z0-9]{0,25}$/]');
        $this->form_validation->set_rules('password', 'Password', 'trim|max_length[50]|required');
        $this->form_validation->set_rules('level', 'Level', 'trim|required');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|max_length[100]|required|regex_match[/^[a-zA-Z .]{1,100}$/]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|max_length[255]|regex_match[/^[a-zA-Z0-9  _.,\/@()-]{1,}$/]');
        $this->form_validation->set_rules('telepon', 'Telepon', 'trim|max_length[15]|regex_match[/^[+0-9 ()-]{3,15}$/]');
        $this->form_validation->set_rules('handphone', 'Handphone', 'trim|min_length[10]|max_length[20]|regex_match[/^[+0-9 -]{10,20}$/]');
        $this->form_validation->set_rules('email', 'Email', 'trim|max_length[70]|valid_email');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|max_length[255]');
        
        $this->form_validation->set_message('min_length', '{field} minimal {param} karakter');
        $this->form_validation->set_message('max_length', '{field} maksimal {param} karakter');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        $this->form_validation->set_message('regex_match', '{field} tidak sesuai format penulisan yang benar');
        $this->form_validation->set_message('valid_email', '{field} tidak sesuai format penulisan yang benar');

        if ($this->form_validation->run() == FALSE){
            $this->tambah();
        }
        else{
            $id_skpd = $this->input->post('id_skpd');
            $username = $this->input->post('username');
            $password = md5(md5($this->input->post('password'))."UnS1h6e@hXh");
            //$kode_unit = $this->input->post('kode_unit');
            $level = $this->input->post('level');
            $nama = $this->input->post('nama');
            $alamat = $this->input->post('alamat');
            $telepon = $this->input->post('telepon');
            $handphone = $this->input->post('handphone');
            $email = $this->input->post('email');
            $keterangan = $this->input->post('keterangan');

            $data = array(
                'id_skpd' => $id_skpd,
                'username' => $username,
                'password' => $password,
               // 'kode_unit'=> $kode_unit,
                'level' => $level,
                'nama' => $nama,
                'alamat' => $alamat,
                'telepon' => $telepon,
                'handphone' => $handphone,
                'email' => $email,
                'keterangan' => $keterangan
                );

        $this->mpengguna->AddPengguna($data, 'pengguna');
        $this->session->set_flashdata("pesan","<div class=\"alert alert-success\" id=\"alert\">Berhasil menambah data SKPD<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
        redirect('Cpengguna/lihat');
        }
    }

    public function update($id_pengguna)
    {
        $where = array('id_pengguna' => $id_pengguna);
        $data['pengguna'] = $this->mpengguna->UpdatePengguna($where, 'pengguna')->result();
        $data['skpd_data'] = $this->mpengguna->data_skpd();
        $this->load->view('humas/header')->view('humas/pengguna/edit', $data)->view('humas/footer');
    }

    public function do_update()
    {
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->form_validation->set_rules('username', 'Username', 'trim|max_length[25]|required|regex_match[/^[a-zA-Z0-9]{0,25}$/]');
        $this->form_validation->set_rules('level', 'Level', 'trim|max_length[25]|required');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|max_length[100]|required|regex_match[/^[a-zA-Z .]{1,100}$/]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|max_length[255]|regex_match[/^[a-zA-Z0-9  _.,\/@()-]{1,}$/]');
        $this->form_validation->set_rules('telepon', 'Telepon', 'trim|max_length[15]|regex_match[/^[+0-9 ()-]{3,15}$/]');
        $this->form_validation->set_rules('handphone', 'Handphone', 'trim|min_length[10]|max_length[20]|regex_match[/^[+0-9 -]{10,20}$/]');
        $this->form_validation->set_rules('email', 'Email', 'trim|max_length[70]|valid_email');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|max_length[255]');
        
        $this->form_validation->set_message('min_length', '{field} minimal {param} karakter');
        $this->form_validation->set_message('max_length', '{field} maksimal {param} karakter');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        $this->form_validation->set_message('regex_match', '{field} tidak sesuai format penulisan yang benar');
        $this->form_validation->set_message('valid_email', '{field} tidak sesuai format penulisan yang benar');

        $id_pengguna = $this->input->post('id_pengguna');
        
        if ($this->form_validation->run() == FALSE){
            $this->update($id_pengguna);
        }
        else{
        
            $username = $this->input->post('username');
            $id_skpd = $this->input->post('id_skpd');
            $level = $this->input->post('level');
            $nama = $this->input->post('nama');
            $alamat = $this->input->post('alamat');
            $telepon = $this->input->post('telepon');
            $handphone = $this->input->post('handphone');
            $email = $this->input->post('email');
            $keterangan = $this->input->post('keterangan');
            $isAktif = $this->input->post('isAktif');

            $data = array(
               'username' => $username,
                'id_skpd' => $id_skpd,
                'level' => $level,
                'nama' => $nama,
                'alamat' => $alamat,
                'telepon' => $telepon,
                'handphone' => $handphone,
                'email' => $email,
                'keterangan' => $keterangan,
                'isAktif' => $isAktif
            );

            $this->mpengguna->UpdatePengguna1($id_pengguna, $data);
            $this->session->set_flashdata("pesan","<div class=\"alert alert-success\" id=\"alert\">Perubahan berhasil disimpan<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
            redirect('Cpengguna/lihat');
        }
    }

     public function hapus($id_pengguna)
    {
        $this->mpengguna->DeletePengguna($id_pengguna);
        $this->session->set_flashdata("pesan","<div class=\"alert alert-success\" id=\"alert\">Data pengguna berhasil dihapus<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
        redirect('Cpengguna/lihat');
    }
    /*public function detail($id_pengguna)
    {
        $data['pengguna'] = $this->mpengguna->DetailPengguna(); 
        $this->load->view('humas/header')->view('humas/pengguna/lihat', $data)->view('humas/footer');
    }*/

    //profil operator
    public function indexoperator()
    {
        $id = $_SESSION['userid'];
        $data['adata']  = $this->mpengguna->get_profil($id);   //angka 1 nanti diganti dengan id_guru yang login sesuai session
        $this->load->view('dinas/header')->view('dinas/indexoperator',$data)->view('dinas/footer');
    }

    public function lihatawal(){
        $id = $_SESSION['userid'];
        $data['adata']  = $this->mpengguna->get_profil($id);   //angka 1 nanti diganti dengan id_guru yang login sesuai session
        $this->load->view('dinas/header');
        $this->load->view('dinas/akun/lihatawal',$data);
        $this->load->view('dinas/footer');
    }

    public function operator_lihat(){   //
        $id = $_SESSION['userid'];
        $data['adata']  = $this->mpengguna->get_profil($id);   //angka 1 nanti diganti dengan id_guru yang login sesuai session
        $this->load->view('dinas/header');
        $this->load->view('dinas/akun/lihat',$data);
        $this->load->view('dinas/footer');
    }
    
    public function do_updateoperator() //update profil operator
    {
        $this->load->library('form_validation');
                        
            $this->form_validation->set_rules('username','username','trim|min_length[4]|max_length[50]|required|regex_match[/^[a-zA-Z0-9]{0,100}$/]');
            $this->form_validation->set_rules('nama','nama','trim|required|min_length[4]|max_length[50]|regex_match[/^[a-zA-Z .]{2,100}$/]');
            $this->form_validation->set_rules('alamat','alamat','trim|min_length[1]|max_length[255]|required|regex_match[/^[a-zA-Z0-9  _.,\/@()-]{1,}$/]');
            $this->form_validation->set_rules('telepon', 'telepon', 'trim|min_length[4]|max_length[20]|regex_match[/^[+0-9 ()-]{4,20}$/]');
            $this->form_validation->set_rules('handphone','handphone','trim|required|min_length[4]|max_length[20]|regex_match[/^[+0-9 -]{4,20}$/]');
            $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');

            $this->form_validation->set_message('min_length', '{field} minimal {param} karakter.');
            $this->form_validation->set_message('max_length', '{field} maksimal {param} karakter.');
            $this->form_validation->set_message('required', '{field} tidak boleh kosong');
            $this->form_validation->set_message('regex_match', '{field} tidak sesuai format penulisan yang benar');
            $this->form_validation->set_message('valid_email', '{field} tidak sesuai format penulisan yang benar');

            
        $id= $this->input->post('id_pengguna');

       if ($this->form_validation->run() == FALSE){
                $this->operator_lihat();
                }else{

        $data = array(
                'username' => $this->input->post('username'),
        //        'password' => md5($this->input->post('password')),
                'nama' => $this->input->post('nama'),
                'alamat'  => $this->input->post('alamat'),
                'telepon'   => $this->input->post('telepon'),
                'handphone' => $this->input->post('handphone'),
                'email' => $this->input->post('email')
        );
//var_dump($data);
        $this->mpengguna->get_update_profil($id, $data);
        $this->session->set_flashdata("pesanprofil","<div class=\"alert alert-success\" id=\"alert\">Perubahan berhasil disimpan<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
        redirect('cpengguna/lihatawal');
        }
    }

    public function ganti_password_op($id_pengguna)
    {
        $data['pengguna'] = $this->mpengguna->get_profil($id_pengguna);
        $this->load->view('dinas/header')->view('dinas/akun/ganti_pass1', $data)->view('dinas/footer');
    } 
    public function do_update_password_op() //update profil operator
    {
        $passid = $_SESSION['passid'];
        $this->load->library('form_validation');
        $this->load->helper('security');
        
        $this->form_validation->set_rules('password','Password','trim|required|min_length[6]');
        $this->form_validation->set_rules('konfir_password', 'Konfirmasi Password', 'trim|required|matches[password]');
        $this->form_validation->set_rules('passwordlama','Password Lama','trim|required');

        
        $this->form_validation->set_message('min_length', '{field} minimal {param} karakter.');
        $this->form_validation->set_message('matches', 'password tidak sesuai');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');

        $passlama = md5(md5($this->input->post('passwordlama'))."UnS1h6e@hXh");

        $id= $this->input->post('id_pengguna');
        $pass = md5(md5($this->input->post('password'))."UnS1h6e@hXh");
        
        if ($this->form_validation->run() == FALSE){
            $this->ganti_password_op($id);

        }else if ($passlama == $passid){
            
            $this->mpengguna->get_update_password($id, $pass);
            $this->session->set_flashdata("pesanpass","<div class=\"alert alert-success\" id=\"alert\">Password baru berhasil disimpan<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
            redirect('cpengguna/lihatawal');

        }else if ($passlama !== $passid){
            $this->session->set_flashdata("pesan","<div class=\"alert alert-danger\" id=\"alert\">Password lama yang anda gunakaan saat login salah<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
            $this->ganti_password_op($id);
        }

    }


    //profil admin
    public function lihatawaladmin(){
        $id = $_SESSION['userid'];
        $data['adata']  = $this->mpengguna->get_profiladmin($id);   //angka 1 nanti diganti dengan id_guru yang login sesuai session
        $this->load->view('humas/header');
        $this->load->view('humas/akun/lihatawal',$data);
        $this->load->view('humas/footer');
    }

    public function admin_lihat(){   //
        $id = $_SESSION['userid'];
        $data['adata']  = $this->mpengguna->get_profiladmin($id);   //angka 1 nanti diganti dengan id_guru yang login sesuai session
        $this->load->view('humas/header');
        $this->load->view('humas/akun/lihat',$data);
        $this->load->view('humas/footer');
    }

    public function do_updateadmin() //update profil operator
    {
        $this->load->library('form_validation');
                        
            $this->form_validation->set_rules('username','username','trim|required|min_length[4]|max_length[50]|regex_match[/^[a-zA-Z0-9]{0,100}$/]');
            $this->form_validation->set_rules('nama','nama','trim|required|min_length[4]|max_length[50]|regex_match[/^[a-zA-Z .]{2,100}$/]');
            $this->form_validation->set_rules('alamat','alamat','trim|min_length[1]|max_length[255]|required|regex_match[/^[a-zA-Z0-9  _.,\/@()-]{1,}$/]');
            $this->form_validation->set_rules('telepon', 'telepon', 'trim|min_length[4]|max_length[20]|regex_match[/^[+0-9 ()-]{4,20}$/]');
            $this->form_validation->set_rules('handphone','handphone','trim|required|min_length[4]|max_length[20]|regex_match[/^[+0-9 -]{4,20}$/]');
            $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');

            $this->form_validation->set_message('min_length', '{field} minimal {param} karakter.');
            $this->form_validation->set_message('max_length', '{field} maksimal {param} karakter.');
            $this->form_validation->set_message('required', '{field} tidak boleh kosong');
            $this->form_validation->set_message('regex_match', '{field} tidak sesuai format penulisan yang benar');
            $this->form_validation->set_message('valid_email', '{field} tidak sesuai format penulisan yang benar');

        $id= $this->input->post('id_pengguna');

       if ($this->form_validation->run() == FALSE){
                $this->admin_lihat();
                }else{

        $data = array(
                'username' => $this->input->post('username'),
        //        'password' => md5($this->input->post('password')),
                'nama' => $this->input->post('nama'),
                'alamat'  => $this->input->post('alamat'),
                'telepon'   => $this->input->post('telepon'),
                'handphone' => $this->input->post('handphone'),
                'email' => $this->input->post('email')
        );
//var_dump($data);
        $this->mpengguna->get_update_profiladmin($id, $data);
        $this->session->set_flashdata("pesanprofil","<div class=\"alert alert-success\" id=\"alert\">Perubahan berhasil disimpan<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
        redirect('cpengguna/lihatawaladmin');
        }
    }

    public function ganti_password_ad($id_pengguna)
    {
        $data['pengguna'] = $this->mpengguna->get_profiladmin($id_pengguna);
        $this->load->view('humas/header')->view('humas/akun/ganti_pass1', $data)->view('humas/footer');
    } 
    public function do_update_password_ad() //update profil operator
    {
        $passid = $_SESSION['passid'];
        $this->load->library('form_validation');
        $this->load->helper('security');
        
        $this->form_validation->set_rules('password','Password','trim|required|min_length[6]');
        $this->form_validation->set_rules('konfir_password', 'Konfirmasi Password', 'trim|required|matches[password]');
        $this->form_validation->set_rules('passwordlama','Password Lama','trim|required');


        $this->form_validation->set_message('min_length', '{field} minimal {param} karakter.');
        $this->form_validation->set_message('matches', 'password tidak sesuai');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
    
        $passlama = md5(md5($this->input->post('passwordlama'))."UnS1h6e@hXh");
        
        $id= $this->input->post('id_pengguna');
        $pass = md5(md5($this->input->post('password'))."UnS1h6e@hXh");
        
        if ($this->form_validation->run() == FALSE){
            $this->ganti_password_ad($id);
        }else if ($passlama == $passid){
            
            $this->mpengguna->get_update_password($id, $pass);
            $this->session->set_flashdata("pesanpass","<div class=\"alert alert-success\" id=\"alert\">Password baru berhasil disimpan<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
            redirect('cpengguna/lihatawaladmin');
        }else if ($passlama !== $passid){
            $this->session->set_flashdata("pesan","<div class=\"alert alert-danger\" id=\"alert\">Password lama yang anda gunakaan saat login salah<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
            $this->ganti_password_ad($id);
        }
    }
}