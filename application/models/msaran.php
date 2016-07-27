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
    
    function preview_asp(){
        $query = $this->db->query("SELECT * FROM saran WHERE lampiran_saran IS NOT NULL ORDER BY id_saran ASC");
         
        if ($query->num_rows() > 0) {
            return $query->result();
        }
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
        $this->db->limit($limit, $id);
        $this->db->order_by('id_saran','desc');
        //$this->db->where('id_saran', $id);
        $query = $this->db->get('saran');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
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