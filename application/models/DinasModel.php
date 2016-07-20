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
        $query = $this->db->get('dinas');
        return $query;
    }
}
?>