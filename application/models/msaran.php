<?php
 
class msaran extends CI_Model {
 
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function balasan() {
        $this->db->select('isi_respon, tanggal_respon, lampiran_respon, respon.id_saran as rid_saran, skpd.nama as snama');    
        $this->db->from('respon');
        $this->db->where('respon.IsAktif','1');
        $this->db->join('skpd', 'respon.id_skpd = skpd.id_skpd');
        $this->db->order_by('tanggal_respon','asc');
        $query = $this->db->get();  
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        else return 0;
    }
    
    function preview_asp(){
        $query = $this->db->query("SELECT * FROM saran WHERE isAktif = 1 and isSpam=0 and lampiran_saran IS NOT NULL ORDER BY id_saran ASC LIMIT 15"); 
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        else return 0;
    }
    
    function ambil_id() {
        $query = $this->db->query("SELECT id_saran FROM saran ORDER BY id_saran DESC LIMIT 1");
        //return $query->result();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        else return 0;
    }
    
    function kirim_saran($data){
        $this->db->reconnect();
        $this->db->insert('saran',$data);
       
        return TRUE;
    }
    public function record_count() {
        $this->db->where('IsAktif','1');
        $this->db->where('isSpam', '0');
        return $this->db->count_all_results('saran');
    }
    public function fetch_data($limit, $id) {
        $this->db->where('IsAktif','1');
        $this->db->where('isSpam', '0');
        $this->db->limit($limit, $id);
        $this->db->order_by('id_saran','desc');
        //$query = $this->db->query("SELECT * FROM respon INNER JOIN saran ON respon.ID_SARAN=saran.ID_SARAN");
        $query = $this->db->get('saran');
        return $query;
    }
    
    //search di masyarakat
    function pencarian($cari, $limit, $id){
        
        $query = $this->db->query("SELECT * FROM saran WHERE IsAktif = '1' and IsSpam = '0' and (nama LIKE '%$cari%' or topik LIKE '%$cari%' or saran LIKE '%$cari%') order by id_saran desc LIMIT $limit OFFSET $id");
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        else return 0;
    }
    public function record_count_search($cari) {
        $condition = "IsAktif = '1' and IsSpam = '0' and (nama LIKE '%$cari%' or topik LIKE '%$cari%' or saran LIKE '%$cari%')";
        $this->db->where($condition);
        return $this->db->count_all_results('saran');
            //return $query->result();
    }

    //search di operator
    function pencarianop($cari, $limit, $id){
        
        $query = $this->db->query("SELECT id_saran as sis,nama,saran,alamat,tanggal_saran,topik,isSpam, isAktif as sia FROM saran WHERE IsSpam = '0' and (nama LIKE '%$cari%' or topik LIKE '%$cari%' or saran LIKE '%$cari%') LIMIT $limit OFFSET $id");
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        else return 0;
    }
    public function record_count_searchop($cari) {
        $condition = "IsSpam = '0' and (nama LIKE '%$cari%' or topik LIKE '%$cari%' or saran LIKE '%$cari%')";
        $this->db->where($condition);
        return $this->db->count_all_results('saran');
            //return $query->result();
    }
    //Admin

    function lihat_saran()
    {
        $query = $this->db->query("SELECT * FROM saran order by tanggal_saran desc");
        return $query;
    }

    //sadbsajhd
    public function record_count_saran() {
        return $this->db->count_all('saran');
    }

    public function record_count_respon()
    {
        $this->db->select('id_respon');
        $this->db->from('respon');
        $this->db->where('isi_respon IS NOT NULL');
        $this->db->where('isAktif', 0);
        $num_results = $this->db->count_all_results();
        return $num_results;
    }

    //adhgasj
    public function fetch_data_saran($limit, $id) {
        $this->db->limit($limit, $id);
        $this->db->order_by('id_saran','desc');
        $query = $this->db->get('saran');
        return $query;
    }

    public function fetch_data_balasan()
    {
        $this->db->distinct();
        $this->db->select('respon.id_respon, respon.id_saran, respon.id_skpd, skpd.nama, skpd.kodeUnit');
        $this->db->from('respon');
        $this->db->join('skpd', 'skpd.id_skpd=respon.id_skpd');
        $this->db->group_by('id_skpd');
        $this->db->group_by('id_saran');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        else return 0;
    }

    public function fetch_data_dibalas()
    {
        $this->db->distinct();
        $this->db->select('respon.id_respon, respon.id_saran, respon.isi_respon, respon.id_skpd, skpd.nama, skpd.kodeUnit');
        $this->db->from('respon');
        $this->db->where('respon.isi_respon IS NOT NULL');
        $this->db->join('skpd', 'skpd.id_skpd=respon.id_skpd');
        $this->db->group_by('id_skpd');
        $this->db->group_by('id_saran');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        else return 0;
    }

   public function fetch_data_respon($limit, $id)
    {
        $this->db->select('respon.id_respon, skpd.nama, respon.id_saran, respon.kategori, respon.isi_respon, 
            respon.tanggal_respon, respon.isAktif, respon.tanggal_disposisi');
        $this->db->from('respon');
        $this->db->where('respon.isi_respon IS NOT NULL');
        $this->db->where('respon.isAktif', 0);
        $this->db->join('skpd', 'respon.id_skpd=skpd.id_skpd');
        $this->db->limit($limit, $id);
        $this->db->order_by('id_respon', 'desc');
        $query = $this->db->get();
        return $query;
    }

    

    //search di admin
    function pencarian_saran($cari, $limit, $id){
        
        $query = $this->db->query("SELECT * FROM saran WHERE nama LIKE '%$cari%' or topik LIKE '%$cari%' or saran LIKE '%$cari%' order by tanggal_saran desc LIMIT $limit OFFSET $id");
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        else return 0;
    }
    public function record_count_search_saran($cari) {
        $condition = "(nama LIKE '%$cari%' or topik LIKE '%$cari%' or saran LIKE '%$cari%')";
        $this->db->where($condition);
        return $this->db->count_all_results('saran');
            //return $query->result();
    }

    function detail_saran($id_saran)
    {
        $this->db->select('*');
        $this->db->where('id_saran', $id_saran);
        $query = $this->db->get('saran');
        return $query;
    }

    function respon($id_saran)
    {
        $this->db->where('id_saran', $id_saran);
        $query = $this->db->query("SELECT respon.id_respon, respon.id_saran , respon.kategori, 
            respon.isi_respon, respon.lampiran_respon, respon.tanggal_respon, respon.isAktif, skpd.nama , respon.tanggal_disposisi
            FROM respon INNER JOIN skpd ON respon.id_skpd=skpd.id_skpd AND respon.id_saran=$id_saran order by respon.tanggal_respon asc;");
        return $query;
    }
    
    function getSaran($id_saran)
    {
        $this->db->where('id_saran', $id_saran);
        $query = $this->db->get('saran');
        return $query;
    }

    function ubah_saran($id_saran, $data)
    {
        $this->db->where("id_saran", $id_saran);
        $this->db->update('saran', $data);
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
        $this->db->select('*');
        $this->db->from('skpd');
        $this->db->order_by('kodeUnit', 'asc');
        $query = $this->db->get();
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
?>