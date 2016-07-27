<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PenggunaModel extends CI_Model {

	function __construct()
    {
        parent::__construct();
        $this->load->database('default','true');
    }

	public function GetAkun(){
		return $this->db->get('pengguna');
	}

	public function AddAkun($data){
		$this->db->insert('pengguna', $data);
	}
}
