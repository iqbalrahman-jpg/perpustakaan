<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StrukController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Mod_peminjaman','StrukModel'));
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function cetak_nota($noinv){
        $data2['perpus']    = $this->StrukModel->getData()->result();
        $data['user'] = $this->db->get_where('admin',['email_admin' => $this->session->userdata('email_admin')])->row_array();
        $data['nota'] = $this->Mod_peminjaman->query_nota($noinv);
        $data['buku'] = $this->Mod_peminjaman->query_nota2($noinv);
        $data['count_buku'] = $this->Mod_peminjaman->get_nota_count_buku_peminjaman(array('detail_peminjaman.id_peminjaman'=>$noinv));


        $this->load->view('Admin/Transaksi/Struk',$data,$data2);
    }

}
