<?php

class LaporanPeminjamanModel extends CI_Model{

    public function join()
    {
        $this->db->select('*');
        $this->db->from('detail_peminjaman');
        $this->db->join('peminjaman','peminjaman.id_peminjaman = detail_peminjaman.id_peminjaman');
        $this->db->join('member','member.kode_member = peminjaman.kode_member');
        // $this->db->join('admin','admin.id_admin = detail_peminjaman.id_peminjaman');
        $this->db->join('buku','buku.kode_buku = detail_peminjaman.kode_buku');	
        $query = $this->db->get();
        return $query;
    }

}