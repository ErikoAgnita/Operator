<?php

class mlogin extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database('default','true');
    }
    
/*    public function logindinas($username, $password)
    {
        $query=$this->db->query("SELECT * FROM `admin` WHERE username='$username' and password='$password' and level='skpd'");
        return $query->result();
    }

    public function loginadmin($username, $password)
    {
        $query=$this->db->query("SELECT * FROM `admin` WHERE username='$username' and password='$password' and level='Humas'");
        return $query->result();
    }
*/
    
    public function loginoperator($username, $password)
    {
        date_default_timezone_set("Asia/Jakarta");
        $this->db->select('username, password, id_pengguna, id_skpd, level, nama, alamat, telepon, handphone, email, keterangan');
        $this->db->from('pengguna');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->where('isAktif =', '1');
        $this->db->where('level =', 'operator');
        $waktu=date("Y-m-d H:i:s");
        $this->db->query("UPDATE pengguna SET last_login='$waktu' where username='$username' and password='$password' and isAktif = '1'"); //last login

        $query = $this->db->get();
        $idid = $query->result();

        if($query->num_rows() == 1){
           $newdata = array(
            'username'  => $username,
            'passid' => $idid[0]->password,
            'userid' => $idid[0]->id_pengguna,
            'userid_skpd' => $idid[0]->id_skpd,
            /*'opeku' => $idid[0]->kode_unit,*/
            'level' => $idid[0]->level, 
            'name' => $idid[0]->nama,
            /*'opealamat' => $idid[0]->alamat,
            'opetelp' => $idid[0]->telepon,
            'opehand' => $idid[0]->handphone,
            'opeemail' => $idid[0]->email,
            'opeket' => $idid[0]->keterangan,*/
            'logged_in' => true
            );
            $this->session->set_userdata($newdata);
            return true;
        }
        else {
            return false;
        }
    }

    public function loginadmin($username, $password)
    {
        date_default_timezone_set("Asia/Jakarta");
        $this->db->select('username, password, id_pengguna, id_skpd, level, nama, alamat, telepon, handphone, email, keterangan');
        $this->db->from('pengguna');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->where('isAktif =', '1');
        $this->db->where('level =', 'admin');
        $waktu=date("Y-m-d H:i:s");
        $this->db->query("UPDATE pengguna SET last_login='$waktu' where username='$username' and password='$password' and isAktif = '1'"); //last login

        $query = $this->db->get();
        $idid = $query->result();

        if($query->num_rows() == 1){
            $newdata = array(
            'username'  => $username,
            'passid' => $idid[0]->password,
            'userid' => $idid[0]->id_pengguna,
            'userid_skpd' => $idid[0]->id_skpd,
            /*'adminku' => $idid[0]->kode_unit,*/
            'level' => $idid[0]->level, 
            'name' => $idid[0]->nama,
            /*'adminalamat' => $idid[0]->alamat,
            'admintelp' => $idid[0]->telepon,
            'adminhand' => $idid[0]->handphone,
            'adminemail' => $idid[0]->email,
            'adminket' => $idid[0]->keterangan,*/
            'logged_in' => true
            );
            $this->session->set_userdata($newdata);
            return true;
        }
        else {
            return false;
        }
    }
}
?>