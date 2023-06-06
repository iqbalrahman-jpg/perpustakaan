<?php



class StrukModel extends CI_Model{


    function query_nota($noinv){

        $this->db->where('id_peminjaman', $noinv);

        $this->db->join('admin','peminjaman.nama_admin=admin.id_admin','left outer'); //Melakukan join nama_admin dari tabel admin dan tabel peminjaman

        $this->db->join('member','member.kode_member = peminjaman.kode_member','left outer'); //Melakukan join kode_member dari tabel buku dan tabel detail_peminjaman

        return $this->db->get('peminjaman')->row();

    }

    //Mendapatkan data buku berdasarkan id_peminjaman
    function query_nota2($noinv){

        $this->db->where('id_peminjaman', $noinv);

        $this->db->join('buku','detail_peminjaman.kode_buku=buku.kode_buku'); //Melakukan join kode_buku dari tabel buku dan tabel detail_peminjaman

        return $this->db->get('detail_peminjaman')->result();

    }

    //Menghitung jumlah buku yang dipinjam
    public function get_nota_count_buku_peminjaman($where){

        $this->db->select('count(kode_buku) as jml_buku');

        $this->db->where($where);

        return $this->db->get('detail_peminjaman')->row();

    }


    public function perpustakaan(){

        $query = $this->db->get('perpus');

        return $query;

    }

}