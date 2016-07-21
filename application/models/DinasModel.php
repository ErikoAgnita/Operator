<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DinasModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database('default','true');
    }

    function lihat_dinas()
    {
        $query = $this->db->get('dinas1');
        return $query;
    }

    function tambah_dinas($data)
    {
        $query = $this->db->insert('dinas1', $data);
    }

    function form_ubah_dinas($ID_DINAS)
    {
        $this->db->where("ID_DINAS1", $ID_DINAS);
        $query = $this->db->get('dinas1');
        return $query;
    }
}
?>