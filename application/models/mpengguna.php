<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpengguna extends CI_Model {

	function __construct()
    {
        parent::__construct();
        $this->load->database('default','true');
    }

	public function GetAkun(){
		return $this->db->get('pengguna');
	}

	public function AddAkun($data){
		$this->db->insert('pengguna', $data);
	}

	//SKPD

	public function GetAkunskpd($number, $offset){
		return $query = $this->db->get('skpd', $number, $offset)->result();
	}

	public function jumlah_data(){
		return $this->db->get('skpd')->num_rows();
	}

	public function AddAkun1($data, $table){
		$this->db->insert($table, $data);
	}

	public function UpdateAkun($where, $table){
		return $this->db->get_where($table, $where);
	}

	public function UpdateAkun1($where, $data, $table){
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function Delete($where, $table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function dataskpd(){
		return $this->db->get('skpd');
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
