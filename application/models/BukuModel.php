<?php



class BukuModel extends CI_Model

{

    public function get_data()

    {

        $query = $this->db->get('buku');

        return $query;

    }



    public function insert_data($data, $table)

    {

        $this->db->insert($table, $data);

    }


    //fungsi mengambil data dengan melakukan order by dari data kode buku dan membuat kode
    public function CreateCode()

    {

        $this->db->select('RIGHT(buku.kode_buku,5) as kode_buku', FALSE);

        $this->db->order_by('kode_buku', 'DESC');

        $this->db->limit(1);

        $query = $this->db->get('buku'); //cek data tabel

        if ($query > 0) {

            $data = $query->row();

            $kode = intval($data->kode_buku) + 1;

        } else {

            $kode = 1;

        }

        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);

        $kodetampil = "KDB" . $batas;

        return $kodetampil;

    }



    public function edit_data($table, $data, $where)

    {

        $this->db->update($table, $data, $where);

    }



    public function delete_data($where, $table)

    {

        $this->db->where($where);

        $this->db->delete($table);

    }



    public function get_id_buku($id_buku)

    {

        $this->db->from('buku');

        $output = $this->db->where('id_buku', $id_buku)->get();



        if ($output->num_rows() > 0) {

            return $output->result();

        } else {

            return false;

        }

    }

public function get_id_buku2($id_buku)
    {
        $this->db->from('buku');
        $output = $this->db->where('id_buku', $id_buku)->get();

        if ($output->num_rows() > 0) {
            return $output->row();
        } else {
            return false;
        }
    }
        
    // melakukan cek kode buku
    public function checkBookCode($kode)

    {

        $this->db->from('buku');

        $output = $this->db->where('kode_buku', $kode)->get();

        if ($output->num_rows() > 0) {

            return false;

        } else {

            return true;

        }

    }


    // membuat fungsi model untuk melakukan filter dan search dari 'date range'
    public function getDate($first_date, $second_date)

    {

        $this->db->where('tanggal_masuk >=', $first_date);

        $this->db->where('tanggal_masuk <=', $second_date);

        $query = $this->db->get('buku')->result();

        return $query;

    }

}

