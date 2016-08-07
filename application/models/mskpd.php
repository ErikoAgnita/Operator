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

	public function UpdateAkun1($id_skpd, $data){
		$this->db->where('id_skpd', $id_skpd);
		$this->db->update('skpd', $data);
	}

	public function pencarian($cari, $limit, $id_skpd){
        $query = $this->db->query("SELECT * FROM skpd WHERE nama LIKE '%$cari%' or kodeUnit LIKE '%$cari%' LIMIT $limit OFFSET $id_skpd");
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        else return 0;
    }
    public function record_count_search($cari) {
        $condition = "nama LIKE '%$cari%' or kodeUnit LIKE '%$cari%'";
        $this->db->where($condition);
        return $this->db->count_all_results('skpd');
            //return $query->result();
    }

	public function DeleteSKPD($id_skpd){
		$this->db->where('id_skpd', $id_skpd);
		$this->db->delete('skpd');
	}
}