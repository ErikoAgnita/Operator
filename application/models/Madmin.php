<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madmin extends CI_Model {

	public function GetAkun(){
		return $this->db->get('admin');
	}

	public function AddAkun($data, $table){
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
