<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hakcipta extends CI_Controller
{

    public function index()
    {
        $gethakcipta = $this->lapan_api_library->call4('hakciptas/fgethakcipta', ['token' => TOKEN_MT]);

        $data['getHakcipta'] = $gethakcipta;
        foreach ($data['getHakcipta'] as $gp) {
            $idp = $gp['id'];
            $data['getInventor'] = $gethakcipta = $this->lapan_api_library->call4('hakciptas/fgetinventorbyid', ['token' => TOKEN_MT , 'id' => $idp]);
        }
        $data['jumlahHakcipta'] =  $this->lapan_api_library->call4('hakciptas/fgetjmlhakcipta', ['token' => TOKEN_MT]);

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
       $gethakcipta = $this->lapan_api_library->call4('hakciptas/fgethakciptabyid', ['token' => TOKEN_MT ,'id' => $id]);
       $data['getHakcipta'] = $gethakcipta[0];
        $data['getInventor'] = $this->lapan_api_library->call4('hakciptas/fgetinventorbyid', ['token' => TOKEN_MT , 'id' => $id]);
        $code = $data['getHakcipta']['ipman_code'];
        $document = $this->lapan_api_library->call4('hakciptas/fgetdocumentbycode', ['token' => TOKEN_MT ,'code' => $code]);
        $data['getDocument']  = $document;
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
