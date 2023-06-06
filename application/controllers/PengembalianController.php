<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PengembalianController extends CI_Controller
{

	public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Mod_pengembalian','Mod_anggota','Mod_buku','PeminjamanModel'));
        $this->load->library('form_validation');         
        $this->load->library('session');
                
        //Melakukan pengecekan untuk hak akses pengguna ADMIN / MEMBER                  
        if($this->session->userdata('role') != "ADMIN") {             
            redirect('AuthController');         
        }
    }
    
    public function index()
    {
        $data['autonumber'] = $this->Mod_pengembalian->AutoNumbering(); //Mengambil data autonumber dari Model Mod_peminjaman untuk kode peminjaman
        $idk_psn = $this->session->userdata('id_kpesan');
        if (!empty($idk_psn)) {
            $id_kpesan = $this->session->userdata('id_kpesan');
        }else{
            $id_kpesan = $this->randomString();
            $data['id_kpesan'] = $id_kpesan;
        }
        $data_header['user'] = $this->db->get_where('admin',['email_admin' => $this->session->userdata('email_admin')])->row_array(); //Mengambil data autonumber dari Model Mod_peminjaman untuk kode peminjaman//Mendapatkan data session berdasarkan email pengguna
        $this->load->view('Admin/Template/Header',$data_header);
        $this->load->view('Admin/Transaksi/Pengembalian', $data);
        $this->load->view('Admin/Template/Footer');
    }

    // auto number
    function randomString($length = 10) {
        $str = "";
        $characters = array_merge(range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str  .= $characters[$rand];
        }
        return $str;
    } 

    // ambil data peminjaman
    public function get_list_peminjaman()
    {
        $data = $this->Mod_pengembalian->get_list_peminjaman();
        echo json_encode($data);
    }

    public function tampil_peminjaman2($id)
    {
        $data = $this->Mod_pengembalian->get_by_id2($id);
        echo json_encode($data);
    }

    // ambil data buku peminjaman
    public function get_list_buku_peminjaman($id){
        $data = $this->Mod_pengembalian->get_list_buku_peminjaman($id);
        echo json_encode($data);
    }

    // tambah ke data buku yang dikembalikan sementara
    public function keranjang_pengembalian_sementara(){
        $data_pengembalian = array(
            'kode_buku'           => $this->input->post('id_buku'),
            'id_pengembalian'                  => $this->input->post('no_beli'), 
            'session_id' => $this->input->post('session_id'),
            'id_detail_peminjaman' => $this->input->post('id_detail_peminjaman')
        );

        $id_pengembalian = $this->Mod_pengembalian->insertdata_pengembalian_sementara($data_pengembalian);
        echo json_encode(array('status' => TRUE));
    }

    // tampil data yang dikembalikan dari temp
    public function get_list_pengembalian_det_temp($id){
        $data = $this->Mod_pengembalian->get_list_pengembalian_det_temp($id);
        echo json_encode($data);
    }

    // simpan pengembalian
    function simpan_pengembalian()
    {
        $data_pengembalian = array(
        	'id_pengembalian'           => $this->input->post('no_faktur_penjualan'),
            'id_peminjaman'           => $this->input->post('id_peminjaman_view'),
            'tgl_dikembalikan'        => date('Y-m-d H:i:s'),
        );

        $id_pengembalian = $this->Mod_pengembalian->insertdata($data_pengembalian);

        $kode_buku = $this->input->post('kode_buku');
        $id_buku = $this->input->post('id_buku');
        $id_detail_peminjaman = $this->input->post('id_detail_peminjaman');

       // $get_peminjaman = $this->Mod_pengembalian->get_peminjaman($this->input->post('no_faktur_penjualan'));
        for($ii = 0; $ii < count($id_buku); $ii++) {
            $data_detail_pengembalian = array(
                'id_pengembalian' =>  $this->input->post('no_faktur_penjualan'),
                'kode_buku'      => $kode_buku[$ii],
            );

            $id_pengembalian_detail = $this->Mod_pengembalian->insertdata_detail($data_detail_pengembalian);

            $data_update = array(
                'status_dikembalikan'  => 'Y',
            );

            $this->Mod_pengembalian->update_2($data_update,array('id_detail_peminjaman' => $id_detail_peminjaman[$ii]));

        }

       

        $this->Mod_pengembalian->delete_temp($this->input->post('no_faktur_penjualan'));
        redirect('PengembalianController','refresh');
    }

}
