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

	public function GetPengguna($number, $offset){
	   //$query = $this->db->query(('SELECT p.id_pengguna, p.username, p.password, p.nama as nama_pengguna, p.alamat, p.telepon, p.handphone, p.email, p.keterangan, p.last_login, p.last_update, p.isAktif, s.nama as nama_dinas, p.level, p.keterangan from pengguna p, skpd s where p.id_skpd=s.id_skpd order by nama_pengguna ASC'), $number, $offset);
	    $this->db->select('p.id_pengguna, p.username, p.password, p.nama as nama_pengguna, p.alamat, p.telepon, p.handphone, p.email, p.keterangan, p.last_login, p.last_update, p.isAktif, s.nama as nama_dinas, p.level, p.keterangan');
        $this->db->from('pengguna p');
        $this->db->join('skpd s', 's.id_skpd=p.id_skpd');
	$this->db->order_by('nama_dinas', 'ASC');
        $this->db->order_by('p.level', 'ASC');
        $this->db->order_by('p.nama', 'ASC');
        $this->db->limit($number, $offset);
        $query = $this->db->get();
        return $query->result();
    }

    public function jumlah_data(){
        $this->db->join('skpd s', 'p.id_skpd=s.id_skpd');
        return $this->db->count_all_results('pengguna p');
    }

	public function AddPengguna($data, $table){
		$this->db->insert('pengguna', $data);
	}

	public function data_skpd(){
		$this->db->where('isAktif',1);
		$this->db->order_by('nama','asc');
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
	
	public function UpdateStatusPengguna($stat,$id_skpd){
        $this->db->query("UPDATE pengguna SET isAktif ='$stat' where id_skpd='$id_skpd'");
        return TRUE;
	}


	public function DeletePengguna($where){
		$this->db->where('id_pengguna', $where);
		$this->db->delete('pengguna');
	}

	public function pencarian($cari, $limit, $id_pengguna){
        $query = $this->db->query("SELECT p.id_pengguna, p.username, p.password, p.nama as nama_pengguna, p.alamat, p.telepon, p.handphone, p.email, p.keterangan, p.last_login, p.last_update, p.isAktif, s.nama as nama_dinas, p.level, p.keterangan FROM pengguna p RIGHT JOIN skpd s ON p.id_skpd=s.id_skpd WHERE p.nama like '%$cari%' LIMIT $limit OFFSET $id_pengguna");
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        else return 0;
    }
    public function record_count_search($cari) {
        $condition = "p.nama like '%$cari%'";
        $this->db->where($condition);
        $this->db->join('skpd s', 'p.id_skpd=s.id_skpd');
        return $this->db->count_all_results('pengguna p');
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

    public function get_profiljoin($id) {
   //     $this->db->from('pengguna');
        $this->db->where('id_pengguna', $id);
        $query = $this->db->query("SELECT pengguna.id_pengguna, pengguna.username, pengguna.password, pengguna.level, pengguna.nama, 
            pengguna.alamat, pengguna.telepon, pengguna.handphone, pengguna.email, pengguna.keterangan, skpd.nama 
        FROM pengguna INNER JOIN skpd ON pengguna.id_skpd=skpd.id_skpd where pengguna.id_pengguna='$id';");
        return $query;
        }

	public function get_update_profil($id, $data) {
        $this->db->where('id_pengguna', $id);
        $this->db->update('pengguna', $data);

        $waktu=date("Y-m-d H:i:s");
        $this->db->query("UPDATE pengguna SET last_update='$waktu' where id_pengguna='$id'");

        return TRUE;
    }

    public function check_username_exist($username, $id)
    {
        $condition = "username = '$username' and id_pengguna != '$id'";
        $this->db->where($condition);
        $query=$this->db->get("pengguna");
        if($query->num_rows()>0){
            return true;
        }else{
            return false;
        }
    }
    
    public function get_update_pass($id, $data) {
        $this->db->query("UPDATE pengguna SET password='$data' where id_pengguna='$id'");
        return TRUE;
    }

    public function get_update_password($id, $data) { //buat ganti password di profil
        $this->db->query("UPDATE pengguna SET password='$data' where id_pengguna='$id'");
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

    public function get_profiladminjoin($id) {
   //     $this->db->from('pengguna');
        $this->db->where('id_pengguna', $id);
        $query = $this->db->query("SELECT pengguna.id_pengguna, pengguna.username, pengguna.password, pengguna.level, pengguna.nama, 
            pengguna.alamat, pengguna.telepon, pengguna.handphone, pengguna.email, pengguna.keterangan, skpd.nama 
        FROM pengguna INNER JOIN skpd ON pengguna.id_skpd=skpd.id_skpd where pengguna.id_pengguna='$id';");
        return $query;
        }

	public function get_update_profiladmin($id, $data) {
        $this->db->where('id_pengguna', $id);
        $this->db->update('pengguna', $data);

        $waktu=date("Y-m-d H:i:s");
        $this->db->query("UPDATE pengguna SET last_update='$waktu' where id_pengguna='$id'");

        return TRUE;
    }

}
