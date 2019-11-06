<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hakcipta extends CI_Controller
{

    public function index()
    {
        $data['user'] = $this->db->get_where('msuser', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('Hakcipta_model', 'Hakcipta');
        $data['getHakcipta'] = $this->Hakcipta->getHakcipta();
        foreach ($data['getHakcipta'] as $gp) {
            $idp = $gp['ID'];
            $data['getInventor'] = $this->Hakcipta->getInventor($idp);
        }
        $data['jumlahHakcipta'] = $this->Hakcipta->getJumlahHakcipta();

        $data['link'] = $this->db->get('link_terkait')->result_array();
        $data['akses'] = $this->db->get('akses_cepat')->result_array();
        $data['menu'] = $this->db->get_where('menu', array('id_parent' => '', 'id_posisi' => 2))->result_array();
        $data['submenu'] = $this->db->get('menu')->result_array();
        $data['uri'] = $this->uri->segment(1);

        $this->load->view('template/header', $data);
        $this->load->view('hakcipta/hakcipta', $data);
        $this->load->view('template/footer', $data);
    }

    public function detail($id)
    {
        $data['user'] = $this->db->get_where('msuser', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('Hakcipta_model', 'hakcipta');
        $data['getHakcipta'] = $this->hakcipta->getHakciptaById($id);
        $data['getInventor'] = $this->hakcipta->getInventorById($id);

        $code = $data['getHakcipta']['IPMAN_CODE'];
        $data['getDocument'] = $this->hakcipta->getDocumentByCode($code);

        $data['link'] = $this->db->get('link_terkait')->result_array();
        $data['akses'] = $this->db->get('akses_cepat')->result_array();
        $data['menu'] = $this->db->get_where('menu', array('id_parent' => '', 'id_posisi' => 2))->result_array();
        $data['submenu'] = $this->db->get('menu')->result_array();
        $data['uri'] = $this->uri->segment(1);

        $this->load->view('template/header', $data);
        $this->load->view('hakcipta/detailhakcipta', $data);
        $this->load->view('template/footer', $data);
    }
}
