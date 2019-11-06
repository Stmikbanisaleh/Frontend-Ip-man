<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Desain_model extends CI_Model
{

    public function getDesain()
    {
        $query = "SELECT `msdesainindustri`.*,`msrev`.`NAMA_REV`
            FROM `msrev` 
            JOIN `msdesainindustri` ON `msrev`.`ID` = `msdesainindustri`.`UNIT_KERJA`
            WHERE `msdesainindustri`.`status` = 21";
        return $this->db->query($query)->result_array();
    }

    public function getDesainById($id)
    {
        $query = "SELECT `msdesainindustri`.*,
                            (SELECT 
                                NAMA_REV
                            FROM
                                msrev
                            WHERE
                                ID = `msdesainindustri`.`UNIT_KERJA`) as SATUAN_KERJA,
                            (SELECT 
                                NAMA_REV
                            FROM
                                msrev
                            WHERE
                                ID = `msdesainindustri`.`STATUS`) as STATUS
                                FROM `msdesainindustri`
        WHERE `msdesainindustri`.`ID` =$id
        ";
        return $this->db->query($query)->row_array();
    }

    public function getPendesain()
    {
        $query = "SELECT `ddesainindustri`.*,`mspegawai`.`NIK`,`mspegawai`.`NAMA`
        FROM `ddesainindustri`
        JOIN `mspegawai` ON `ddesainindustri`.`NIK` = `mspegawai`.`NIK`
        UNION
        SELECT `ddesainindustri`.*,`msnonpegawai`.`NIK`,`msnonpegawai`.`NAMA`
        FROM `ddesainindustri`
        JOIN `msnonpegawai` ON `ddesainindustri`.`NIK` = `msnonpegawai`.`NIK`
        ";
        return $this->db->query($query)->result_array();
    }

    public function getPendesainById($id)
    {
        $query = "SELECT `ddesainindustri`.*,`mspegawai`.`NIK`,`mspegawai`.`NAMA`
        FROM `ddesainindustri`
        JOIN `mspegawai` ON `ddesainindustri`.`NIK` = `mspegawai`.`NIK`
        WHERE `ddesainindustri`.`ID_DESAIN_INDUSTRI` = $id
        UNION
        SELECT `ddesainindustri`.*,`msnonpegawai`.`NIK`,`msnonpegawai`.`NAMA`
        FROM `ddesainindustri`
        JOIN `msnonpegawai` ON `ddesainindustri`.`NIK` = `msnonpegawai`.`NIK`
        WHERE `ddesainindustri`.`ID_DESAIN_INDUSTRI` = $id
        ";
        return $this->db->query($query)->result_array();
    }

    public function getDocumentByCode($code)
    {
        $query = "SELECT * FROM msdokumen WHERE ROLE = 1 AND SIZE > 0 AND NOMOR_PENDAFTAR='$code'";
        return $this->db->query($query)->result_array();
    }

    function getJumlahDesain()
    {
        $query = $this->db->query("SELECT YEAR(TGL_INPUT) as tahun,count(*) as total from msdesainindustri WHERE `status` = 21 GROUP BY YEAR(TGL_INPUT)");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
}
