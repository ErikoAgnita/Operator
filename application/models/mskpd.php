<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mskpd extends CI_Model {

	function __construct()
    {
        parent::__construct();
        $this->load->database('default','true');
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

	public function DeleteSKPD($where, $table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}