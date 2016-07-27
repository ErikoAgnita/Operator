<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpengguna extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('mpengguna');
    }

    public function lihat()
    {
        $data['pengguna'] = $this->mpengguna->GetAkun();
        $this->load->view('humas/header')->view('humas/pengguna/lihat', $data)->view('humas/footer');

    } 

    public function tambah()
    {
        $this->load->view('humas/header')->view('humas/pengguna/tambah')->view('humas/footer');
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
        $this->mpengguna->AddAkun($data);
        redirect('Cpengguna/lihat');
    }

    public function update($id_pengguna)
    {
        $where = array('id_pengguna' => $id_pengguna);
        $data['skpd'] = $this->mpengguna->UpdateAkun($where, 'pengguna')->result();
        $this->load->view('humas/header')->view('humas/pengguna/edit', $data)->view('humas/footer');
    }

    public function do_update($id_pengguna)
    {
        $id_pengguna = $this->input->post('id_pengguna');
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

        $where = array(
            'id_pengguna' => $id_pengguna
        );

        $this->mpengguna->UpdateAkun1($where, $data, 'pengguna');
        redirect('Cpengguna/lihat');
    }

    public function hapus($id_pengguna)
    {
        $this->mpengguna->Delete($id_pengguna);
        redirect(base_url().'Cpengguna/lihat');
    }
}