<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ckecamatan extends CI_Controller {
	 
	function __construct()
    {
        parent::__construct();
        $this->load->model('mkecamatan');
        $this->load->library(array('form_validation', 'session'));
    }

     public function lihat()
    { 
        $this->load->database();
        $jumlah_data = $this->mkecamatan->jumlah_data();
        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php/Ckecamatan/lihat/';
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

        $data['kecamatan'] = $this->mkecamatan->GetKecamatan($config['per_page'], $from);
        $data['links'] = $this->pagination->create_links();
        $this->load->view('humas/header')->view('humas/kecamatan/lihat', $data)->view('humas/footer');
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
        $config['base_url'] = base_url() . "Ckecamatan/search";
        $total_row = $this->mkecamatan->record_count_search($data['ringkasan']);
        $config['total_rows'] = $total_row;
        $config['per_page'] = 10;
        $config['cur_tag_open'] = '<a class="current" style="color:#fff; background-color:#358fe4; font-weight: bold;">';
        $config['cur_tag_close'] = '</a>';
        $config['prev_link'] = '<i class="fa fa-caret-left"></i>';
        $config['next_link'] = '<i class="fa fa-caret-right"></i>';
        $config['last_link'] = '<i class="fa fa-forward"></i>';
        $config['first_link'] = '<i class="fa fa-backward"></i>';
        $config['uri_segment'] = 3;
            
        $this->pagination->initialize($config);
        $strpage = $this->uri->segment(3,0);
                
        $data['kecamatan'] = $this->mkecamatan->pencarian($data['ringkasan'],$config['per_page'],$strpage);
        $data['links'] = $this->pagination->create_links();

         if($data['kecamatan'] == NULL){
            $this->session->set_flashdata("pesankec","<div class=\"alert alert-warning\" id=\"alert\">Pencarian ".$cari." tidak ditemukan<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
            //$this->lihat();
        }
        else{   
            $this->session->set_flashdata("pesankec","<div class=\"alert alert-success\" id=\"alert\">Ada ".$total_row." hasil pencarian ".$data['ringkasan']."<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
            $this->load->view('humas/header')->view('humas/kecamatan/lihat', $data)->view('humas/footer');
        }   
    }

    public function tambah()
    {
        $this->load->library('session');
        $this->load->view('humas/header')->view('humas/kecamatan/tambah')->view('humas/footer');
    }

    public function do_tambah()
    {
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->form_validation->set_rules('kode_kecamatan', 'Kode Kecamatan', 'trim|max_length[20]|regex_match[/^[a-z]{0,20}$/]|required');
        $this->form_validation->set_rules('nama_kecamatan', 'Nama Kecamatan', 'trim|max_length[50]|required');

        $this->form_validation->set_message('max_length', '{field} maksimal {param} karakter.');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        $this->form_validation->set_message('regex_match', '{field} harus terdiri dari huruf kecil');

        if ($this->form_validation->run() == FALSE){
            $this->tambah();
        }
        else{

            $kode_kecamatan = $this->input->post('kode_kecamatan');
            $nama_kecamatan = $this->input->post('nama_kecamatan');

            $data = array(
                'kode_kecamatan' => $kode_kecamatan,
                'nama_kecamatan' => $nama_kecamatan,
            );

        $this->mkecamatan->AddKecamatan($data, 'kecamatan');
        $this->session->set_flashdata("pesankec","<div class=\"alert alert-success\" id=\"alert\">Berhasil menambah data Kecamatan<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
        redirect('Ckecamatan/lihat');
        }
    }

    public function update($id_kode_kecamatan)
    {
    	$where = array('kode_kecamatan' => $id_kode_kecamatan);
        $data['kecamatan'] = $this->mkecamatan->UpdateKecamatan($where, 'kecamatan')->result();
        $this->load->view('humas/header')->view('humas/kecamatan/edit', $data)->view('humas/footer');
    }

    public function do_update($id_kode_kecamatan)
    {
    	$this->load->library('form_validation');
        $this->load->library('session');
        $this->form_validation->set_rules('kode_kecamatan', 'Kode Kecamatan', 'trim|max_length[20]|regex_match[/^[a-z]{0,20}$/]|required');
        $this->form_validation->set_rules('nama_kecamatan', 'Nama Kecamatan', 'trim|max_length[50]|required');

        $this->form_validation->set_message('max_length', '{field} maksimal {param} karakter.');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        $this->form_validation->set_message('regex_match', '{field} harus terdiri dari huruf kecil');

        if ($this->form_validation->run() == FALSE){
            $this->update($id_kode_kecamatan);
        }
        else{
            $kode_kecamatan = $this->input->post('kode_kecamatan');
            $nama_kecamatan = $this->input->post('nama_kecamatan');
            $isAktif = $this->input->post('isAktif');

            $data = array(
               'kode_kecamatan' => $kode_kecamatan,
                'nama_kecamatan' => $nama_kecamatan,
                'isAktif' => $isAktif
            );

            $this->mkecamatan->UpdateKecamatan1($id_kode_kecamatan, $data);
            $this->session->set_flashdata("pesankec","<div class=\"alert alert-success\" id=\"alert\">Perubahan berhasil disimpan<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
            redirect('Ckecamatan/lihat');
        }
    }

    public function hapus($kode_kecamatan)
    {
        $data['kecamatan'] = $this->mkecamatan->hapuskec($kode_kecamatan);
        if($data['kecamatan']==NULL){
          $this->mkecamatan->DeleteKecamatan($kode_kecamatan);
          $this->session->set_flashdata("pesankec","<div class=\"alert alert-success\" id=\"alert\">Kecamatan dengan kode ".$kode_kecamatan." berhasil dihapus<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
          redirect('Ckecamatan/lihat');
        }
        else{
            $this->session->set_flashdata("pesankec","<div class=\"alert alert-danger\" id=\"alert\">Kecamatan dengan kode ".$kode_kecamatan." gagal dihapus<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
            redirect('Ckecamatan/lihat');
        }
        
    }

    /*public function update_data($id_kode_kecamatan){
        if($this->input->post('submit')){
            $this->mkecamatan->update($id_kode_kecamatan);
            redirect('Ckecamatan/update_data');
            }
            $data['kecamatan']=$this->mkecamatan->getById($id_kode_kecamatan);
            $this->load->view('humas/header')->view('humas/kecamatan/edit', $data)->view('humas/footer');

        }*/

}