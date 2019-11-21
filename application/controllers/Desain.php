<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Desain extends CI_Controller
{

    public function index()
    {
        $getDesain = $this->lapan_api_library->call4('desain/fgetdesain', ['token' => TOKEN_MT]);
        $data['getDesain'] = $getDesain;
        // $this->load->model('Desain_model', 'Desain');
        // $data['getDesain'] = $this->Desain->getDesain();

        // print_r(json_encode($data['getDesain']));exit;
        foreach ($data['getDesain'] as $gd) {
            $idd = $gd['id'];
            $getPendesain = $this->lapan_api_library->call4('desain/fgetpendesainbyid', ['token' => TOKEN_MT, 'id' => $idd]);
            $data['getPendesain'] = $getPendesain;
            // $data['getPendesain'] = $this->Desain->getPendesain($idd);
            // print_r(json_encode($data['getPendesain']));exit;
        }

        $getjumlahDesain = $this->lapan_api_library->call4('desain/fgetjmldesain', ['token' => TOKEN_MT]);
        $data['jumlahDesain'] = $getjumlahDesain;

        // print_r(json_encode($data['jumlahDesain']));exit;

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

        $getDesainbyid = $this->lapan_api_library->call4('desain/fgetdesainbyid', ['token' => TOKEN_MT ,'id' => $id]);
        $data['getDesain'] = $getDesainbyid[0];
        $data['getPendesain'] = $this->lapan_api_library->call4('desain/fgetpendesainbyid', ['token' => TOKEN_MT, 'id' => $id]);

        $code = $getDesainbyid[0]['ipman_code'];
        $data['getDocument'] = $this->lapan_api_library->call4('mereks/fgetdocumentbycode', ['token' => TOKEN_MT, 'code' => $code]);


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
        $this->load->view('desainindustri/detaildesain', $data);
        $this->load->view('template/footer', $data);
    }
}
