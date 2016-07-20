<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DinasController extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('DinasModel');
	}

	public function lihat()
	{
		$data['h'] = $this->DinasModel->lihat_dinas();
    	$this->load->view('humas/header')->view('humas/dinas/lihat', $data)->view('humas/footer');
	}
	public function tabel()
	{
		$this->load->view('humas/dinas/data');
	}
}
