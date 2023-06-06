<?php 





defined('BASEPATH') OR exit('No direct script access allowed');



class Mod_pengembalian extends CI_Model 

{


    // ambil data peminjaman
	 function get_list_peminjaman()

    {

        $this->db->select('a.id_peminjaman');

        $this->db->select('DATE_FORMAT(a.tgl_peminjaman, "%d-%m-%Y") as tgl_peminjaman');

        $this->db->select('b.nama_member');

        $this->db->select('DATE_FORMAT(a.tgl_pengembalian, "%d-%m-%Y") as tgl_pengembalian');

        $this->db->join('member b','a.kode_member=b.kode_member','left outer');

        return $this->db->get('peminjaman a')->result();

    }


    // ambil data member pinjam
    public function get_by_id2($id)

    {

        $this->db->where('a.id_peminjaman', $id);

        $this->db->join('member b','a.kode_member=b.kode_member','left outer');

        return $this->db->get('peminjaman a')->row();

    }


    // ambil data buku yang dipinjam
    function get_list_buku_peminjaman($id)

    {

        $this->db->select('b.id_buku');
        $this->db->select('b.kode_buku');
        $this->db->select('b.judul_buku');
        $this->db->select('b.penulis_buku');
        $this->db->select('b.penerbit_buku');
        $this->db->select('b.tahun_terbit');
        $this->db->select('a.id_detail_peminjaman');
        $this->db->join('buku b', 'a.kode_buku=b.kode_buku', 'left outer');
        $this->db->where('a.id_peminjaman', $id);
        $this->db->where('a.status_dikembalikan','N');
        return $this->db->get('detail_peminjaman a')->result();

    }



    function AutoNumbering()

    {

        $this->db->select('RIGHT(pengembalian.id_pengembalian,2) as kode', FALSE);

        $this->db->order_by('id_pengembalian','DESC');

        $this->db->limit(1);

        $query = $this->db->get('pengembalian');      //cek dulu apakah ada sudah ada kode di tabel.

        if($query->num_rows() <> 0){

            //jika kode ternyata sudah ada.

            $data = $query->row();

            $kode = intval($data->kode) + 1;

        }

        else {

            //jika kode belum ada

            $kode = 1;

        }



        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0

        $kodejadi = "PGM-3062-".$kodemax;    // hasilnya PJM-3062--0001 dst.

        return $kodejadi;

    }


    // simpan data di tmp
    function insertdata_pengembalian_sementara($where){

    	$this->db->insert('detail_pengembalian_temp', $where);

        return $this->db->insert_id();

    }


    // tampil data di tmp
    function get_list_pengembalian_det_temp($id){

        $this->db->select('a.*');

        $this->db->select('b.judul_buku');

        $this->db->select('b.penulis_buku');

        $this->db->select('b.penerbit_buku');

        $this->db->select('b.tahun_terbit');

        $this->db->join('buku b', 'a.kode_buku=b.kode_buku', 'left outer');

        $this->db->where('a.session_id', $id);

        return $this->db->get('detail_pengembalian_temp a')->result();

    }

    // updata detail peminjaman
    function update_2($where, $id){
        return $this->db->update('detail_peminjaman',$where,$id);
    }


    // inpit data ke pengembalian
    function insertdata($where)

    {

        $this->db->insert('pengembalian', $where);

        return $this->db->insert_id();

    }


    // input data ke detail peminnjaman
     function insertdata_detail($where)

    {

        $this->db->insert('detail_pengembalian', $where);

        return $this->db->insert_id();

    }


    // hapus data temp
    function delete_temp($id){

        $this->db->where('id_pengembalian', $id);

        $this->db->delete('detail_pengembalian_temp');

    }


    // tampil data detail peminjaman
    public function join()

    {

        $this->db->select('*');

        $this->db->from('detail_pengembalian');

        $this->db->join('pengembalian','pengembalian.id_pengembalian = detail_pengembalian.id_pengembalian');

        // $this->db->join('member','member.kode_member = peminjaman.kode_member');

        // $this->db->join('admin','admin.id_admin = detail_peminjaman.id_peminjaman');

        $this->db->join('buku','buku.kode_buku = detail_pengembalian.kode_buku');	

        $query = $this->db->get();

        return $query;

    }

}	