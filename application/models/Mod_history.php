<?php 





defined('BASEPATH') OR exit('No direct script access allowed');



class Mod_history extends CI_Model 

{



	public function get_tampil_pinjaman($id_member)

    {

        $this->db->select('*');

        $this->db->from('detail_peminjaman');

        $this->db->join('peminjaman','peminjaman.id_peminjaman = detail_peminjaman.id_peminjaman');

        $this->db->join('buku','buku.kode_buku = detail_peminjaman.kode_buku');	

        $this->db->where('peminjaman.kode_member',$id_member);

        $this->db->group_by('detail_peminjaman.kode_buku');

        $query = $this->db->get();

        return $query->result();

    }



    public function get_tampil_download_history($id_member)

    {

        $this->db->select('*');

        $this->db->from('history_download');

        $this->db->join('buku','buku.kode_buku = history_download.kode_buku');

        $this->db->where('history_download.kode_member',$id_member); 

        $query = $this->db->get();

        return $query->result();

    }

}	