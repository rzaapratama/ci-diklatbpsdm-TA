<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berkas_Peserta extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PesertaModel');
    }

    public function index()
    {
        $data['title'] = 'Halaman Data Berkas Peserta';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['peserta'] = $this->PesertaModel->get()->result_array();

        if ($data['user']["role_id"] == "1") {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation', $data);
            $this->load->view('admin/berkas_peserta', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('auth');
        }
    }
}
