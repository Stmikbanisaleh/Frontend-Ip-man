<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Merek extends CI_Controller
{

    public function index()
    {
        $getMerek = $this->lapan_api_library->call4('mereks/fgetmerek', ['token' => TOKEN_MT]);
        $data['getMerek'] = $getMerek;
        foreach ($data['getMerek'] as $gm) {
            $idm = $gm['id'];
            $data['getInventor'] = $this->lapan_api_library->call4('mereks/fgetinventorbyid', ['token' => TOKEN_MT, 'id' => $idm]);
            // print_r($idm);exit;
        }
        // print_r(json_encode($data['getInventor']));exit;

        $data['jumlahMerek'] =  $this->lapan_api_library->call4('mereks/fgetjmlmerek', ['token' => TOKEN_MT]);
        // print_r($data['jumlahMerek']);exit;
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
        $this->load->view('merek/merek', $data);
        $this->load->view('template/footer', $data);
    }

    public function detail($id)
    {
        $getmerekbyid= $this->lapan_api_library->call4('mereks/fgetmerekbyid', ['token' => TOKEN, 'id' => $id]);
        $getaksescepat = $this->lapan_api_library->call('aksescepat/getaksescepat', ['token' => TOKEN]);
        $data['akses'] = $getaksescepat['rows'];
        // print_r($getmerekbyid);exit;
        $data['getMerek'] = $getmerekbyid[0];
        $getinventorbyid = $this->lapan_api_library->call4('mereks/fgetinventorbyid', ['token' => TOKEN_MT, 'id' => $id]);
        $data['getInventor'] =  $getinventorbyid;
        // print_r($getmerekbyid);exit;
        $code = $getmerekbyid[0]['ipman_code'];
        $data['getDocument'] = $this->lapan_api_library->call4('mereks/fgetdocumentbycode', ['token' => TOKEN_MT, 'code' => $code]);
        // print_r($code);exit;
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
        $this->load->view('merek/detailmerek', $data);
        $this->load->view('template/footer', $data);
    }
}
