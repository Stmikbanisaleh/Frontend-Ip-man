<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paten extends CI_Controller
{

    public function index()
    {
        $data['getPaten'] = $this->lapan_api_library->call4('patens/fgetpaten', ['token' => TOKEN_MT]);
        foreach ($data['getPaten'] as $gp) {
            $idp = $gp['id'];
            $data['getInventor'] = $this->lapan_api_library->call4('patens/fgetinventorbyid', ['token' => TOKEN_MT , 'id' => $idp]);
        }

        $data['jumlahPaten'] = $this->lapan_api_library->call4('patens/fgetjmlpaten', ['token' => TOKEN_MT]);

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
        $getpaten = $this->lapan_api_library->call4('patens/fgetpatenbyid', ['token' => TOKEN_MT ,'id' => $id]);
        $data['getPaten'] = $getpaten[0];
        $data['getInventor'] = $this->lapan_api_library->call4('patens/fgetinventorbyid', ['token' => TOKEN_MT , 'id' => $id]);

        $code = $getpaten[0]['ipman_code'];
        $document = $this->lapan_api_library->call4('patens/fgetdocumentbycode', ['token' => TOKEN_MT ,'code' => $code]);
        $data['getDocument'] = $document;

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
