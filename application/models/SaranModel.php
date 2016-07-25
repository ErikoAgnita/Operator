<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SaranModel extends CI_Model 
{
	function __construct()
    {
        parent::__construct();
        $this->load->database('default','true');
    }

    function lihat_saran()
    {
        $query = $this->db->get('saran');
        return $query;
    }

    function detail_saran($ID_SARAN)
    {
        $this->db->where('ID_SARAN', $ID_SARAN);
        $query = $this->db->get('saran');
        //$query = $this->db->query("SELECT * FROM respon INNER JOIN saran ON respon.ID_SARAN=saran.ID_SARAN");
        return $query;
    }

    function saran_respon($ID_SARAN)
    {
        $this->db->where('ID_SARAN', $ID_SARAN);
        $query = $this->db->query("SELECT * FROM respon INNER JOIN saran ON respon.ID_SARAN=saran.ID_SARAN");
        return $query;
    }

    function ubah_saran($ID_SARAN)
    {
        $this->db->where('ID_SARAN', $ID_SARAN);
        $query = $this->db->get('saran');
        return $query;
    }

    function update_saran($ID_SARAN, $data)
    {
        $this->db->where("ID_SARAN", $ID_SARAN);
        $this->db->update('saran', $data);
    }

    function hapus_saran($ID_SARAN)
    {
        $this->db->where("ID_SARAN", $ID_SARAN);
        $this->db->delete('saran');
    }

    function disposisi_saran()
    {
        $query = $this->db->get('admin');
        return $query;
    }

    function disposisikan_saran($ID_SARAN)
    {
        $this->db->where("ID_SARAN", $ID_SARAN);
        $query = $this->db->update('saran');
    }
}