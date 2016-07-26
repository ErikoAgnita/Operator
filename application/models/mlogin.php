<?php

class mlogin extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database('default','true');
    }
    
    public function logindinas($id_admin, $password)
    {
        $query=$this->db->query("SELECT * FROM `admin` WHERE id_admin='$id_admin' and password='$password' and level='skpd'");
        
        return $query->result();
    }

    public function loginadmin($id_admin, $password)
    {
        $query=$this->db->query("SELECT * FROM `admin` WHERE id_admin='$id_admin' and password='$password' and level='Humas'");
        
        return $query->result();
    }

}
?>