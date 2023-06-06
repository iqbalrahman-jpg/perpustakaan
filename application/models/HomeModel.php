<?php

class HomeModel extends CI_Model
{
    // protected $table1 = 'admin';
    // protected $table2 = 'member';
    // protected $table3 = 'buku';
    // protected $table4 = 'detail_peminjaman';
    // protected $table5 = 'detail_pengembalian';

    // public function allDataAdmin()
    // {
    //     $query = $this->db->get('admin');
    //     return $query;
    // }

    // public function allDataMember()
    // {
    //     $query = $this->db->get('member');
    //     return $query;
    // }

    // public function allDataBuku()
    // {
    //     $query = $this->db->get('buku');
    //     return $query;
    // }

    // public function allDataPeminjaman()
    // {
    //     $query = $this->db->get('detail_peminjaman');
    //     return $query;
    // }

    // public function allDataPengembalian()
    // {
    //     $query = $this->db->get('detail_pengembalian');
    //     return $query;
    // }

    public function allDataAdmin()
    {
        $query = $this->db->get('admin');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function allDataMember()
    {
        $query = $this->db->get('member');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function allDataBuku()
    {
        $query = $this->db->get('buku');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function allDataPeminjaman()
    {
        $query = $this->db->get('detail_peminjaman');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function allDataPengembalian()
    {
        $query = $this->db->get('detail_pengembalian');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}
