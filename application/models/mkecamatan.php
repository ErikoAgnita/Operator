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

	public function UpdateKecamatan1($id_kode_kecamatan, $data){
		$this->db->where('kode_kecamatan', $id_kode_kecamatan);
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
        $this->db->select('kode_kecamatan');
        $this->db->from('kecamatan');
        $this->db->where($condition);
        return $this->db->count_all_results();
    }

    public function update($id_kode_kecamatan){
        $kode_kecamatan=$this->input->post('kode_kecamatan');
        $nama_kecamatan=$this->input->post('nama_kecamatan');
        $isAktif=$this->input->post('isAktif');

        $data=array(
            'kode_kecamatan'=>$kode_kecamatan,
            'nama_kecamatan' =>$nama_kecamatan,
            'isAktif'=>$isAktif);
        $this->db->where('kode_kecamatan', $kode_kecamatan);
        $this->db->update('kecamatan', $data);
    }

    public function getById($id_kode_kecamatan){
        $query = $this->db->get_where('kecamatan', array('kode_kecamatan' =>$id_kode_kecamatan));

        if ($query->num_rows() > 0) {
            return $query->result();
        }
        else return 0;
    }

    public function hapuskec($kodeKec){
        $query = $this->db->query("SELECT kecamatan.kode_kecamatan FROM kecamatan RIGHT JOIN kelurahan on kecamatan.kode_kecamatan = kelurahan.kode_kecamatan WHERE kecamatan.kode_kecamatan = '$kodeKec' ");
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        else return 0;
    }
 }