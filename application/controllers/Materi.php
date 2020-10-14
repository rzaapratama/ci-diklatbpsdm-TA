<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Materi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MateriModel');
    }

    public function index()
    {
        $data['title'] = 'Halaman Materi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['materi'] = $this->MateriModel->get()->result_array();

        if ($data['user']["role_id"] == "1") {
            $this->load->view('admin/materi', $data);
        } else {
            redirect('auth');
        }
    }
   public function download($id)
	{
		$data = $this->db->get_where('materi',['id'=>$id])->row();
		force_download('uploads/'.$data->file,NULL);
	}
}
