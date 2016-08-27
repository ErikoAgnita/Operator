<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cstatistik extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('mstatistik');
        $this->load->library(array('form_validation', 'session'));
    }

    public function saranmasuk()
    {
         $data['semua'] = $this->mstatistik->saranmasuk();
         $data['spam'] = $this->mstatistik->saranspam();
         $data['bukanspam'] = $this->mstatistik->bukanspam();
         $data['bukanspamp'] = $this->mstatistik->bukanspamp();                                    
         $data['publish'] = $this->mstatistik->saranpublish();
         $data['belumpublish'] = $this->mstatistik->belumpublish();                                    
         $this->load->view('humas/header')->view('humas/statistik/saranmasuk',$data)->view('humas/footer');
    }

    public function disposisi()
    {
    	 $data['bukanspamd'] = $this->mstatistik->bukanspamd();                                    
         $data['sarandisposisi'] = $this->mstatistik->sarandisposisi();                                    
         $data['belumdisposisi'] = $this->mstatistik->belumdisposisi();                                    
         $this->load->view('humas/header')->view('humas/statistik/disposisi',$data)->view('humas/footer');
    }

 //   public function detailsaran()
  //  {
  //       $data['detailsaran'] = $this->mstatistik->detailsaran();
   //      $this->load->view('humas/header')->view('humas/statistik/detailsaran',$data)->view('humas/footer');
  //  }

    public function detailpublish()
    {
         $data['detailpublish'] = $this->mstatistik->detailpublish();
         $this->load->view('humas/header')->view('humas/statistik/detailpublish',$data)->view('humas/footer');
    }

    public function pilihsmperbulan()
    {
         $this->load->view('humas/header')->view('humas/statistik/pilihsmperbulan')->view('humas/footer');
    }

    public function smperbulan()
    {
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan');
        $this->mstatistik->smperbulan($tahun, $bulan);
        $data['h'] = $this->mstatistik->smperbulan($tahun, $bulan);
        $data['diti'] = $this->mstatistik->tb_smperbulan($tahun,$bulan);               
  //  var_dump($data)
        $this->load->view('humas/header')->view('humas/statistik/smperbulan',$data)->view('humas/footer');
    }
 
    public function detailsaran()
    {
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan');
        $this->mstatistik->detailsaran($tahun, $bulan);
         $data['detailsaran'] = $this->mstatistik->detailsaran($tahun, $bulan);
                 $data['diti'] = $this->mstatistik->tb_smperbulan($tahun,$bulan); 
                         $data['smb'] = $this->mstatistik->saranmasukbulan($tahun,$bulan); 
           //            $data['bukanspambulan'] = $this->mstatistik->bukanspambulan($tahun,$bulan);                        
           //              $data['saranspambulan'] = $this->mstatistik->saranspambulan($tahun,$bulan);                                               
         $this->load->view('humas/header')->view('humas/statistik/detailsaran',$data)->view('humas/footer');
    }

    public function responskpd()
    {
        //$tahun = $this->input->post('tahun');
        //$bulan = $this->input->post('bulan');
         $data['semua'] = $this->mstatistik->disposisiskpd();
         $data['balas'] = $this->mstatistik->responskpd_();
         $this->load->view('humas/header')->view('humas/statistik/responskpd',$data)->view('humas/footer');
    }        
}
?>