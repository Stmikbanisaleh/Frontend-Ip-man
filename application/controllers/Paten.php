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

        //========================================  Menu ========================================================//

        $data['uri'] = $this->uri->segment(1);

        $getlistlink = $this->lapan_api_library->call('link/getlink', ['token' => TOKEN]);
        $data['link'] = $getlistlink['rows'];

        $getaksescepat = $this->lapan_api_library->call('aksescepat/getaksescepat', ['token' => TOKEN]);
        $data['akses'] = $getaksescepat['rows'];

        $data_menuwhere = [
            'token' => TOKEN,
            'id_parent' => '',
            'id_posisi' => 2
        ];
        $getmenuwhere = $this->lapan_api_library->call('menu/getmenuwhere', $data_menuwhere);
        $data['menu'] = $getmenuwhere['rows'];

        $getmenu = $this->lapan_api_library->call('menu/getmenu', ['token' => TOKEN]);
        $data['submenu'] = $getmenu['rows'];

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

        //========================================  Menu ========================================================//

        $data['uri'] = $this->uri->segment(1);

        $getlistlink = $this->lapan_api_library->call('link/getlink', ['token' => TOKEN]);
        $data['link'] = $getlistlink['rows'];

        $getaksescepat = $this->lapan_api_library->call('aksescepat/getaksescepat', ['token' => TOKEN]);
        $data['akses'] = $getaksescepat['rows'];

        $data_menuwhere = [
            'token' => TOKEN,
            'id_parent' => '',
            'id_posisi' => 2
        ];
        $getmenuwhere = $this->lapan_api_library->call('menu/getmenuwhere', $data_menuwhere);
        $data['menu'] = $getmenuwhere['rows'];

        $getmenu = $this->lapan_api_library->call('menu/getmenu', ['token' => TOKEN]);
        $data['submenu'] = $getmenu['rows'];
        $this->load->view('template/header', $data);
        $this->load->view('paten/detailpaten', $data);
        $this->load->view('template/footer', $data);
    }
}
