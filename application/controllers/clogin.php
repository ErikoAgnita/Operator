<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class clogin extends CI_Controller {
     
    function __construct()
    {
        parent::__construct();
        $this->load->model('mlogin');
        $this->load->model('madmin');
        $this->load->library('session');
    }

    public function login()
    {
        $this->load->view('login');
    }

    public function logout_dinas()
    {
        $this->load->view('dinas/logout');
    }

    public function masuk_login()
    {

        $username=$_POST['username'];
        $password=$_POST['password'];
        
        $cek = $this->mlogin->logindinas($username,$password);
        $cek1 = $this->mlogin->loginadmin($username,$password);

        if (!empty($cek)) 
        {
            $user = $cek;

            $session_data = $this->session->userdata('masuk');//nama session
            $session_data['user'] = $user;
            $this->session->set_userdata("masuk", $session_data);
            $data['admin'] = $this->madmin->GetAkun();
            $this->load->view('dinas/header')->view('dinas/index', $data)->view('dinas/footer');
            //redirect('SaranController/lihat');
        }


        else if (!empty($cek1)) 
        {
            $user = $cek1;

            $session_data = $this->session->userdata('masuk');//nama session
            $session_data['user'] = $user;
            $this->session->set_userdata("masuk", $session_data);
            $data['admin'] = $this->madmin->GetAkun();
            redirect('SaranController/lihat');
        }

        else
        {
            $this->load->view('login');
        }
    
    }
}
?>