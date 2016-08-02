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
        $data['kelurahan'] = $this->mkelurahan->GetKelurahan(); 
        $this->load->view('humas/header')->view('humas/kelurahan/lihat', $data)->view('humas/footer');
    } 

    public function tambah()
    {
        $data['data_kecamatan'] = $this->mkelurahan->data_kecamatan();
        $this->load->view('humas/header')->view('humas/kelurahan/tambah', $data)->view('humas/footer');
    }

    public function do_tambah()
    {
   		$kode_kecamatan = $this->input->post('kode_kecamatan');
        $kode_kelurahan = $this->input->post('kode_kelurahan');
        $nama_kelurahan = $this->input->post('nama_kelurahan');

        $data = array(
            'kode_kecamatan' => $kode_kecamatan,
            'kode_kelurahan' => $kode_kelurahan,
            'nama_kelurahan' => $nama_kelurahan
        	);

        $this->mkelurahan->AddKelurahan($data, 'kelurahan');
        redirect('Ckelurahan/lihat');
    }

    public function update($kode_kelurahan)
    {
        $where = array('kode_kelurahan' => $kode_kelurahan);
        $data['kelurahan'] = $this->mkelurahan->UpdateKelurahan($where, 'kelurahan')->result();
        $data['data_kecamatan'] = $this->mkelurahan->data_kecamatan();
        $this->load->view('humas/header')->view('humas/kelurahan/edit', $data)->view('humas/footer');
    }

   public function do_update($kode_kelurahan)
    {
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

        $where = array(
            'kode_kelurahan' => $kode_kelurahan
        );

        $this->mkelurahan->UpdateKelurahan1($where, $data, 'kelurahan');
        redirect('Ckelurahan/lihat');
    }

    public function hapus($kode_kelurahan)
    {
    	$where = array('kode_kelurahan' => $kode_kelurahan);
        $this->mkelurahan->DeleteKelurahan($kode_kelurahan, 'kelurahan');
        redirect('Ckelurahan/lihat');
    }

}