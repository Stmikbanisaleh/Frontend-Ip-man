<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Merek extends CI_Controller
{

    public function index()
    {
        $data['user'] = $this->db->get_where('msuser', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('Merek_model', 'merek');
        $data['getMerek'] = $this->merek->getMerek();
        foreach ($data['getMerek'] as $gm) {
            $idm = $gm['ID'];
            $data['getInventor'] = $this->merek->getInventor($idm);
        }
        $data['jumlahMerek'] = $this->merek->getJumlahMerek();

        $data['link'] = $this->db->get('link_terkait')->result_array();
        $data['akses'] = $this->db->get('akses_cepat')->result_array();
        $data['menu'] = $this->db->get_where('menu', array('id_parent' => '', 'id_posisi' => 2))->result_array();
        $data['submenu'] = $this->db->get('menu')->result_array();
        $data['uri'] = $this->uri->segment(1);

        $this->load->view('template/header', $data);
        $this->load->view('merek/merek', $data);
        $this->load->view('template/footer', $data);
    }

    public function detail($id)
    {
        $data['user'] = $this->db->get_where('msuser', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('Merek_model', 'merek');
        $data['getMerek'] = $this->merek->getMerekById($id);
        $data['getInventor'] = $this->merek->getInventorById($id);

        $code = $data['getMerek']['IPMAN_CODE'];
        $data['getDocument'] = $this->merek->getDocumentByCode($code);

        $data['link'] = $this->db->get('link_terkait')->result_array();
        $data['akses'] = $this->db->get('akses_cepat')->result_array();
        $data['menu'] = $this->db->get_where('menu', array('id_parent' => '', 'id_posisi' => 2))->result_array();
        $data['submenu'] = $this->db->get('menu')->result_array();
        $data['uri'] = $this->uri->segment(1);

        $this->load->view('template/header', $data);
        $this->load->view('merek/detailmerek', $data);
        $this->load->view('template/footer', $data);
    }
}
