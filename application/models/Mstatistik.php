<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mstatistik extends CI_Model {

	function __construct()
    {
        parent::__construct();
        $this->load->database('default','true');
    }

//semua saran masuk
    public function saranmasuk()
    {
        $query=$this->db->query("SELECT COUNT(id_saran) AS jumlah_saran FROM `saran`");
        return $query->result();
    }

//saran yang spam
    public function saranspam()
    {
        $query=$this->db->query("SELECT COUNT(id_saran) AS jumlah_spam FROM `saran` where isSpam = 1");
        return $query->result();
    }

//saran yang bukan spam
    public function bukanspam()
    {
        $query=$this->db->query("SELECT COUNT(id_saran) AS bukan_spam FROM `saran` where isSpam = 0");
        return $query->result();
    }
    public function bukanspamp()
    {
        $query=$this->db->query("SELECT COUNT(id_saran) AS bukan_spamp FROM `saran` where isSpam = 0");
        return $query->result();
    }
    public function bukanspamd()
    {
        $query=$this->db->query("SELECT COUNT(id_saran) AS bukan_spamd FROM `saran` where isSpam = 0");
        return $query->result();
    }

//saran yang di publish
    public function saranpublish()
    {
        $query=$this->db->query("SELECT COUNT(id_saran) AS saran_publish FROM `saran` where isSpam = 0 and isAktif = 1");
        return $query->result();
    }

//saran yang belum di publish
    public function belumpublish()
    {
        $query=$this->db->query("SELECT COUNT(id_saran) AS belum_publish FROM `saran` where isSpam = 0 and isAktif = 0");
        return $query->result();
    }

//saran yang sudah di disposisi
    public function sarandisposisi()
    {
        $query=$this->db->query("SELECT COUNT(id_saran) AS saran_disposisi FROM `saran` where isSpam = 0 and isStatus = 'disposisi' or isSpam = 0 and isStatus = 'respon baru'");
        return $query->result();
    }
    public function belumdisposisi()
    {
        $query=$this->db->query("SELECT COUNT(id_saran) AS belum_disposisi FROM `saran` where isSpam = 0 and isStatus = 'laporan baru'");
        return $query->result();
    }

    public function detailsaran($tahun, $bulan)
    {
        $query=$this->db->query("SELECT nama, alamat, saran, tanggal_saran, isSpam FROM `saran` WHERE MONTH(tanggal_saran) = '$bulan' AND YEAR(tanggal_saran) = '$tahun' order by isSpam;");
        return $query->result();
    } 

    public function saranmasukbulan($tahun, $bulan)
    {
        $query=$this->db->query("SELECT COUNT(id_saran) AS jumlah_saran FROM `saran` WHERE MONTH(tanggal_saran) = '$bulan' AND YEAR(tanggal_saran) = '$tahun' order by isSpam;");
        return $query->result();
    }

 //   public function bukanspambulan($tahun, $bulan)
 //   {
 //       $query=$this->db->query("SELECT COUNT(id_saran) AS bukan_spam FROM `saran` where isSpam = 0 WHERE MONTH(tanggal_saran) = '$bulan' AND YEAR(tanggal_saran) = '$tahun'");
 //       return $query->result();
 //   }

 //   public function saranspambulan($tahun, $bulan)
 //   {
 //       $query=$this->db->query("SELECT COUNT(id_saran) AS jumlah_spam FROM `saran` where isSpam = 1 WHERE MONTH(tanggal_saran) = '$bulan' AND YEAR(tanggal_saran) = '$tahun'");
  //      return $query->result();
 //   }   
    
    public function detailpublish()
    {
        $query=$this->db->query("SELECT nama, alamat, saran, tanggal_saran, isAktif FROM `saran` where isSpam = '0' ORDER BY isAktif desc, tanggal_saran DESC");
        return $query->result();
    }

    public function smperbulan($tahun, $bulan)
    {
        $query=$this->db->query("SELECT nama, alamat, saran, tanggal_saran, isSpam FROM `saran` WHERE MONTH(tanggal_saran) = '$bulan' AND YEAR(tanggal_saran) = '$tahun';");
        return $query->result();
    }

    public function tb_smperbulan($tahun, $bulan)
    {
        $query=$this->db->query("SELECT DISTINCT MONTH(j.`tanggal_saran`) AS bulan, YEAR(j.`tanggal_saran`) AS tahun
            FROM `saran` j
            WHERE MONTH(j.`tanggal_saran`) = '$bulan' AND YEAR(j.`tanggal_saran`) = '$tahun';");
        return $query->result();
    }
public function disposisiskpd()
    {
        $query=$this->db->query("SELECT skpd.`id_skpd` as id, skpd.`nama` as skpd, COUNT(respon.`id_respon`) as jumlah_pesan
        FROM respon INNER JOIN skpd ON respon.`id_skpd`=skpd.`id_skpd` 
        GROUP BY skpd.`nama`");
        return $query->result();
    }
public function responskpd($bln,$thn){
        $query=$this->db->query("SELECT  DISTINCT respon.`id_skpd` as id, COUNT(respon.`id_respon`) AS jumlah_balas 
            FROM respon INNER JOIN skpd ON respon.`id_skpd`=skpd.`id_skpd`
            WHERE MONTH(respon.`tanggal_respon`)='$bln' AND YEAR(respon.`tanggal_respon`)='$thn'
            GROUP BY skpd.`nama` ORDER BY skpd.`id_skpd`");
        return $query->result();
    }
    public function responskpd_(){
        $query=$this->db->query("SELECT  DISTINCT respon.`id_skpd` as id, COUNT(respon.`id_respon`) AS jumlah_balas 
            FROM respon INNER JOIN skpd ON respon.`id_skpd`=skpd.`id_skpd`
            WHERE respon.`tanggal_respon` IS NOT NULL
            GROUP BY skpd.`nama` ORDER BY skpd.`id_skpd`");
        return $query->result();
    }
}
?>