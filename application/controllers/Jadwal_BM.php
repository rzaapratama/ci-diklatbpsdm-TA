<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_BM extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('JadwalBMModel');
    }

    public function index()
    {
        $data['title'] = 'Halaman Jadwal Benchmarking';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jadwalbm'] = $this->JadwalBMModel->get()->result_array();

        if ($data['user']["role_id"] == "1") {
            $this->load->view('admin/jadwal_bm', $data);
        } else {
            redirect('auth');
        }
    }
}
