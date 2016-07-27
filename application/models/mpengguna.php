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
}
