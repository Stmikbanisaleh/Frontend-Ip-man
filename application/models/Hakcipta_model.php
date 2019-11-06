<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hakcipta_model extends CI_Model
{
    public function getHakcipta()
    {
        $query = "SELECT `mshakcipta`.*,`msrev`.`NAMA_REV`
        FROM `msrev` 
        JOIN `mshakcipta` ON `msrev`.`ID` = `mshakcipta`.`UNIT_KERJA`
        WHERE `mshakcipta`.`status` = 21";
        return $this->db->query($query)->result_array();
    }

    public function getHakciptaById($id)
    {
        $query = "SELECT `mshakcipta`.*,
                        (SELECT 
                            NAMA_REV
                        FROM
                            msrev
                        WHERE
                            ID = `mshakcipta`.`UNIT_KERJA`) as SATUAN_KERJA,
                        (SELECT 
                            NAMA_REV
                        FROM
                            msrev
                        WHERE
                            ID = `mshakcipta`.`STATUS`) as STATUS,
                        (SELECT 
                            NAMA_REV
                        FROM
                            msrev
                        WHERE
                            ID = `mshakcipta`.`OBJECT`) as JENIS_CIPTAAN
                            FROM `mshakcipta`
        WHERE `mshakcipta`.`id` =$id";
        return $this->db->query($query)->row_array();
    }

    public function getInventor()
    {
        $query = "SELECT `dhakcipta`.*,`mspegawai`.`NIK`,`mspegawai`.`NAMA`
        FROM `dhakcipta`
        JOIN `mspegawai` ON `dhakcipta`.`NIK` = `mspegawai`.`NIK`
        UNION
        SELECT `dhakcipta`.*,`msnonpegawai`.`NIK`,`msnonpegawai`.`NAMA`
        FROM `dhakcipta`
        JOIN `msnonpegawai` ON `dhakcipta`.`NIK` = `msnonpegawai`.`NIK`
        ";
        return $this->db->query($query)->result_array();
    }

    public function getInventorById($id)
    {
        $query = "SELECT `dhakcipta`.*,`mspegawai`.`NIK`,`mspegawai`.`NAMA`
        FROM `dhakcipta`
        JOIN `mspegawai` ON `dhakcipta`.`NIK` = `mspegawai`.`NIK`
        WHERE `dhakcipta`.`ID_HAKCIPTA` = $id
        UNION
        SELECT `dhakcipta`.*,`msnonpegawai`.`NIK`,`msnonpegawai`.`NAMA`
        FROM `dhakcipta`
        JOIN `msnonpegawai` ON `dhakcipta`.`NIK` = `msnonpegawai`.`NIK`
        WHERE `dhakcipta`.`ID_HAKCIPTA` = $id
        ";
        return $this->db->query($query)->result_array();
    }

    public function getDocumentByCode($code)
    {
        $query = "SELECT * FROM msdokumen WHERE ROLE = 1 AND SIZE > 0 AND NOMOR_PENDAFTAR='$code'";
        return $this->db->query($query)->result_array();
    }

    function getJumlahHakcipta()
    {
        $query = $this->db->query("SELECT YEAR(TGL_INPUT) as tahun,count(*) as total FROM mshakcipta WHERE `status` = 21 GROUP BY YEAR(TGL_INPUT)");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
}
