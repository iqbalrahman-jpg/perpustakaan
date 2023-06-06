<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_anggota extends CI_Model {

    function getAnggota()
    {
        return $this->db->get('member');
    }

    function getAll()
    {
        $this->db->order_by('member.kode_member desc');
        return $this->db->get('member');
    }

    function insertAnggota($tabel, $data)
    {
        $insert = $this->db->insert($tabel, $data);
        return $insert;
    }

    function cekAnggota($kode)
    {
        $this->db->where("kode_member", $kode);
        return $this->db->get("member");
    }

    function updateAnggota($nis, $data)
    {
        $this->db->where('kode_member', $nis);
		$this->db->update('member', $data);
    }

    function getDataAnggota($limit, $offset)
    {
        // return $this->db->get_where('post', array('category_id' => $category_id));
        $this->db->select('*');
        $this->db->from('member a');
        // $this->db->where('a.nis', $nis);
        $this->db->limit($limit, $offset);
        $this->db->order_by('a.kode_member desc');
        return $this->db->get();
    }

    function totalRows($table)
	{
		return $this->db->count_all_results($table);
    }

    // function getTotalRows()
    // {
    //     return $this->db->get('anggota')->num_rows();
    // }

    
    function searchAnggota($cari, $limit, $offset)
    {
        $this->db->like("kode_member",$cari);
        $this->db->or_like("nama_member",$cari);
        $this->db->limit($limit, $offset);
        return $this->db->get('member');
    }

    function deleteAnggota($kode, $table)
    {
        $this->db->where('id_member', $kode);
        $this->db->delete($table);
    }

}

/* End of file ModelName.php */
