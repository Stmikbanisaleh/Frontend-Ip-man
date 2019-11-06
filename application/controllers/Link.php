<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Link extends CI_Controller
{

    public function index()
    {
        $data['uri'] = $this->uri->segment(1);
        $this->load->view('template/header', $data);
        $this->load->view('link');
        $this->load->view('template/footer');
    }
}
