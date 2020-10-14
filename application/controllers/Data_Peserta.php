<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_Peserta extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PesertaModel');
    }

    public function index()
    {
        $data['title'] = 'Halaman Data Peserta';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['peserta'] = $this->PesertaModel->get()->result_array();

        if ($data['user']["role_id"] == "1") {
            $this->load->view('admin/data_peserta', $data);
        } else {
            redirect('auth');
        }
    }
}
