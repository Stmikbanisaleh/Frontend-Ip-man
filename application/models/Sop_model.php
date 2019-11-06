<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sop_model extends CI_Model
{
    public function getSop()
    {
        $query = "SELECT * FROM sop";
        return $this->db->query($query)->result_array();
    }
}
