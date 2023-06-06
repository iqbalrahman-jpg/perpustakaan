<?php

class AdminModel extends CI_Model{

    public function get_admin()
    {
        $query = $this->db->get('admin');
        return $query;
    }

    public function insert_admin($table, $data)
    {
        $this->db->insert($data, $table);
    }

    public function edit_admin($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }

    public function delete_admin($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function get_id_admin($id)
    {
        $this->db->select('admin.id_admin, admin.nama_admin, admin.email_admin, admin.alamat_admin, admin.foto_admin, admin.no_telp_admin');
        $this->db->from('admin');
        $hasil = $this->db->where('id_admin', $id)->get();

        if($hasil->num_rows() > 0){
            return $hasil->result();
        }else{
            return false;
        }
    }
}