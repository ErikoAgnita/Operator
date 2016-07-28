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

    function detail_saran($id_saran)
    {
        $this->db->where('id_saran', $id_saran);
        $query = $this->db->get('saran');
        //$query = $this->db->query("SELECT * FROM respon INNER JOIN saran ON respon.id_saran=saran.id_saran");
        return $query;
    }

    function respon($id_saran)
    {
        $this->db->where('id_saran', $id_saran);
        $query = $this->db->get('respon');
        //$query = $this->db->query("SELECT * FROM respon INNER join skpd ")
        return $query;
    }

    //belum bisa
    function saran_respon($id_saran)
    {
        $this->db->where('id_saran', $id_saran);
        $query = $this->db->query("SELECT * FROM respon INNER JOIN saran ON respon.id_saran=saran.id_saran");
        return $query;
    }

    function ubah_saran($id_saran)
    {
        $this->db->where('id_saran', $id_saran);
        $query = $this->db->get('saran');
        return $query;
    }

    function update_saran($id_saran, $data)
    {
        $this->db->where("id_saran", $id_saran);
        $this->db->update('saran', $data);
    }

    function hapus_saran($id_saran)
    {
        $this->db->where("id_saran", $id_saran);
        $this->db->delete('saran');
    }

    function disposisi_saran()
    {
        $query = $this->db->get('skpd');
        return $query;
    }

    function skpd($id_skpd)
    {
        $this->db->where('id_skpd', $id_skpd);
        $query = $this->db->query("SELECT nama from skpd where skpd.id_skpd=$id_skpd");
        return $query;
    }

    function disposisikan_saran($id_saran, $data)
    {
        $this->db->where("id_saran", $id_saran);
        $query = $this->db->update('saran', $data);
    }

    function addRespon($data)
    {
        $this->db->insert('respon', $data);
    }

    function publish_saran($id_saran, $data)
    {
        $this->db->where("id_saran", $id_saran);
        $query = $this->db->update('saran', $data);
    }
}