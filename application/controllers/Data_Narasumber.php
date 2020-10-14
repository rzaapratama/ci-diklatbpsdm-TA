<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_Narasumber extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('NarasumberModel');
    }

    public function index()
    {
        $data['title'] = 'Halaman Data Narasumber';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['narasumber'] = $this->NarasumberModel->get()->result_array();

        if ($data['user']["role_id"] == "1") {
            $this->load->view('admin/data_narasumber', $data);
        } else {
            redirect('auth');
        }
    }
}
