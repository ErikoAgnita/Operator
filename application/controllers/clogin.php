<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class clogin extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
     
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

        $id_admin=$_POST['id_admin'];
        $password=$_POST['password'];
        
        $cek = $this->mlogin->logindinas($id_admin,$password);
        $cek1 = $this->mlogin->loginadmin($id_admin,$password);

        if (!empty($cek)) 
        {
            $user = $cek;

            $session_data = $this->session->userdata('masuk');//nama session
            $session_data['user'] = $user;
            $this->session->set_userdata("masuk", $session_data);
            $data['admin'] = $this->madmin->GetAkun();
        $this->load->view('dinas/header')->view('dinas/index', $data)->view('dinas/footer');
        }


        else if (!empty($cek1)) 
        {
            $user = $cek1;

            $session_data = $this->session->userdata('masuk');//nama session
            $session_data['user'] = $user;
            $this->session->set_userdata("masuk", $session_data);
            $data['admin'] = $this->madmin->GetAkun();
        $this->load->view('humas/header')->view('humas/admin/lihat', $data)->view('humas/footer');
        }

        else
        {
            $this->load->view('login');
        }
    
    }
}
?>