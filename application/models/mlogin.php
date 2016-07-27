<?php

class mlogin extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database('default','true');
    }
    
    public function logindinas($username, $password)
    {
        $query=$this->db->query("SELECT * FROM `admin` WHERE username='$username' and password='$password' and level='skpd'");
        return $query->result();
    }

    public function loginadmin($username, $password)
    {
        $query=$this->db->query("SELECT * FROM `admin` WHERE username='$username' and password='$password' and level='Humas'");
        return $query->result();
    }

}
?>