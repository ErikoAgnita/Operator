<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mkecamatan extends CI_Model {

	function __construct()
    {
        parent::__construct();
        $this->load->database('default','true');
    }

    public function GetKecamatan($number, $offset){
		return $query = $this->db->get('kecamatan', $number, $offset)->result();
	}

    public function jumlah_data(){
        return $this->db->get('kecamatan')->num_rows();
    }

	public function AddKecamatan($data, $table){
		$this->db->insert('kecamatan', $data);
	}

	public function UpdateKecamatan($where, $table){
		return $this->db->get_where($table, $where);
	}

	public function UpdateKecamatan1($kode_kecamatan, $data){
		$this->db->where('kode_kecamatan', $kode_kecamatan);
		$this->db->update('kecamatan', $data);	
	}

	public function DeleteKecamatan($kode_kecamatan){
		$this->db->where('kode_kecamatan', $kode_kecamatan);
		$this->db->delete('kecamatan');
	}

	public function pencarian($cari, $limit, $kode_kecamatan){
        $query = $this->db->query("SELECT * FROM kecamatan WHERE nama_kecamatan LIKE '%$cari%' LIMIT $limit OFFSET $kode_kecamatan");
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        else return 0;
    }
    public function record_count_search($cari) {
        $condition = "nama_kecamatan LIKE '%$cari%' ";
        $this->db->where($condition);
        return $this->db->count_all_results('kecamatan');
    }

 }