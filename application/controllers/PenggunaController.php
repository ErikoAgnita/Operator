<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PenggunaController extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('PenggunaModel');
    }

    public function lihat()
    {
        $data['pengguna'] = $this->PenggunaModel->GetAkun();
        $this->load->view('humas/header')->view('pengguna/lihat', $data)->view('humas/footer');

    } 

    public function tambah()
    {
        $this->load->view('humas/header')->view('pengguna/tambah')->view('humas/footer');
    }

    public function do_tambah()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $kode_unit = $this->input->post('kode_unit');
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
            'password' => $password,
            'kode_unit' => $kode_unit,
            'level' => $level,
            'nama' => $nama,
            'alamat' => $alamat,
            'telepon' => $telepon,
            'handphone' => $handphone,
            'email' => $email,
            'keterangan' => $keterangan,
            'isAktif' => $isAktif
            );
        $this->PenggunaModel->AddAkun($data);
        redirect('PenggunaController/lihat');
    }
}