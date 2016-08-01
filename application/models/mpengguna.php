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
		return $this->db->query('SELECT p.id_pengguna, p.username, p.password, p.nama as nama_pengguna, p.alamat, p.telepon, p.handphone, p.email, p.keterangan, p.last_login, p.last_update, p.isAktif, s.nama as nama_dinas, p.level, p.keterangan from pengguna p, skpd s where p.id_skpd=s.id_skpd');
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

	public function UpdatePengguna1($id_pengguna, $data){
		$this->db->where('id_pengguna', $id_pengguna);
		$this->db->update('pengguna', $data);

		$waktu=date("Y-m-d H:i:s");
        $this->db->query("UPDATE pengguna SET last_update='$waktu' where id_pengguna='$id_pengguna'");	

        return TRUE;	
	}

	public function DeletePengguna($where, $table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	/*public function DetailPengguna(){
		return $this->db->query('SELECT p.id_pengguna, p.username, p.password, p.level, p.nama as nama_pengguna, p.alamat, p.telepon, p.handphone, p.email, p.keterangan, p.last_login, p.last_update, p.isAktif, s.nama as nama_dinas from pengguna p, skpd s where p.id_skpd=s.id_skpd');
	}*/

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

        $waktu=date("Y-m-d H:i:s");
        $this->db->query("UPDATE pengguna SET last_update='$waktu' where id_pengguna='$id'");

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

        $waktu=date("Y-m-d H:i:s");
        $this->db->query("UPDATE pengguna SET last_update='$waktu' where id_pengguna='$id'");

        return TRUE;
    }

}
