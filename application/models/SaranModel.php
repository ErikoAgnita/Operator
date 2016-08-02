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

    //sadbsajhd
    public function record_count() {
        return $this->db->count_all('saran');
    }

    //adhgasj
    public function fetch_data($limit, $id) {
        $this->db->limit($limit, $id);
        $this->db->order_by('id_saran','desc');
        $query = $this->db->get('saran');
        return $query;
    }

    function detail_saran($id_saran)
    {
        $this->db->where('id_saran', $id_saran);
        $query = $this->db->get('saran');
        //$query = $this->db->query("SELECT ")
        //$query = $this->db->query("SELECT * FROM respon INNER JOIN saran ON respon.id_saran=saran.id_saran");
        return $query;
    }

    function respon($id_saran)
    {
        $this->db->where('id_saran', $id_saran);
        $query = $this->db->query("SELECT respon.id_respon, respon.id_saran , respon.kategori, 
            respon.isi_respon, respon.lampiran_respon, respon.tanggal_respon, respon.isAktif, skpd.nama 
            FROM respon INNER JOIN skpd ON respon.id_skpd=skpd.id_skpd AND respon.id_saran=$id_saran order by respon.tanggal_respon desc;");
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

    function getskpd()
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

    function aktif_saran($id_saran, $data){
        $this->db->where("id_saran", $id_saran);
        $query = $this->db->update('saran', $data);
    }
}