<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mrespon extends CI_Model 
{
	function __construct()
    {
        parent::__construct();
        $this->load->database('default','true');
    }

    function lihat_saran()
    {
        $query = $this->db->query("SELECT * FROM saran order by tanggal_saran desc");
        return $query;
    }
    
    function balas_respon($id_saran)
    {
    	$this->db->where('id_saran', $id_saran);
    	$query = $this->db->get('respon');
    	return $query;
    }

    function kirim_respon($id_respon, $data)
    {
    	$this->db->where('id_respon', $id_respon);
    	$this->db->update('respon', $data);
    }

    function respon_saran($id_saran, $data)
    {
    	$this->db->where('id_saran', $id_saran);
    	$this->db->update('saran', $data);
    }

    function publish($id_respon, $data)
    {
        $this->db->where('id_respon', $id_respon);
        $this->db->update('respon', $data);
    }
}