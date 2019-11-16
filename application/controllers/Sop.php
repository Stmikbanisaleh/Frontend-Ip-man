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
        $getsop = $this->lapan_api_library->call('sop/getsop', ['token' => TOKEN]);
        $data['getsop'] = $getsop['rows'];

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
        $this->load->view('sop', $data);
        $this->load->view('template/footer', $data);
    }
}
