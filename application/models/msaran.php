<?php
 
class msaran extends CI_Model {
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function balasan() {
        $this->db->select('isi_respon, tanggal_respon, respon.id_saran as rid_saran, skpd.nama as snama');    
        $this->db->from('respon');
        $this->db->join('skpd', 'respon.id_skpd = skpd.id_skpd');
        $query = $this->db->get();  
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        else return 0;
    }
    
    function preview_asp(){
        $query = $this->db->query("SELECT * FROM saran WHERE isAktif = 1 and lampiran_saran IS NOT NULL ORDER BY id_saran ASC"); 
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        else return 0;
    }
    
    function ambil_id() {
        $query = $this->db->query("SELECT id_saran FROM saran ORDER BY id_saran DESC LIMIT 1");
        //return $query->result();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        else return 0;
    }
    
    function kirim_saran($data){
        $this->db->reconnect();
        $this->db->insert('saran',$data);
       
        return TRUE;
    }
    public function record_count() {
        $this->db->where('IsAktif','1');
        return $this->db->count_all_results('saran');
    }
    public function fetch_data($limit, $id) {
        $this->db->where('IsAktif','1');
        $this->db->limit($limit, $id);
        $this->db->order_by('id_saran','desc');
        //$query = $this->db->query("SELECT * FROM respon INNER JOIN saran ON respon.ID_SARAN=saran.ID_SARAN");
        $query = $this->db->get('saran');
        return $query;
    }
    
    function pencarian($cari, $limit, $id){
        
        $query = $this->db->query("SELECT * FROM saran WHERE IsAktif = '1' and (nama LIKE '%$cari%' or topik LIKE '%$cari%' or saran LIKE '%$cari%') LIMIT $limit OFFSET $id");
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        else return 0;
    }
    public function record_count_search($cari) {
        $condition = "IsAktif = '1' and (nama LIKE '%$cari%' or topik LIKE '%$cari%' or saran LIKE '%$cari%')";
        $this->db->where($condition);
        return $this->db->count_all_results('saran');
            //return $query->result();
    }
    /*function hapus_produk($id)       
    {
        $this->db->reconnect();
        $query=$this->db->query("DELETE FROM produk WHERE id_produk = '$id'");
        if($query){
            return 0;
        }else{
            return -1;
        }
    }*/

    
}
?>