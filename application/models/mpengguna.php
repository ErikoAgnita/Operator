<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpengguna extends CI_Model {

	function __construct()
    {
        parent::__construct();
        $this->load->database('default','true');
    }

//PENGGUNA

	public function GetAkun(){
		return $this->db->get('pengguna');
	}

	public function GetPengguna(){
		return $this->db->query('SELECT p.id_pengguna, p.nama as nama_pengguna, p.alamat, p.handphone, p.email, s.nama as nama_dinas, p.level, p.keterangan from pengguna p, skpd s where p.id_skpd=s.id_skpd');
	}

	public function AddPengguna($data, $table){
		$this->db->insert('pengguna', $data);
	}

	public function data_skpd(){
		return $this->db->get('skpd');
	}

	public function UpdatePengguna($where, $table){
		return $this->db->get_where($table, $where);
	}

	public function UpdatePengguna1($where, $data, $table){
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function DeletePengguna($where, $table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	//profil operator
	public function get_profil($id) {
        $this->db->from('pengguna');
        $this->db->where('id_pengguna', $id);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        }
	}

	public function get_update_profil($id, $data) {
        $this->db->where('id_pengguna', $id);
        $this->db->update('pengguna', $data);

        return TRUE;
    }

    //profil admin
    public function get_profiladmin($id) {
        $this->db->from('pengguna');
        $this->db->where('id_pengguna', $id);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        }
	}

	public function get_update_profiladmin($id, $data) {
        $this->db->where('id_pengguna', $id);
        $this->db->update('pengguna', $data);

        return TRUE;
    }

}
