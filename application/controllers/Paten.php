<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paten extends CI_Controller
{

    public function index()
    {
        $data['user'] = $this->db->get_where('msuser', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('Paten_model', 'paten');
        $data['getPaten'] = $this->paten->getPaten();
        foreach ($data['getPaten'] as $gp) {
            $idp = $gp['ID'];
            $data['getInventor'] = $this->paten->getInventor($idp);
        }

        $data['jumlahPaten'] = $this->paten->getJumlahPaten();

        $data['link'] = $this->db->get('link_terkait')->result_array();
        $data['akses'] = $this->db->get('akses_cepat')->result_array();
        $data['menu'] = $this->db->get_where('menu', array('id_parent' => '', 'id_posisi' => 2))->result_array();
        $data['submenu'] = $this->db->get('menu')->result_array();
        $data['uri'] = $this->uri->segment(1);

        $this->load->view('template/header', $data);
        $this->load->view('paten/paten', $data);
        $this->load->view('template/footer', $data);
    }

    public function detail($id)
    {
        $data['user'] = $this->db->get_where('msuser', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('Paten_model', 'paten');
        $data['getPaten'] = $this->paten->getPatenById($id);
        $data['getInventor'] = $this->paten->getInventorById($id);

        $code = $data['getPaten']['IPMAN_CODE'];
        $data['getDocument'] = $this->paten->getDocumentByCode($code);

        $data['link'] = $this->db->get('link_terkait')->result_array();
        $data['akses'] = $this->db->get('akses_cepat')->result_array();
        $data['menu'] = $this->db->get_where('menu', array('id_parent' => '', 'id_posisi' => 2))->result_array();
        $data['submenu'] = $this->db->get('menu')->result_array();
        $data['uri'] = $this->uri->segment(1);

        $this->load->view('template/header', $data);
        $this->load->view('paten/detailpaten', $data);
        $this->load->view('template/footer', $data);
    }
}
