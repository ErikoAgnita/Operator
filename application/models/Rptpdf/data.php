<?php
class Data extends CI_Model {
    //put your code here
    function __construct(){
        parent::__construct();
    }
    
    function select_data($id_saran) {
        $this->db->where('id_saran', $id_saran);
        $query = $this->db->get('saran');
        return $query->result();
        
        //var_dump($query);
    }
}