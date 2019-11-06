<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ppid extends CI_Controller
{

    public function index()
    {
        $data['uri'] = $this->uri->segment(1);
        $this->load->view('template/header', $data);
        $this->load->view('ppid');
        $this->load->view('template/footer');
    }
}
