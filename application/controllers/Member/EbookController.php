<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EbookController extends CI_Controller
{

	 public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model(array('Mod_ebook'));
        if($this->session->userdata('role') != "MEMBER") {
            redirect('AuthController');
        }
    }
    
    public function download()
    {
        // $kode_detail_peminjaman = $this->Mod_Peminjaman->GenerateNumberBarcode();
        $data_header['user'] = $this->db->get_where('member',['email_member' => $this->session->userdata('email_member')])->row_array();
        $this->load->view('Member/Template/Header',$data_header);
        $this->load->view('Member/DownloadEbook');
        $this->load->view('Member/Template/Footer');
    }

     public function get_tampil_ebook()
    {
        $id_member = $this->session->userdata("id_member");
        $data = $this->Mod_ebook->get_tampil_ebook($id_member);
        echo json_encode($data);
    }

     public function simpan_download_ebook(){
        $data_download = array(
            'kode_buku'           => $this->input->post('kode_buku'),
            'kode_member'                  => $this->input->post('kode_member'), 
            'tgl' => date('Y-m-d')
        );

        $id_download = $this->Mod_ebook->insertdata_download($data_download);
        echo json_encode(array('status' => TRUE));
    }

}	