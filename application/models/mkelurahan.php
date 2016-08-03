<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mkelurahan extends CI_Model {

	function __construct()
    {
        parent::__construct();
        $this->load->database('default','true');
    }

   public function GetKelurahan($number, $offset){
		return $this->db->query(('SELECT kel.kode_kelurahan, kel.nama_kelurahan, kel.isAktif, kel.kode_kecamatan, kec.nama_kecamatan from kecamatan kec, kelurahan kel where kel.kode_kecamatan=kec.kode_kecamatan'), $number, $offset);
	}

    public function jumlah_data(){
        return $this->db->get('kelurahan')->num_rows();
    }

	public function AddKelurahan($data, $table){
		$this->db->insert('kelurahan', $data);
	}

	public function data_kecamatan(){
		return $this->db->get('kecamatan');
	}

	public function UpdateKelurahan($where, $table){
		return $this->db->get_where($table, $where);
	}

	public function UpdateKelurahan1($where, $data, $table){
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function DeleteKelurahan($where, $table){
		$this->db->where($where);
		$this->db->delete($table);
	}

 }