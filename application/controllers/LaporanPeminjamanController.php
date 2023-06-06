<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LaporanPeminjamanController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('LaporanPeminjamanModel');
        $this->load->library('form_validation');         
        $this->load->library('session');                  
        if($this->session->userdata('role') != "ADMIN") {             
            redirect('AuthController');         
        }
    }

    public function index()
    {
        // $kode_detail_peminjaman = $this->Mod_Peminjaman->GenerateNumberBarcode();
        $data_header['user'] = $this->db->get_where('admin',['email_admin' => $this->session->userdata('email_admin')])->row_array();
        $data['tabel'] = $this->LaporanPeminjamanModel->join()->result();
        $this->load->view('Admin/Template/Header',$data_header);
        $this->load->view('Admin/Laporan/LaporanPeminjaman',$data);
        $this->load->view('Admin/Template/Footer');
    }

}
