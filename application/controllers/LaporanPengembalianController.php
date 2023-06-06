<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanPengembalianController extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_pengembalian');
        $this->load->library('form_validation');         
        $this->load->library('session');                  
        if($this->session->userdata('role') != "ADMIN") {             
            redirect('AuthController');         
        }
    }

	public function index()
	{
        $data_header['user'] = $this->db->get_where('admin',['email_admin' => $this->session->userdata('email_admin')])->row_array();
        $data['pengembalian'] = $this->Mod_pengembalian->join()->result();
        $this->load->view('Admin/Template/Header',$data_header);
        $this->load->view('Admin/Laporan/LaporanPengembalian',$data);
        $this->load->view('Admin/Template/Footer');
		
	}
}
