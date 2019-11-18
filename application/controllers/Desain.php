<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Desain extends CI_Controller
{

    public function index()
    {
        $getDesain = $this->lapan_api_library->call('desainindustri/getdesain', ['token' => TOKEN]);
        $data['getDesain'] = $getDesain['rows'];

        $this->load->model('Desain_model', 'Desain');
        foreach ($data['getDesain'] as $gd) {
            $idd = $gd['ID'];
            $data['getPendesain'] = $this->Desain->getPendesain($idd);
        }

        $getjumlahDesain = $this->lapan_api_library->call('desainindustri/getjumlahdesain', ['token' => TOKEN]);
        $data['jumlahDesain'] = $getjumlahDesain['rows'];

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
        $this->load->view('desainindustri/desain', $data);
        $this->load->view('template/footer', $data);
    }

    public function detail($id)
    {
        $data['user'] = $this->lapan_api_library->call3('users/getuserbyemail', ['token' => TOKEN, 'email' => $this->session->userdata('email')]);

        $getDesainById = $this->lapan_api_library->call('desainindustri/getdesainbyid', ['token' => TOKEN, 'id' => $id]);
        $data['getDesain'] = $getDesainById['rows'][0];

        $this->load->model('Desain_model', 'desain');

        $data['getPendesain'] = $this->desain->getPendesainById($id);
        $data['getDesain'] = $this->desain->getDesainById($id);

        print_r(json_encode($getDesainById));exit;

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
