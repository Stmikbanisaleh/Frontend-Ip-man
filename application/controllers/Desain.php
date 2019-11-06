<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Desain extends CI_Controller
{

    public function index()
    {
        $data['user'] = $this->db->get_where('msuser', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('Desain_model', 'Desain');
        $data['getDesain'] = $this->Desain->getDesain();
        foreach ($data['getDesain'] as $gd) {
            $idd = $gd['ID'];
            $data['getPendesain'] = $this->Desain->getPendesain($idd);
        }
        $data['jumlahDesain'] = $this->Desain->getJumlahDesain();

        $data['link'] = $this->db->get('link_terkait')->result_array();
        $data['akses'] = $this->db->get('akses_cepat')->result_array();
        $data['menu'] = $this->db->get_where('menu', array('id_parent' => '', 'id_posisi' => 2))->result_array();
        $data['submenu'] = $this->db->get('menu')->result_array();
        $data['uri'] = $this->uri->segment(1);

        $this->load->view('template/header', $data);
        $this->load->view('desainindustri/desain', $data);
        $this->load->view('template/footer', $data);
    }

    public function detail($id)
    {
        $data['user'] = $this->db->get_where('msuser', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('Desain_model', 'desain');
        $data['getDesain'] = $this->desain->getdesainById($id);
        $data['getPendesain'] = $this->desain->getPendesainById($id);

        $code = $data['getDesain']['IPMAN_CODE'];
        $data['getDocument'] = $this->desain->getDocumentByCode($code);

        $data['link'] = $this->db->get('link_terkait')->result_array();
        $data['akses'] = $this->db->get('akses_cepat')->result_array();
        $data['menu'] = $this->db->get_where('menu', array('id_parent' => '', 'id_posisi' => 2))->result_array();
        $data['submenu'] = $this->db->get('menu')->result_array();
        $data['uri'] = $this->uri->segment(1);

        $this->load->view('template/header', $data);
        $this->load->view('desainindustri/detaildesain', $data);
        $this->load->view('template/footer', $data);
    }
}
