<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paten_model extends CI_Model
{

    public function getPaten()
    {
        $query = "SELECT `mspaten`.*,`msrev`.`NAMA_REV`
            FROM `msrev` 
            JOIN `mspaten` ON `msrev`.`ID` = `mspaten`.`UNIT_KERJA`
            WHERE `mspaten`.`status` = 21";
        return $this->db->query($query)->result_array();
    }

    public function getPatenById($id)
    {
        $query = "SELECT `mspaten`.*,
                            (SELECT 
                                NAMA_REV
                            FROM
                                msrev
                            WHERE
                                ID = `mspaten`.`UNIT_KERJA`) as SATUAN_KERJA,
                            (SELECT 
                                NAMA_REV
                            FROM
                                msrev
                            WHERE
                                ID = `mspaten`.`STATUS`) as STATUS
                                FROM `mspaten`
        WHERE `mspaten`.`id` =$id";
        return $this->db->query($query)->row_array();
    }

    public function getInventor()
    {
        $query = "SELECT `dpaten`.*,`mspegawai`.`NIK`,`mspegawai`.`NAMA`
        FROM `dpaten`
        JOIN `mspegawai` ON `dpaten`.`NIK` = `mspegawai`.`NIK`
        UNION
        SELECT `dpaten`.*,`msnonpegawai`.`NIK`,`msnonpegawai`.`NAMA`
        FROM `dpaten`
        JOIN `msnonpegawai` ON `dpaten`.`NIK` = `msnonpegawai`.`NIK`
        ";
        return $this->db->query($query)->result_array();
    }

    public function getInventorById($id)
    {
        $query = "SELECT `dpaten`.*,`mspegawai`.`NIK`,`mspegawai`.`NAMA`
        FROM `dpaten`
        JOIN `mspegawai` ON `dpaten`.`NIK` = `mspegawai`.`NIK`
        WHERE `dpaten`.`ID_PATEN` = $id
        UNION
        SELECT `dpaten`.*,`msnonpegawai`.`NIK`,`msnonpegawai`.`NAMA`
        FROM `dpaten`
        JOIN `msnonpegawai` ON `dpaten`.`NIK` = `msnonpegawai`.`NIK`
        WHERE `dpaten`.`ID_PATEN` = $id
        ";
        return $this->db->query($query)->result_array();
    }

    public function getDocumentByCode($code)
    {
        $query = "SELECT * FROM msdokumen WHERE ROLE = 1 AND SIZE > 0 AND NOMOR_PENDAFTAR='$code'";
        return $this->db->query($query)->result_array();
    }

    function getJumlahPaten()
    {
        $query = $this->db->query("SELECT YEAR(TGL_INPUT) as tahun,count(*) as total from mspaten WHERE `status` = 21 GROUP BY YEAR(TGL_INPUT) ");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
}
