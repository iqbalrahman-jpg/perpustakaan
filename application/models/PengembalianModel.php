<?php

class PengembalianModel extends CI_Model{

    public function get_data($table){
        $query = $this->db->get($table);
        return $query;
    }

    function searchAnggota($cari, $limit, $offset)
    {
        $this->db->like("kode_member",$cari);
        $this->db->or_like("nama_member",$cari);
        $this->db->limit($limit, $offset);
        return $this->db->get('member');
    }

    public function get_autocomplete($title)
    {
        $this->db->like('id_peminjaman', $title, 'BOTH');
        $this->db->order_by('id_peminjaman');
        $this->db->limit(10);
        return $this->db->get('peminjaman')->result();
    }

}