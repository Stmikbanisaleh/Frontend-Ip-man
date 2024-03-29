<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sop extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sop_model', 'm_sop');
    }

    public function index()
    {
        $data['getsop'] = $this->m_sop->getSop();

        $data['link'] = $this->db->get('link_terkait')->result_array();
        $data['akses'] = $this->db->get('akses_cepat')->result_array();
        $data['menu'] = $this->db->get_where('menu', array('id_parent' => '', 'id_posisi' => 2))->result_array();
        $data['submenu'] = $this->db->get('menu')->result_array();
        $data['uri'] = $this->uri->segment(1);

        $this->load->view('template/header', $data);
        $this->load->view('sop', $data);
        $this->load->view('template/footer', $data);
    }
}
