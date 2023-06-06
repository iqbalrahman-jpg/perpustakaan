<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_peminjaman extends CI_Model 
{

    private $table = "peminjaman";
    private $tmp   = "tmp";

    var $table2 = 'buku';
    var $column_orderid = array('a.id_buku', 'a.kode_buku', 'a.judul_buku', 'a.penulis_buku', 'a.tahun_terbit', null); //set column field database for datatable orderable
    var $column_searchid = array('a.id_buku', 'a.kode_buku', 'a.judul_buku', 'a.penulis_buku', 'a.tahun_terbit'); //set column field database for datatable searchable just title , author , category are searchable
    var $orderid = array('a.id_buku' => 'asc'); // default order

    public function get_datatablesid($id_blok="")
    {
        $this->_get_datatables_queryid($id_blok);
        //  $this->db->where('orde_sungai',$id);

        if ($_REQUEST['length'] != -1) {
            $this->db->limit($_REQUEST['length'], $_REQUEST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    private function _get_datatables_queryid($id_blok="")
    {
        $this->db->from("buku a");
        if ($id_blok!="") {
            $this->db->where("a.jenis_buku", str_replace("_", " ", $id_blok));
        }
        $i = 0;


        foreach ($this->column_searchid as $item) {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    // $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_searchid) - 1 == $i); //last loop
                // $this->db->group_end(); //close bracket


            }

            $i++;
        }

        if (isset($_REQUEST['order'])) {
            $this->db->order_by($this->column_orderid[$_REQUEST['order']['0']['column']], $_REQUEST['order']['0']['dir']);
        } else if (isset($this->orderid)) {
            $order = $this->orderid;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function count_filteredid($id_blok="")
    {
        $this->_get_datatables_queryid($id_blok);
        //$this->db->where('orde_sungai',$id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_allid($id_blok="")
    {
        $this->db->from($this->table2);
        return $this->db->count_all_results();
    }
          
    function AutoNumbering()
    {
        // return $nextNoTransaksi;

            $this->db->select('RIGHT(peminjaman.id_peminjaman,2) as kode', FALSE);
            $this->db->order_by('id_peminjaman','DESC');    
            $this->db->limit(1);    
            $query = $this->db->get('peminjaman');      //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0){      
            //jika kode ternyata sudah ada.      
            $data = $query->row();      
            $kode = intval($data->kode) + 1;    
        }
        else {      
            //jika kode belum ada      
            $kode = 1;    
        }
            $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
            $kodejadi = "PJM-3062-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
            return $kodejadi;  
    }
    
    function getTmp($id)
    {
        $this->db->where('id_peminjaman', $id);
        return $this->db->get("tmp");
    }
    
    function cekTmp($kode)
    {
        $this->db->where("id_buku",$kode);
        return $this->db->get("tmp");
    }

    function InsertTmp($data)
    {
        //$this->db->insert("transaksi",$info);
        $this->db->insert($this->tmp, $data);    
    }

    function InsertTransaksi($data)
    {
        $this->db->insert($this->table, $data);
    }

    function InsertDetailTransaksi($data){
        $this->db->insert('detail_peminjaman', $data);
    }

    function jumlahTmp()
    {
        return $this->db->count_all("tmp");
    }

    function deleteTmp($id_buku)
    {
        $this->db->where("id_buku",$id_buku);
        $this->db->delete($this->tmp);
    }

    function getTransaksi()
    {
        return $this->db->get($this->table);
    }

	public function ambilBuku()
	{

		$this->db->select('*');
		$this->db->from('buku');

		$buku = $this->db->get();

		if ($buku->num_rows() > 0) {
			$json['status'] 	= 1;
			foreach ($buku->result() as $b) {
				$json['datanya'][] = $b;
			}
			$json['jumlah_barang'] = count($buku->result());
		} else {
			$json['status'] 	= 0;
		}

		echo json_encode($json);
	}

    public function ambilData()
	{

		$this->db->select('*');
		$this->db->from('Peminjaman');

		$buku = $this->db->get();

		if ($buku->num_rows() > 0) {
			$json['status'] 	= 1;
			foreach ($buku->result() as $b) {
				$json['datanya'][] = $b;
			}
			$json['jumlah_barang'] = count($buku->result());
		} else {
			$json['status'] 	= 0;
		}

		echo json_encode($json);
	}

	function insert_detail($where)
	{
		$this->db->insert('detail_peminjaman', $where);
		return $this->db->insert_id();
	}

    function cetak($id){
        // return $this->db->get('peminjaman');
        $this->db->query("SELECT * FROM peminjaman pj , member mb, 
        WHERE pj.kode_member=mb.kode_member AND pj.id_peminjaman='$id'")->rersult();
    }

    function pdf($where,$table){                              
        return $this->db->get_where($table,$where);

    }

    function GenerateNumberBarcode()
    {
        // return $nextNoTransaksi;

            $this->db->select('RIGHT(detail_peminjaman.kode_detail_peminjaman,2) as kode_detail_peminjaman', FALSE);
            $this->db->order_by('kode_detail_peminjaman','DESC');    
            $this->db->limit(1);    
            $query = $this->db->get('detail_peminjaman');      //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0){      
            //jika kode ternyata sudah ada.      
            $data = $query->row();      
            $code = intval($data->kode_detail_peminjaman) + 1;    
        }
        else {      
            //jika kode belum ada      
            $code = 1;    
        }
            $kodemaks = str_pad($code, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
            $kodejadi2 = "BOK-1540-".$kodemaks;    // hasilnya ODJ-9921-0001 dst.
            return $kodejadi2;  
    }

    function query_nota($noinv){
        $this->db->where('id_peminjaman', $noinv);
        return $this->db->get('peminjaman')->row();
    }

    function query_nota2($noinv){
        $this->db->where('id_peminjaman', $noinv);
        $this->db->join('buku','detail_peminjaman.kode_buku=buku.kode_buku');
        return $this->db->get('detail_peminjaman')->result();
    }

    public function get_nota_count_buku_peminjaman($where){
        $this->db->select('count(kode_buku) as jml_buku');
        $this->db->where($where);
        //$this->db->group_by('id_barang');
        return $this->db->get('detail_peminjaman')->row();
    }

}

/* End of file Mod_peminjaman.php */
