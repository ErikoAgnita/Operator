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
        $query = $this->db->query("SELECT * FROM saran order by tanggal_saran desc");
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

    function pencarian($cari, $limit, $id){
        
        $query = $this->db->query("SELECT * FROM saran WHERE IsAktif = '1' and (nama LIKE '%$cari%' or topik LIKE '%$cari%' or saran LIKE '%$cari%') LIMIT $limit OFFSET $id");
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        else return 0;
    }
    public function record_count_search($cari) {
        $condition = "IsAktif = '1' and (nama LIKE '%$cari%' or topik LIKE '%$cari%' or saran LIKE '%$cari%')";
        $this->db->where($condition);
        return $this->db->count_all_results('saran');
            //return $query->result();
    }

    function detail_saran($id_saran)
    {
        $this->db->where('id_saran', $id_saran);
        $query = $this->db->get('saran');
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

    function cekDisposisi($id_saran, $id_skpd)
    {
        $query = $this->db->query("SELECT * from respon where respon.id_skpd=$id_skpd and respon.id_saran=$id_saran");
        return $query;
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