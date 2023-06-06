<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_ebook extends CI_Model 
{

	public function get_tampil_ebook($id_member)
    {
        $this->db->select('*');
        $this->db->from('buku');
        $this->db->where('jenis_buku','E-Book');
        $query = $this->db->get();
        return $query->result();
    }

    function insertdata_download($where){
        $this->db->insert('history_download', $where);
        return $this->db->insert_id();
    }
}	