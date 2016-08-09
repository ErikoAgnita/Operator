<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class clogin extends CI_Controller {
     
    function __construct()
    {
        parent::__construct();
        $this->load->model('mlogin');
        $this->load->model('mpengguna');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper(array('url','form'));
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function logout()
    {
        $this->load->view('logout');
        redirect('clogin');
    }

/*   public function masuk_login()
    {

        $username=$_POST['username'];
        $password=md5($_POST['password']);
        
        $cek = $this->mlogin->loginoperator($username,$password);
        $cek1 = $this->mlogin->loginadmin($username,$password);

        if (!empty($cek)) 
        {
            $user = $cek;

            $session_data = $this->session->userdata('masuk');//nama session
            $session_data['user'] = $user;
            $this->session->set_userdata("masuk", $session_data);
            $data['admin'] = $this->mpengguna->GetAkun();
       //     $this->load->view('dinas/header')->view('dinas/indexoperator', $data)->view('dinas/footer');
            redirect('cpengguna/indexoperator');
        }


        else if (!empty($cek1)) 
        {
            $user = $cek1;

            $session_data = $this->session->userdata('masuk');//nama session
            $session_data['user'] = $user;
            $this->session->set_userdata("masuk", $session_data);
            $data['admin'] = $this->mpengguna->GetAkun();
            redirect('csaran/lihat');
        }

        else
        {
            redirect('clogin/login');
        }
    
    }*/

    public function masuk_login() {
        $this->load->helper('security');
        $this->form_validation->set_rules('username','username','required');
        $this->form_validation->set_rules('password','password','required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
   
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $cek = $this->mlogin->loginoperator($username,$password);
        $cek1 = $this->mlogin->loginadmin($username,$password);

        if($this->form_validation->run() == false){
            $this->login();
        }
        else if (!empty($cek)){
             redirect('cpengguna/indexoperator');
        }
        else if (!empty($cek1)){
            redirect('csaran/lihat');
        }
        else{
            $this->session->set_flashdata("pesan","<div class=\"alert alert-danger\" id=\"alert\">Password atau Username Anda tidak sesuai<button href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
            $this->login();
        }
    }
}
?>