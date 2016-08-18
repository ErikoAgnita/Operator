<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ckelurahan extends CI_Controller {
	 
	function __construct()
    {
        parent::__construct();
        $this->load->model('mkelurahan');
        $this->load->library(array('form_validation', 'session'));
    }

     public function lihat()
    { 
        $this->load->database();
        $jumlah_data = $this->mkelurahan->jumlah_data();
        $this->load->library('pagination');
        $config['base_url'] = base_url().'Ckelurahan/lihat/';
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

        $data['kelurahan'] = $this->mkelurahan->GetKelurahan($config['per_page'], $from);
        $data['links'] = $this->pagination->create_links();
        $this->load->view('humas/header')->view('humas/kelurahan/lihat', $data)->view('humas/footer');
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
            $config['base_url'] = base_url() . "Ckelurahan/search";
            $total_row = $this->mkelurahan->record_count_search($data['ringkasan']);
                //var_dump($total_row);
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

            $data['kelurahan'] = $this->mkelurahan->pencarian($data['ringkasan'],$config['per_page'],$strpage);
            $data['links'] = $this->pagination->create_links();

            if($data['kelurahan'] == NULL ){
                $this->session->set_flashdata("pesankel","<div class=\"alert alert-warning\" id=\"alert\">Pencarian ".$cari." tidak ditemukan<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
                $this->lihat();
            }
            else{   
                $this->session->set_flashdata("pesankel","<div class=\"alert alert-success\" id=\"alert\">Ada ".$total_row." hasil pencarian ".$data['ringkasan']."<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
                $this->load->view('humas/header')->view('humas/kelurahan/lihat', $data)->view('humas/footer');
            }   
    }

    public function tambah()
    {
        $data['data_kecamatan'] = $this->mkelurahan->data_kecamatan();
        $this->load->view('humas/header')->view('humas/kelurahan/tambah', $data)->view('humas/footer');
    }

    public function do_tambah()
    {
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->form_validation->set_rules('kode_kelurahan', 'Kode Kelurahan', 'trim|max_length[20]|regex_match[/^[a-z]{0,20}$/]|required');
        $this->form_validation->set_rules('nama_kelurahan', 'Nama Kelurahan', 'trim|max_length[50]|required');

        $this->form_validation->set_message('max_length', '{field} maksimal {param} karakter');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        $this->form_validation->set_message('regex_match', '{field} harus terdiri dari huruf kecil');

        if ($this->form_validation->run() == FALSE){
            $this->tambah();
        }
        else{   
            $kode_kecamatan = $this->input->post('kode_kecamatan');
            $kode_kelurahan = $this->input->post('kode_kelurahan');
            $nama_kelurahan = $this->input->post('nama_kelurahan');

            $data = array(
                'kode_kecamatan' => $kode_kecamatan,
                'kode_kelurahan' => $kode_kelurahan,
                'nama_kelurahan' => $nama_kelurahan
                );

        $this->mkelurahan->AddKelurahan($data);
        $this->session->set_flashdata("pesankel","<div class=\"alert alert-success\" id=\"alert\">Berhasil menambah data Kelurahan<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
        redirect('Ckelurahan/lihat');
        }
    }

    public function update($id_kode_kelurahan)
    {
        $where = array('kode_kelurahan' => $id_kode_kelurahan);
        $data['kelurahan'] = $this->mkelurahan->UpdateKelurahan($where, 'kelurahan')->result();
        $data['data_kecamatan'] = $this->mkelurahan->data_kecamatan();
        $this->load->view('humas/header')->view('humas/kelurahan/edit', $data)->view('humas/footer');
    }

    public function do_update($id_kode_kelurahan)
    {
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->form_validation->set_rules('kode_kelurahan', 'Kode Kelurahan', 'trim|max_length[20]|regex_match[/^[a-z]{0,20}$/]|required');
        $this->form_validation->set_rules('nama_kelurahan', 'Nama Kelurahan', 'trim|max_length[50]|required');

        $this->form_validation->set_message('max_length', '{field} maksimal {param} karakter');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        $this->form_validation->set_message('regex_match', '{field} harus terdiri dari huruf kecil');

        if ($this->form_validation->run() == FALSE){
            $this->update($id_kode_kelurahan);
        }
        else{
        $kode_kecamatan = $this->input->post('kode_kecamatan');
        $kode_kelurahan = $this->input->post('kode_kelurahan');
        $nama_kelurahan = $this->input->post('nama_kelurahan');
        $isAktif = $this->input->post('isAktif');

        $data = array(
            'kode_kecamatan' => $kode_kecamatan,
            'kode_kelurahan' => $kode_kelurahan,            
            'nama_kelurahan' => $nama_kelurahan,
            'isAktif' => $isAktif
        );

        $this->mkelurahan->UpdateKelurahan1($id_kode_kelurahan, $data);
        $this->session->set_flashdata("pesankel","<div class=\"alert alert-success\" id=\"alert\">Perubahan berhasil disimpan<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
        redirect('Ckelurahan/lihat');
        }
    }

    public function hapus($kode_kelurahan)
    {
        $this->mkelurahan->DeleteKelurahan($kode_kelurahan);
        $this->session->set_flashdata("pesankel","<div class=\"alert alert-success\" id=\"alert\">Kelurahan dengan kode ".$kode_kelurahan." berhasil dihapus<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
        redirect('Ckelurahan/lihat');
    }

}