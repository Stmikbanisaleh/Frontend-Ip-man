<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Berita_model', 'm_berita');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('msuser', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->library('pagination');

        $config['base_url'] = 'http://localhost/pusispan/ip-man/berita/index';
        //$config['base_url'] = 'http://pusispan.stmik-banisaleh.com/pusispan/ip-man/berita/index';
        $config['total_rows'] = $this->m_berita->hitungJumlahBerita();
        $config['per_page'] = 4;

        $config['full_tag_open'] = '<nav><ul class="pagination ">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="label-success active"><a class="page-link" href="#" >';
        $config['cur_tag_close'] = '</li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['getBerita'] = $this->m_berita->getBerita($config['per_page'], $data['start']);


        $data['link'] = $this->db->get('link_terkait')->result_array();
        $data['akses'] = $this->db->get('akses_cepat')->result_array();
        $data['uri'] = $this->uri->segment(1);
        $data['menu'] = $this->db->get_where('menu', array('id_parent' => '', 'id_posisi' => 2))->result_array();
        $data['submenu'] = $this->db->get('menu')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('berita/index');
        $this->load->view('template/footer');
    }

    public function read($seo)
    {
        $data['user'] = $this->db->get_where('msuser', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['getBeritaList'] = $this->m_berita->getBeritaList(5);
        $data['getBeritaDetail'] = $this->m_berita->getBeritaDetail($seo);

        $data['link'] = $this->db->get('link_terkait')->result_array();
        $data['akses'] = $this->db->get('akses_cepat')->result_array();
        $data['uri'] = $this->uri->segment(1);
        $data['menu'] = $this->db->get_where('menu', array('id_parent' => '', 'id_posisi' => 2))->result_array();
        $data['submenu'] = $this->db->get('menu')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('berita/detail');
        $this->load->view('template/footer');
    }

    public function informasi_baru()
    {
        $data['user'] = $this->db->get_where('msuser', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('Berita_model', 'berita');
        $data['isiberita'] = $this->berita->getBerita();

        $data['uri'] = $this->uri->segment(1);
        $this->load->view('template/header', $data);
        $this->load->view('berita/informasi_baru');
        $this->load->view('template/footer');
    }

    public function agenda()
    {
        $data['uri'] = $this->uri->segment(1);
        $this->load->view('template/header', $data);
        $this->load->view('berita/agenda');
        $this->load->view('template/footer');
    }

    public function program()
    {
        $data['uri'] = $this->uri->segment(1);
        $this->load->view('template/header', $data);
        $this->load->view('berita/program');
        $this->load->view('template/footer');
    }
}
