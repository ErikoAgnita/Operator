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
        return $this->db->count_all('saran');
    }
    public function fetch_data($limit, $id) {
        //$this->db->where('IsAktif','1');
        $this->db->limit($limit, $id);
        $this->db->order_by('id_saran','desc');
        //$query = $this->db->query("SELECT * FROM respon INNER JOIN saran ON respon.ID_SARAN=saran.ID_SARAN");
        $query = $this->db->get('saran');
        /*if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;*/
        return $query;
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