<?php

class HomeController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('HomeModel');
        $this->load->helper('url');
        $this->load->library('session');                  
        if($this->session->userdata('role') != "ADMIN") {             
            redirect('AuthController');         
        }   
    }
    public function index()
    {
        $data_header['user'] = $this->db->get_where('admin',['email_admin' => $this->session->userdata('email_admin')])->row_array();
        $data['admin'] = $this->HomeModel->allDataAdmin();
        $data['member'] = $this->HomeModel->allDataMember();
        $data['buku'] = $this->HomeModel->allDataBuku();
        $data['detail_peminjaman'] = $this->HomeModel->allDataPeminjaman();
        $data['detail_pengembalian'] = $this->HomeModel->allDataPengembalian();
        $this->load->view('Admin/Template/Header',$data_header);
        $this->load->view('Admin/Home/Home', $data);
        $this->load->view('Admin/Template/Footer');
    }
}
