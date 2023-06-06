<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PeminjamanController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Mod_peminjaman','Mod_anggota','Mod_buku','StrukModel'));
        $this->load->library('Zend'); 
        $this->load->library('form_validation');
        $this->load->library('session');
        
        //Melakukan pengecekan untuk hak akses pengguna ADMIN / MEMBER
        if($this->session->userdata('role') != "ADMIN") {
            redirect('AuthController');
        }

    }

    
    public function index()
    {
        $data_header['user'] = $this->db->get_where('admin',['email_admin' => $this->session->userdata('email_admin')])->row_array(); //Mendapatkan data session berdasarkan email pengguna
        $data['tglpinjam']  = date('Y-m-d H:i:s'); //Menampilkan data tanggal sesuai hari ini
        $data['tglkembali'] = date('Y-m-d ', strtotime('+7 day -24 hours', strtotime($data['tglpinjam']))); //Menampilkan data tanggal +7 setelah hari ini
        $data['autonumber'] = $this->Mod_peminjaman->AutoNumbering(); //Mengambil data autonumber dari Model Mod_peminjaman untuk kode peminjaman
        $data['barcode'] = $this->Mod_peminjaman->GenerateNumberBarcode(); //Mengambil data generatenumber dari Model Mod_peminjaman untuk kode barcode
        $data['anggota']    = $this->Mod_anggota->getAnggota()->result(); //Mengambil data member/anggota dari Model Mod_anggota

        $this->load->view('Admin/Template/Header',$data_header);
        $this->load->view('Admin/Transaksi/Peminjaman',$data,$data_header);
        $this->load->view('Admin/Template/Footer');
    }

	public function getDataBuku()
    {
        $this->Mod_peminjaman->ambilBuku();
        //print_r($this->db->last_query());
    }

    
	public function getDataPeminjaman()
    {
        $this->Mod_peminjaman->ambilData();
        //print_r($this->db->last_query());
    }

    public function tampil_tmp()
    {
        $data['tmp']       = $this->Mod_peminjaman->getTmp()->result(); //Mendapatkan data di tabel tmp pada Model Mod_peminjaman, Function getTmp
        $data['jumlahTmp'] = $this->Mod_peminjaman->jumlahTmp(); //Menghitung jumlah kolom pada tabel tmp pada Model Mod_peminjaman, Function jumlahTmp
        $this->load->view('Admin/Transaksi/TabelTemp',$data);
    }

    public function cari_anggota()
    {
        $nis = $this->input->post('kode_member');
        $cari = $this->Mod_anggota->cekAnggota($nis);
        if($cari->num_rows() > 0) {
            $danggota = $cari->row_array();
            echo $danggota['nama_member'];
        }
    }

    public function cari_buku()
    {
        $caribuku = $this->input->post('caribuku');
        $data['buku'] = $this->Mod_buku->BookSearch($caribuku);
        $this->load->view('Admin/Transaksi/DataBuku',$data);
        // foreach($data['buku'] as $d) {
        //     print_r($d); die();
        // }
    }

    public function cari_kode_buku()
    {
        //$kode_buku = 7611;
        $kode_buku = $this->input->post('kode_buku');
        $hasil = $this->Mod_buku->cekBuku($kode_buku);
        //jika ada buku dalam database
        if($hasil->num_rows() > 0) {
            $dbuku = $hasil->row_array();
            echo $dbuku['judul_buku']."|".$dbuku['penulis_buku'];
        }
    }

    public function save_tmp()
    {
        $kode_buku = $this->input->post('kode_buku');
        // echo $kode_buku; die();
        $cek = $this->Mod_peminjaman->cekTmp($kode_buku);
        //cek apakah data masih kosong di tabel tmp
        if($cek->num_rows() < 1) {
            $data = array(
                
                'kode_buku' => $this->input->post('kode_buku'),
                'judul_buku'     => $this->input->post('judul_buku'),
                'penulis_buku' => $this->input->post('penulis_buku'),
            );
            $this->Mod_peminjaman->InsertTmp($data);
        }
    }

    public function hapus_tmp()
    {
        $kode_buku = $this->input->post('kode_buku'); //Melekukan kode buku yang akan dihapus di table tmp
        $this->Mod_peminjaman->deleteTmp($kode_buku); //Melekukan hapus di table tmp pada Model Mod_peminjaman, Function deleteTmp
    }

    public function simpan_transaksi()
    {
        //Melakukan post data ke Model Mod_peminjaman, function InsertTransaksi
        $data = array(
            'id_peminjaman' => $this->input->post('id_peminjaman'),
            'kode_member'      => $this->input->post('kode_member'),
            'tgl_peminjaman'   => $this->input->post('tgl_peminjaman'),
            'tgl_pengembalian'  => $this->input->post('tgl_pengembalian'),
            'nama_admin'       => $this->session->userdata('id_admin')
        );
        $this->Mod_peminjaman->InsertTransaksi($data); 
        


        //Melakukan post data ke Model Mod_peminjaman, function insert_detail
        foreach ($this->input->post('kode_buku') as $key => $data) {
            $data_detail_peminjaman = array(
                'id_peminjaman'    => $this->input->post('id_peminjaman'),
                'kode_detail_peminjaman' => $this->input->post('kode_detail_peminjaman'),
                'kode_buku' =>  $_POST['kode_buku'][$key],
                'status_dikembalikan'      => 'N'
            );
            $data_detail_peminjaman = $this->Mod_peminjaman->insert_detail($data_detail_peminjaman);
        }   

        redirect('PeminjamanController/cetak_nota/'. $this->input->post('id_peminjaman')); //Mengarahkan ke halaman cetak nota

    }

    public function Barcode($code)
    {
        $this->zend->load('Zend/Barcode');
        Zend_Barcode::render('code128', 'image', array(
        'text'=>$code,
        'fontSize'=> 10,
        'barThickWidth' => 5,
        'barHeight' => 25,
        'drawText' =>true
        ), array());
    }

     public function ajax_listall($Nomor="",$id_blok="")
    {
        // echo "ini";
        //  echo "$id_blok".$id_blok;
        // if ($id_blok==0) {
        //     $id_blok="";
        // }

        //echo "$id_blok".$id_blok;
        $list = $this->Mod_peminjaman->get_datatablesid($id_blok);
       // print_r($this->db->last_query());
        $data = array();
        $no = $_REQUEST['start'];
        foreach ($list as $orde) {
            // $kode_barang = preg_replace ('/[^\p{L}\p{N}]/u', '', $orde->kode_barang);
            // $nama_barang = preg_replace ('/[^\p{L}\p{N}]/u', '', $orde->nama_barang);

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $orde->kode_buku;
            $row[] = $orde->judul_buku;
            $row[] = $orde->penulis_buku;
            $row[] = $orde->tahun_terbit;
            $row[] = $orde->edisi_majalah;
            $row[] = $orde->rak_buku;

            $row[] = ' <button type="button" class="btn btn-primary " onclick="pencarian_kode(\'' . $orde->id_buku . '\',\'' . $orde->kode_buku . '\',\'' . $orde->judul_buku . '\',\'' . $orde->penulis_buku . '\',\'' . $orde->tahun_terbit . '\',\'' . $orde->edisi_majalah . '\',\'' . $orde->rak_buku . '\',\'' . $Nomor . '\')">Pilih</button>';


            $data[] = $row;
        }

        $output = array(
            "draw" => $_REQUEST['draw'],
            "recordsTotal" => $this->Mod_peminjaman->count_allid($id_blok),
            "recordsFiltered" => $this->Mod_peminjaman->count_filteredid($id_blok),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function cetak_nota($noinv){

        $data['perpus']= $this->StrukModel->perpustakaan()->result();
        $data['nota'] = $this->StrukModel->query_nota($noinv); //Mendapatkan data nama_admin dan kode_member dari Model StrukModel, Function query_nota
        $data['buku'] = $this->StrukModel->query_nota2($noinv); //Mendapatkan data kode_buku dari Model StrukModel, Function query_nota2
        $data['user'] = $this->db->get_where('admin',['email_admin' => $this->session->userdata('email_admin')])->row_array(); //Mendapatkan data session berdasarkan email_admin untuk ditampilkan di nota
        $data['count_buku'] = $this->StrukModel->get_nota_count_buku_peminjaman(array('detail_peminjaman.id_peminjaman'=>$noinv)); //Mendapatkan data jumlah buku yang dipinjam dari Model StrukModel, Function get_nota_count_buku_peminjaman
        $this->load->view('Admin/Transaksi/Struk',$data);
    }

}
