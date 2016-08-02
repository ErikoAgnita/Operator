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
        $data['kecamatan'] = $this->mkecamatan->GetKecamatan(); 
        $this->load->view('humas/header')->view('humas/kecamatan/lihat', $data)->view('humas/footer');
    } 

    public function tambah()
    {
        $this->load->view('humas/header')->view('humas/kecamatan/tambah')->view('humas/footer');
    }

    public function do_tambah()
    {
   		$kode_kecamatan = $this->input->post('kode_kecamatan');
        $nama_kecamatan = $this->input->post('nama_kecamatan');

        $data = array(
            'kode_kecamatan' => $kode_kecamatan,
            'nama_kecamatan' => $nama_kecamatan,
        	);

        $this->mkecamatan->AddKecamatan($data, 'kecamatan');
        redirect('Ckecamatan/lihat');
    }

    public function update($kode_kecamatan)
    {
    	$where = array('kode_kecamatan' => $kode_kecamatan);
        $data['kecamatan'] = $this->mkecamatan->UpdateKecamatan($where, 'kecamatan')->result();
        $this->load->view('humas/header')->view('humas/kecamatan/edit', $data)->view('humas/footer');
    }

    public function do_update($kode_kecamatan)
    {
    	$kode_kecamatan = $this->input->post('kode_kecamatan');
        $nama_kecamatan = $this->input->post('nama_kecamatan');
        $isAktif = $this->input->post('isAktif');

        $data = array(
           'kode_kecamatan' => $kode_kecamatan,
            'nama_kecamatan' => $nama_kecamatan,
            'isAktif' => $isAktif
        );

        $this->mkecamatan->UpdateKecamatan1($kode_kecamatan, $data);
        redirect('Ckecamatan/lihat');
    }

       public function hapus($kode_kecamatan)
    {
    	$where = array('kode_kecamatan' => $kode_kecamatan);
        $this->mkecamatan->DeleteKecamatan($kode_kecamatan, 'kecamatan');
        redirect('Ckecamatan/lihat');
    }

}