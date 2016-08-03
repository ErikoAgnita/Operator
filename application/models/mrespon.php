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

    public function record_count() {
        $this->db->select('id_saran');
        $this->db->from('saran');
        $this->db->where('isSpam=1');
        $num_results = $this->db->count_all_results();
        return $num_results;
    }

    //adhgasj
    public function fetch_data($limit, $id) {
        $this->db->limit($limit, $id);
        $this->db->order_by('id_saran','desc');
        $query = $this->db->query('SELECT * FROM saran where isSpam=1');
        return $query;
    }
    
    function balas_respon($id_saran)
    {
    	$this->db->where('id_saran', $id_saran);
    	$query = $this->db->get('respon');
    	return $query;
    }

    function ambil_id() {
        $query = $this->db->query("SELECT id_respon FROM respon ORDER BY id_respon DESC LIMIT 1");
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        else return 0;
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
    function saran($id_saran)
    {
        $this->db->where('id_saran', $id_saran);
        $this->db->where('isSpam', '1');
        $query = $this->db->get('saran');
        return $query;
    }

    function respon($id_saran, $id_skpd)
    {
        $this->db->where('id_saran', $id_saran);
        $query = $this->db->query("SELECT respon.id_respon, respon.id_saran, respon.id_skpd, respon.kategori, 
            respon.isi_respon, respon.lampiran_respon, respon.tanggal_respon, skpd.nama 
            FROM respon INNER JOIN skpd ON respon.id_skpd=skpd.id_skpd AND respon.id_saran=$id_saran and 
            (respon.isAktif=1 or respon.id_skpd=$id_skpd)
            order by respon.tanggal_respon desc;");
        return $query;
    }

    function addRespon($data)
    {
        $this->db->insert('respon', $data);
    }

    function hapus_respon($id_respon)
    {
        $this->db->where("id_respon", $id_respon);
        $this->db->delete('respon');
    }
}