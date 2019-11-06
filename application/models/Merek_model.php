<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Merek_model extends CI_Model
{
    public function getMerek()
    {
        $query = "SELECT `msmerek`.*,`msrev`.`NAMA_REV`
            FROM `msrev` 
            JOIN `msmerek` ON `msrev`.`ID` = `msmerek`.`UNIT_KERJA`
            WHERE `msmerek`.`status` = 21";
        return $this->db->query($query)->result_array();
    }

    public function getMerekById($id)
    {
        $query = "SELECT `msmerek`.*,
                            (SELECT 
                                NAMA_REV
                            FROM
                                msrev
                            WHERE
                                ID = `msmerek`.`UNIT_KERJA`) as SATUAN_KERJA,
                            (SELECT 
                                NAMA_REV
                            FROM
                                msrev
                            WHERE
                                ID = `msmerek`.`STATUS`) as STATUS
                                FROM `msmerek`
        WHERE `msmerek`.`id` =$id";
        return $this->db->query($query)->row_array();
    }

    public function getInventor()
    {
        $query = "SELECT `dmerek`.*,`mspegawai`.`NIK`,`mspegawai`.`NAMA`
        FROM `dmerek`
        JOIN `mspegawai` ON `dmerek`.`NIK` = `mspegawai`.`NIK`
        UNION
        SELECT `dmerek`.*,`msnonpegawai`.`NIK`,`msnonpegawai`.`NAMA`
        FROM `dmerek`
        JOIN `msnonpegawai` ON `dmerek`.`NIK` = `msnonpegawai`.`NIK`
        ";
        return $this->db->query($query)->result_array();
    }

    public function getInventorById($id)
    {
        $query = "SELECT `dmerek`.*,`mspegawai`.`NIK`,`mspegawai`.`NAMA`
        FROM `dmerek`
        JOIN `mspegawai` ON `dmerek`.`NIK` = `mspegawai`.`NIK`
        WHERE `dmerek`.`ID_MEREK` = $id
        UNION
        SELECT `dmerek`.*,`msnonpegawai`.`NIK`,`msnonpegawai`.`NAMA`
        FROM `dmerek`
        JOIN `msnonpegawai` ON `dmerek`.`NIK` = `msnonpegawai`.`NIK`
        WHERE `dmerek`.`ID_MEREK` = $id
        ";
        return $this->db->query($query)->result_array();
    }

    public function getDocumentByCode($code)
    {
        $query = "SELECT * FROM msdokumen WHERE ROLE = 1 AND SIZE > 0 AND NOMOR_PENDAFTAR='$code'";
        return $this->db->query($query)->result_array();
    }

    function getJumlahMerek()
    {
        $query = $this->db->query("SELECT YEAR(TGL_INPUT) as tahun,count(*) as total from msmerek WHERE `status` = 21 GROUP BY YEAR(TGL_INPUT)");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
}
