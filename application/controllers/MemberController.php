<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MemberController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('MemberModel');
        $this->load->helper('url');
        $this->load->library('Zend');    
        $this->load->library('form_validation');         
        $this->load->library('session');                  
        if($this->session->userdata('role') != "ADMIN") {             
            redirect('AuthController');         
        }    
    }

// view member
    public function index()
    {
        $data_header['user'] = $this->db->get_where('admin',['email_admin' => $this->session->userdata('email_admin')])->row_array();
        $data['member'] = $this->MemberModel->get_member()->result();
        $this->load->view('Admin/Template/Header',$data_header);
        $this->load->view('Admin/Member/Member', $data);
        $this->load->view('Admin/Template/Footer');
    }

    // view tambah member
    public function add_member_view()
    {        
        $data_header['user'] = $this->db->get_where('admin',['email_admin' => $this->session->userdata('email_admin')])->row_array();
        $this->load->view('Admin/Template/Header',$data_header);
        $this->load->view('Admin/Member/MemberAdd');
        $this->load->view('Admin/Template/Footer');
    }

    // view detail member
    public function get_id_member($id)
    {
        $data['detail'] = $this->MemberModel->get_id_member($id);
        $data_header['user'] = $this->db->get_where('admin',['email_admin' => $this->session->userdata('email_admin')])->row_array();
        $this->load->view('Admin/Template/Header',$data_header);
        $this->load->view('Admin/Member/MemberById',$data);
        $this->load->view('Admin/Template/Footer');
    }

    public function get_id_member2($id){
        $data = $this->MemberModel->get_id_member2($id);
        echo json_encode($data);
    }

    // save tambah member
    public function add_member()
    {               
        $kode_member = $this->MemberModel->CreateCode();        
        $nama_member = $this->input->post('nama_member');
        $nim_member = $this->input->post('nim_member');
        $no_telp_member = $this->input->post('no_telp_member');
        $alamat_member = $this->input->post('alamat_member');
        $email_member = $this->input->post('email_member');
        $password_member = $this->input->post('password_member');
        $foto_member = $_FILES['foto_member']['name'];

        if ($foto_member = '') {
        } else {
            $config['upload_path'] = './assets/upload/foto_member';
            $config['allowed_types'] = 'jpg|jpeg|png';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto_member')) {
                echo "Foto Diri Gagal Di-Upload\n";
            } else {
                $foto_member = $this->upload->data('file_name');
            }
        }

        $data = array(
            'kode_member' => $kode_member,
            'nama_member' => $nama_member,
            'role' => 'MEMBER',
            'nim_member' => $nim_member,
            'no_telp_member' => $no_telp_member,
            'alamat_member' => $alamat_member,
            'email_member' => $email_member,
            'password_member' => MD5($password_member),
            'foto_member' => $foto_member
        );
       
        $this->MemberModel->insert_member($data, 'member');
        redirect('MemberController');
    }

    // view edit member
    public function edit_member_view($id)
    {
        $data['member'] = $this->MemberModel->get_id_member($id);
        $data_header['user'] = $this->db->get_where('admin',['email_admin' => $this->session->userdata('email_admin')])->row_array();
        $this->load->view('Admin/Template/Header',$data_header);
        $this->load->view('Admin/Member/MemberEdit', $data);
        $this->load->view('Admin/Template/Footer');
    }

    // simpan edit member
    public function edit_member()
    {
        $id_member =  $this->input->post('id_member');
        $kode_member = $this->input->post('kode_member');
        $nama_member = $this->input->post('nama_member');
        $nim_member = $this->input->post('nim_member');
        $no_telp_member = $this->input->post('no_telp_member');
        $alamat_member = $this->input->post('alamat_member');
        $email_member = $this->input->post('email_member');
        $password_member = password_hash($this->input->post('password_member'),PASSWORD_DEFAULT);
        $foto_member = $_FILES['foto_member']['name'];
        if ($foto_member) {
            $config['upload_path'] = './assets/upload/foto_member';
            $config['allowed_types'] = 'jpg|jpeg|png';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_member')) {
                $foto_member = $this->upload->data('file_name');
                $this->db->set('foto_member', $foto_member);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $data = array();

        if ($password_member != "") {
            $data = array(
                'password_member' => MD5($password_member)
            );
        }

        if ($foto_member != "") {
            $data += array(
                'foto_member' => $foto_member
            );
        }

        $data += array(
            'kode_member' => $kode_member,
            'nama_member' => $nama_member,
            'nim_member' => $nim_member,
            'no_telp_member' => $no_telp_member,
            'alamat_member' => $alamat_member,
            'email_member' => $email_member,
        );

        $where = array(
            'id_member' => $id_member
        );

        $this->MemberModel->edit_member('member', $data, $where);
        redirect('MemberController');
    }

    // detele member
    public function delete_member($id_member)
    {
        $where = array('id_member' => $id_member);
        $this->MemberModel->delete_member($where, 'member');
        redirect('MemberController');
    }

    // barcode
    public function Barcode($code)
    {
        $this->load->library('Zend');
        $this->zend->load('Zend/Barcode');
        Zend_Barcode::render('code128', 'image', array(
        'text'=>$code,
        'fontSize'=> 10,
        'barThickWidth' => 5,
        'barHeight' => 25,
        'drawText' =>true
        ), array());
    }

    public function Cetak_Kartu(){
        $data_header['user'] = $this->db->get_where('admin', ['email_admin' => $this->session->userdata('email_admin')])->row_array();

        $this->load->view('Admin/Template/Header', $data_header);
        $this->load->view('Admin/Member/MemberCetakKartu');
        $this->load->view('Admin/Template/Footer');

    }

     // ambil data member sebagai json
    public function get_list_member()
    {
        $data = $this->MemberModel->get_list_member();
        echo json_encode($data);
    }

    public function print_kartu($id){
        $data['detail'] = $this->MemberModel->get_id_member($id);
        $this->load->view('Admin/Transaksi/CetakKartuMember', $data);

    }

}
