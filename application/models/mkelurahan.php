<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mkelurahan extends CI_Model {

	function __construct()
    {
        parent::__construct();
        $this->load->database('default','true');
    }

   public function GetKelurahan($number, $offset){
		$this->db->select('kel.kode_kecamatan, kel.kode_kelurahan, kel.nama_kelurahan, kel.isAktif, kec.nama_kecamatan');
        $this->db->from('kelurahan kel');
        $this->db->join('kecamatan kec', 'kec.kode_kecamatan=kel.kode_kecamatan');
        $this->db->order_by('kel.kode_kecamatan', 'ASC');
        $this->db->limit($number, $offset);
        $query = $this->db->get();
		return $query->result();
	}

    public function jumlah_data(){
    	$this->db->join('kecamatan kec', 'kec.kode_kecamatan=kel.kode_kecamatan');
        return $this->db->count_all_results('kelurahan kel');
    }

	public function AddKelurahan($data){
		$this->db->insert('kelurahan', $data);
	}

	public function data_kecamatan(){
		return $this->db->get('kecamatan');
	}

	public function UpdateKelurahan($where, $table){
		return $this->db->get_where($table, $where);
	}

	public function UpdateKelurahan1($id_kode_kelurahan, $data){
		$this->db->where('kode_kelurahan', $id_kode_kelurahan);
		$this->db->update('kelurahan', $data);
	}

	public function DeleteKelurahan($kode_kelurahan){
		$this->db->where('kode_kelurahan', $kode_kelurahan);
		$this->db->delete('kelurahan');
	}

	public function pencarian($cari, $limit, $kode_kelurahan){
        //$query = $this->db->query("SELECT * FROM kelurahan WHERE kelurahan.nama_kelurahan LIKE '%$cari%' LIMIT $limit OFFSET $kode_kelurahan");
        $query = $this->db->query("SELECT * FROM kelurahan LEFT JOIN kecamatan ON kelurahan.kode_kecamatan=kecamatan.kode_kecamatan WHERE kelurahan.nama_kelurahan like '%$cari%'  LIMIT $limit OFFSET $kode_kelurahan");
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        else return 0;
    }
    public function record_count_search($cari) {
        $condition = "kelurahan.nama_kelurahan LIKE '%$cari%'";
        $this->db->select('kode_kelurahan');
        $this->db->from('kelurahan');
        $this->db->join('kecamatan', 'kelurahan.kode_kecamatan=kecamatan.kode_kecamatan');
        $this->db->where($condition);
        return $this->db->count_all_results();
            //return $query->result();
    }

 }