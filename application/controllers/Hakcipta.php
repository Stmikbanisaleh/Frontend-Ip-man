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
        $this->load->view('hakcipta/detailhakcipta', $data);
        $this->load->view('template/footer', $data);
    }
}
