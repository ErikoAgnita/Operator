<?php
 
class msaran extends CI_Model {
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function list_saran() {
        $query = $this->db->get('saran');  
        return $query->result();
    }
    
    function ambil_id() {
        $query = $this->db->query("SELECT id_saran FROM saran ORDER BY id_saran DESC LIMIT 1");
        return $query->result();
    }
    
    function kirim_saran($data){
        $this->db->reconnect();
        $this->db->insert('saran',$data);
       
        return TRUE;
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