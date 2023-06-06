<?php





class BukuController extends CI_Controller

{

    function __construct()

    {

        parent::__construct();

        $this->load->library('Zend'); //memanggil library untuk membuat sebuh barcode dan qrcode

        $this->load->model(array('BukuModel'));

        $this->load->helper('url');         

        $this->load->library('form_validation');         

        $this->load->library('session');                  

        //Melakukan pengecekan untuk hak akses pengguna ADMIN / MEMBER
        if($this->session->userdata('role') != "ADMIN") {             

            redirect('AuthController');         

        } 

    }



    public function index()

    {

        $data['buku'] = $this->BukuModel->get_data("buku")->result();

        $data_header['user'] = $this->db->get_where('admin',['email_admin' => $this->session->userdata('email_admin')])->row_array(); //Mendapatkan data session berdasarkan email pengguna

        // $kode = '12345';

        $this->load->view('Admin/Template/Header',$data_header);

        $this->load->view('Admin/Buku/Buku', $data);

        $this->load->view('Admin/Template/Footer');

    }



    // Add data pada Bagian Buku
    public function add_view_buku()

    {

        $data_header['user'] = $this->db->get_where('admin',['email_admin' => $this->session->userdata('email_admin')])->row_array(); //Mendapatkan data session berdasarkan email pengguna

        $this->load->view('Admin/Template/Header',$data_header);

        $this->load->view('Admin/Buku/AddBuku');

        $this->load->view('Admin/Template/Footer');

    }


    // Add data pada Bagian Komik
    public function add_view_komik()

    {

        $data_header['user'] = $this->db->get_where('admin',['email_admin' => $this->session->userdata('email_admin')])->row_array();//Mendapatkan data session berdasarkan email pengguna

        $this->load->view('Admin/Template/Header',$data_header);

        $this->load->view('Admin/Buku/AddKomik');

        $this->load->view('Admin/Template/Footer');

    }

     // Add data pada Bagian Novel
     public function add_view_novel()

     {
 
         $data_header['user'] = $this->db->get_where('admin',['email_admin' => $this->session->userdata('email_admin')])->row_array();//Mendapatkan data session berdasarkan email pengguna
 
         $this->load->view('Admin/Template/Header',$data_header);
 
         $this->load->view('Admin/Buku/AddNovel');
 
         $this->load->view('Admin/Template/Footer');
 
     }


    public function add_view_tugasakhir()

    {

        $data_header['user'] = $this->db->get_where('admin',['email_admin' => $this->session->userdata('email_admin')])->row_array(); //Mendapatkan data session berdasarkan email pengguna

        $this->load->view('Admin/Template/Header',$data_header);

        $this->load->view('Admin/Buku/AddTugasAkhir');

        $this->load->view('Admin/Template/Footer');

    }

    public function add_view_pkl()

    {

        $data_header['user'] = $this->db->get_where('admin',['email_admin' => $this->session->userdata('email_admin')])->row_array(); //Mendapatkan data session berdasarkan email pengguna

        $this->load->view('Admin/Template/Header',$data_header);

        $this->load->view('Admin/Buku/AddPKL');

        $this->load->view('Admin/Template/Footer');

    }


    public function add_view_majalah()

    {

        $data_header['user'] = $this->db->get_where('admin',['email_admin' => $this->session->userdata('email_admin')])->row_array(); //Mendapatkan data session berdasarkan email pengguna

        $this->load->view('Admin/Template/Header',$data_header);

        $this->load->view('Admin/Buku/AddMajalah');

        $this->load->view('Admin/Template/Footer');

    }



    public function detail_buku($id)

    {

        $where = array('id_buku' => $id);
        $data_header['user'] = $this->db->get_where('admin', ['email_admin' => $this->session->userdata('email_admin')])->row_array(); //Mendapatkan data session berdasarkan email pengguna
        $data['buku'] = $this->BukuModel->get_id_buku($id);
        $jenis_buku = $this->BukuModel->get_id_buku2($id);
        //seleksi view detail dari setiap jenis buku 
        if ($jenis_buku->jenis_buku == "Komik") { //seleksi view detail buku (jenis buku : Komik)
            $this->load->view('Admin/Template/Header', $data_header);
            $this->load->view('Admin/Buku/DetailKomik', $data);
            $this->load->view('Admin/Template/Footer');
        } elseif ($jenis_buku->jenis_buku == "Buku Umum") { //seleksi view detail buku (jenis buku : Buku Umum)
            $this->load->view('Admin/Template/Header', $data_header);
            $this->load->view('Admin/Buku/DetailBuku', $data);
            $this->load->view('Admin/Template/Footer');
        } elseif ($jenis_buku->jenis_buku == "Majalah") { //seleksi view detail buku (jenis buku : Majalah)
            $this->load->view('Admin/Template/Header', $data_header);
            $this->load->view('Admin/Buku/DetailMajalah', $data);
            $this->load->view('Admin/Template/Footer');
        } elseif ($jenis_buku->jenis_buku == "Tugas Akhir") { //seleksi view detail buku (jenis buku : Tugas Akhir)
            $this->load->view('Admin/Template/Header', $data_header);
            $this->load->view('Admin/Buku/DetailTugasAkhir', $data);
            $this->load->view('Admin/Template/Footer');
        } elseif ($jenis_buku->jenis_buku == "Laporan PKL") { //seleksi view detail buku (jenis buku : Laporan PKL)
            $this->load->view('Admin/Template/Header', $data_header);
            $this->load->view('Admin/Buku/DetailPKL', $data);
            $this->load->view('Admin/Template/Footer');
        } elseif ($jenis_buku->jenis_buku == "Novel") { //seleksi view detail buku (jenis buku : Novel)
            $this->load->view('Admin/Template/Header', $data_header);
            $this->load->view('Admin/Buku/DetailNovel', $data);
            $this->load->view('Admin/Template/Footer');
        } else {
            // seleksi jenis buku tidak ada di dalam database
            echo "Pilihan Tidak Ada";
        }
    }



    public function add_buku()

    {

        $data['kode_buku'] = $this->input->post('kode_buku', true);

        $data['judul_buku'] = $this->input->post('judul_buku', true);

        $data['penulis_buku'] = $this->input->post('penulis_buku', true);

        $data['nim_penulis'] = $this->input->post('nim_penulis', true);

        $data['penerbit_buku'] = $this->input->post('penerbit_buku', true);

        $data['tahun_terbit'] = $this->input->post('tahun_terbit', true);

        $data['sinopsis'] = $this->input->post('sinopsis', true);

        $data['stok_buku'] = $this->input->post('stok_buku', true);

        $data['rak_buku'] = $this->input->post('rak_buku', true);

        $data['jenis_buku'] = $this->input->post('jenis_buku', true);

        $data['tanggal_masuk'] = $this->input->post('tanggal_masuk', true);

        $data['edisi_majalah'] = $this->input->post('edisi_majalah', true);
        
        $data['isbn'] = $this->input->post('isbn', true);


        // membuat fungsi mengupload file gambar sampul buku
        $configa['upload_path'] = realpath('./assets/upload/cover');

        $configa['allowed_types']        = 'jpg|png|jpeg';

        $configa['max_size'] = '2000000';



        $reptext = preg_replace('/[^A-Za-z0-9\  ]/', '', $this->input->post('judul_buku'));

        $new_name = str_replace(" ", "-", str_replace(".", "", $reptext))."-1".time();

        $configa['file_name'] = $new_name;

        $this->load->library('upload', $configa);

        $this->upload->initialize($configa);



        if($this->upload->do_upload('sampul_buku')){

            $get_name = $this->upload->data();

            $nama_foto = $get_name['file_name'];

            $data['sampul_buku'] = $nama_foto;

        }


        // membuat fungsi mengupload file E-Book
        $configb['upload_path'] = realpath('./assets/upload/file');

        $configb['allowed_types']        = 'pdf';



        $new_name2 = str_replace(" ", "-", str_replace(".", "", $reptext))."-2".time();

        $configb['file_name'] = $new_name2;

        $this->load->library('upload', $configb);

        $this->upload->initialize($configb);



        if($this->upload->do_upload('file_ebook')){ 

            $get_name = $this->upload->data();

            $nama_foto2 = $get_name['file_name'];

            $data['file_ebook'] = $nama_foto2;

        }



        $this->BukuModel->insert_data($data, 'buku');

        redirect('BukuController');

    }



    //fungsi melakukan edit melalui modal
    public function edit_buku_view($id)

    {

        $where = array('id_buku' => $id);
        $data_header['user'] = $this->db->get_where('admin', ['email_admin' => $this->session->userdata('email_admin')])->row_array(); //Mendapatkan data session berdasarkan email pengguna
        $data['buku'] = $this->BukuModel->get_id_buku($id);
        $jenis_buku = $this->BukuModel->get_id_buku2($id);
        //seleksi view detail dari setiap jenis buku 
        if ($jenis_buku->jenis_buku == "Komik") { //seleksi view detail buku (jenis buku : Komik)
            $this->load->view('Admin/Template/Header', $data_header);
            $this->load->view('Admin/Buku/EditKomik', $data);
            $this->load->view('Admin/Template/Footer');
        } elseif ($jenis_buku->jenis_buku == "Buku Umum") { //seleksi view detail buku (jenis buku : Buku Umum)
            $this->load->view('Admin/Template/Header', $data_header);
            $this->load->view('Admin/Buku/EditBuku', $data);
            $this->load->view('Admin/Template/Footer');
        } elseif ($jenis_buku->jenis_buku == "Majalah") { //seleksi view detail buku (jenis buku : Majalah)
            $this->load->view('Admin/Template/Header', $data_header);
            $this->load->view('Admin/Buku/EditMajalah', $data);
            $this->load->view('Admin/Template/Footer');
        } elseif ($jenis_buku->jenis_buku == "Tugas Akhir") { //seleksi view detail buku (jenis buku : Tugas Akhir)
            $this->load->view('Admin/Template/Header', $data_header);
            $this->load->view('Admin/Buku/EditTugasAkhir', $data);
            $this->load->view('Admin/Template/Footer');
        } elseif ($jenis_buku->jenis_buku == "Laporan PKL") { //seleksi view detail buku (jenis buku : Laporan PKL)
            $this->load->view('Admin/Template/Header', $data_header);
            $this->load->view('Admin/Buku/EditPKL', $data);
            $this->load->view('Admin/Template/Footer');
        } elseif ($jenis_buku->jenis_buku == "Novel") { //seleksi view detail buku (jenis buku : Novel)
            $this->load->view('Admin/Template/Header', $data_header);
            $this->load->view('Admin/Buku/EditNovel', $data);
            $this->load->view('Admin/Template/Footer');
        } else {
            #output gak keluar
            echo "Pilihan Tidak Ada";
        }
    }



    public function edit_buku()

    {

        $id = $this->input->post('id_buku');
        $bookTitle = $this->input->post('judul_buku');
        $author = $this->input->post('penulis_buku');
        $publisher = $this->input->post('penerbit_buku');
        $publishYear = $this->input->post('tahun_terbit');
        $synopsis = $this->input->post('sinopsis');
        $bookStock = $this->input->post('stok_buku');
        $bookCase = $this->input->post('rak_buku');
        $edisi = $this->input->post('edisi_majalah');
        $authornim = $this->input->post('nim_penulis');
        $cisbn = $this->input->post('isbn');
        $cover = $_FILES['sampul_buku']['name'];
        
        // seleksi dan fungsi untuk mengupload gambar sampul buku
        if ($cover) {
            $config['upload_path'] = './assets/upload/cover';
            $config['allowed_types'] = 'jpg|jpeg|png';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('sampul_buku')) {
                $cover = $this->upload->data('file_name');
                $this->db->set('sampul_buku', $cover);
            } else {
                echo $this->upload->display_errors();
            }
        }

        // membuat data array untuk menyimpan data buku dan mengirimnya ke database
        $data = array();

        if ($cover != "") {
            $data = array(
                'sampul_buku' => $cover
            );
        }

        $data += array(
            'judul_buku' => $bookTitle,
            'penulis_buku' => $author,
            'penerbit_buku' => $publisher,
            'tahun_terbit' => $publishYear,
            'sinopsis' => $synopsis,
            'stok_buku' => $bookStock,
            'rak_buku' => $bookCase,
            'edisi_majalah' => $edisi,
            'nim_penulis' => $authornim,
            'isbn'=> $cisbn
        );

        $where = array(
            'id_buku' => $id
        );

        $this->BukuModel->edit_data('buku', $data, $where);
        redirect('BukuController');
    }



    //fungsi melakukan delete

    public function delete_buku($id_buku)

    {

        $where = array('id_buku' => $id_buku); 

        $this->BukuModel->delete_data($where, 'buku');

        redirect('BukuController');

    }



    // membuat fungsi membuat barcode dengan libary zend
    public function Barcode($code)

    {

        $this->load->library('Zend');

        $this->zend->load('Zend/Barcode');

        Zend_Barcode::render('code128', 'image', array(

            'text' => $code,

            'fontSize' => 10,

            'barThickWidth' => 5,

            'barHeight' => 25,

            'drawText' => true

        ), array());

    }


    // membuat view pada bagian laporan buku masuk
    public function Laporan_buku()

    {

        $data['buku'] = $this->BukuModel->get_data("buku")->result(); //memanggil data buku menggunakan result

        $data_header['user'] = $this->db->get_where('admin',['email_admin' => $this->session->userdata('email_admin')])->row_array(); //Mendapatkan data session berdasarkan email pengguna

        $this->load->view('Admin/Template/Header',$data_header);

        $this->load->view('Admin/Buku/BukuLaporan', $data);

        $this->load->view('Admin/Template/Footer');

    }


    //membuat menu search buku masuk dengan melakukan seleksi 'date range' untuk mengambil data buku yang sudah masuk
    public function search()

    {

        $first_date = $_POST['first_date']; // inisialisasi data POST untuk 'date range' ke 1

        $second_date = $_POST['second_date']; // inisialisasi data POST untuk 'date range' ke 2

        $data['buku'] = $this->BukuModel->getdate($first_date, $second_date); // melakukan seleksi pencarian dari range / jarak antara 'date rannge' ke 1 sampai ke 2
 
        $data_header['user'] = $this->db->get_where('admin',['email_admin' => $this->session->userdata('email_admin')])->row_array(); //Mendapatkan data session berdasarkan email pengguna

        $this->load->view('Admin/Template/Header',$data_header);

        $this->load->view('Admin/Buku/BukuLaporan', $data);

        $this->load->view('Admin/Template/Footer');

    }

    //cetak barcode buku
    public function cetak_barcodebuku($idbuku){

        $data['buku'] = $this->BukuModel->get_id_buku($idbuku);
        $this->load->view('Admin/Buku/CetakKodeBuku', $data);
    }

}

