<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Desain extends CI_Controller
{

    public function index()
    {
        $getDesain = $this->lapan_api_library->call4('desain/fgetdesain', ['token' => TOKEN_MT]);
        $data['getDesain'] = $getDesain[0];

        

        $this->load->model('Desain_model', 'Desain');
        // $data['getDesain'] = $this->Desain->getDesain();

        // print_r(json_encode($data['getDesain']));exit;
        foreach ($data['getDesain'] as $gd) {
            $idd = $gd['id'];
            $getPendesain = $this->lapan_api_library->call4('desain/fgetpendesainbyid', ['token' => TOKEN_MT, 'id' => $idd]);
            $data['getPendesain'] = $getPendesain['data'];

            

            // $data['getPendesain'] = $this->Desain->getPendesain($idd);

            // print_r(json_encode($data['getPendesain']));exit;
        }

        $getjumlahDesain = $this->lapan_api_library->call4('desain/fgetjmldesain', ['token' => TOKEN_MT]);
        $data['jumlahDesain'] = $getjumlahDesain[0];

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

        // $getDesainById = $this->lapan_api_library->call('desainindustri/getdesainbyid', ['token' => TOKEN, 'id' => $id]);
        // $data['getDesain'] = $getDesainById['rows'];

        $this->load->model('Desain_model', 'desain');

        $getPendesain = $this->lapan_api_library->call4('desain/fgetpendesainbyid', ['token' => TOKEN_MT, 'id' => $id]);
        $data['getPendesain'] = $getPendesain['data'];

        $getDesain = $this->lapan_api_library->call4('desain/fgetdesainbyid', ['token' => TOKEN_MT, 'id' => $id]);
        $data['getDesain'] = $getDesain['data'][0];

        // print_r(json_encode($data['getDesain']));exit;

        $code = $data['getDesain'][0]['ipman_code'];

        // print_r(json_encode($code));exit;

        $get_dokumenipman = $this->lapan_api_library->call4('dokumen/fgetdokumenbyipman', ['token' => TOKEN_MT, 'code' => $code]);
        $data['getDocument'] = $get_dokumenipman['data'][0];

        // print_r(json_encode($data['getDocument']));exit;

        // print_r(json_encode($data['getDesain']));exit;

        $this->load->model('Desain_model', 'desain');
        $data['getDesain'] = $this->desain->getdesainById($id);
        $data['getPendesain'] = $this->desain->getPendesainById($id);

        $code = $data['getDesain']['IPMAN_CODE'];
        $data['getDocument'] = $this->desain->getDocumentByCode($code);

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
