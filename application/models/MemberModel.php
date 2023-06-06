<?php

class MemberModel extends CI_Model{

    // ambil data member
    public function get_member()
    {
        $query = $this->db->get('member');
        return $query;
    }

    // ambil data member sebagai json
    public function get_list_member()
    {
        return $this->db->get('member')->result();
    }

    //  tambah member
    public function insert_member($data, $table)
    {
        $this->db->insert($table, $data);
    }

    // edit member
    public function edit_member($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }

    // hapus member
    public function delete_member($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    // 
    public function get_id_member($id)
    {
        $this->db->select('member.id_member, member.kode_member, member.nama_member, member.nim_member, member.email_member, member.alamat_member, member.foto_member, member.no_telp_member');
        $this->db->from('member');
        $hasil = $this->db->where('id_member', $id)->get();

        if($hasil->num_rows() > 0){
            return $hasil->result();
        }else{
            return false;
        }
    }

    public function get_id_member2($id){
        $this->db->select('member.id_member, member.kode_member, member.nama_member, member.nim_member, member.email_member, member.alamat_member, member.foto_member, member.no_telp_member');
        $this->db->from('member');
        return $this->db->where('id_member', $id)->get()->row();

    }

    // barcode
    public function CreateCode(){
        $this->db->select('RIGHT(member.kode_member,8) as kode_member', FALSE);
        $this->db->order_by('kode_member','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('member');
            if($query->num_rows() > 0){      
                 $data = $query->row();
                 $kode = intval($data->kode_member) + 1; 
            }
            else{      
                 $kode = 1;  
            }
        $batas = str_pad($kode, 8, "0", STR_PAD_LEFT);    
        $kodetampil = "KMB".$batas;
        return $kodetampil;  
    }


    // Halaman Member

    // tampil data peminjaman
    public function data_peminjaman($id_member)
    {
        //$this->db->get_where('member',['email_member' => $this->session->userdata('email_member')])->row_array();
        $this->db->select('*');
        $this->db->from('detail_peminjaman');

        $this->db->join('peminjaman','peminjaman.id_peminjaman = detail_peminjaman.id_peminjaman','left outer');
        $this->db->join('member','member.kode_member = peminjaman.kode_member','left outer');
        $this->db->join('buku','buku.kode_buku = detail_peminjaman.kode_buku','left outer');	

        $this->db->where('peminjaman.kode_member', $id_member);
        
        $query = $this->db->get();
        return $query;
    }

    // edit tampilan member
    public function Member_Edit($id)
    {
        $this->db->get_where('member',['email_member' => $this->session->userdata('email_member')])->row_array();
        $this->db->select('member.id_member, member.kode_member, member.nama_member, member.nim_member, member.email_member, member.alamat_member, member.foto_member, member.no_telp_member');
        $this->db->from('member');
        $hasil = $this->db->where('id_member', $id)->get();

        if($hasil->num_rows() > 0){
            return $hasil->result();
        }else{
            return false;
        }
    }
}