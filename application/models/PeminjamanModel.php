<?php

class PeminjamanModel extends CI_Model{

    public function join()
    {
        $this->db->select('*');
        $this->db->from('detail_peminjaman');
        $this->db->join('peminjaman','peminjaman.id_peminjaman = detail_peminjaman.id_peminjaman'); //Melakukan join id_peminjaman dari tabel peminjaman dan tabel detail_peminjaman
        $this->db->join('member','member.id_member = detail_peminjaman.id_peminjaman'); //Melakukan join id_member dari tabel member dan tabel detail_peminjaman
        $this->db->join('admin','admin.id_admin = detail_peminjaman.id_peminjaman'); //Melakukan join id_admin dari tabel admin dan tabel detail_peminjaman
        $this->db->join('buku','buku.id_buku = detail_peminjaman.id_buku');	 //Melakukan join id_buku dari tabel buku dan tabel detail_peminjaman
        $query = $this->db->get();
        return $query;
    }
  
}