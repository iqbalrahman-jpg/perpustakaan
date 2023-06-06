<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

    function __construct()     {         
        parent::__construct();         
        $this->load->model('AdminModel');         
        $this->load->helper('url');         
        $this->load->library('form_validation');         
        $this->load->library('session');                  
        if($this->session->userdata('role') != "ADMIN") {             
            redirect('AuthController');         
        }      
    }

    // function construct(){
    //     parent::__construct();         
    //     $this->load->helper('url');         
    //     $this->load->library('form_validation');         
    //     $this->load->library('session');                  
    //     $this->load->model('AdminModel');        
    //     if($this->session->userdata('role') != "ADMIN") {             
    //         redirect('AuthController');         
    //     }      
    // }
    
    public function index()
    {
        $data_header['user'] = $this->db->get_where('admin',['email_admin' => $this->session->userdata('email_admin')])->row_array();
        $data['admin'] = $this->AdminModel->get_admin()->result();
        $this->load->view('Admin/Template/Header',$data_header);
        $this->load->view('Admin/Admin/Admin',$data);
        $this->load->view('Admin/Template/Footer');
        
    }   

    public function add_view()
    {
        $data_header['user'] = $this->db->get_where('admin',['email_admin' => $this->session->userdata('email_admin')])->row_array();
        $this->load->view('Admin/Template/Header',$data_header);
        $this->load->view('Admin/Admin/AdminAdd');
        $this->load->view('Admin/Template/Footer');
    }

    public function get_id_admin($id)
    {
        $data['detail'] = $this->AdminModel->get_id_admin($id);
        $data_header['user'] = $this->db->get_where('admin',['email_admin' => $this->session->userdata('email_admin')])->row_array();
        $this->load->view('Admin/Template/Header',$data_header);
        $this->load->view('Admin/Admin/AdminId', $data);
        $this->load->view('Admin/Template/Footer');
    }

    public function add_admin()
    {
        $nama_admin = $this->input->post('nama_admin');
        $email_admin = $this->input->post('email_admin');
        $password_admin = $this->input->post('password_admin');
        $no_telp_admin = $this->input->post('no_telp_admin');
        $alamat_admin = $this->input->post('alamat_admin');
        $foto_admin = $_FILES['foto_admin']['name'];

        if($foto_admin =''){}else{
            $config['upload_path'] = './upload';
            $config['allowed_types'] = 'jpg|jpeg|png';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('foto_admin')){
                echo "Foto Admin Gagal Di-Upload\n";
            }else{
                $foto_admin = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nama_admin' => $nama_admin,
            'role' => 'ADMIN',
            'email_admin' => $email_admin,  
            'password_admin' => md5($password_admin),
            'no_telp_admin' => $no_telp_admin,
            'alamat_admin' => $alamat_admin,
            'foto_admin' => $foto_admin,
        );

        $this->AdminModel->insert_admin($data, 'admin');
        redirect('AdminController');
    }

    public function edit_view($id)
    {
        $data['admin'] = $this->AdminModel->get_id_admin($id);
        $data_header['user'] = $this->db->get_where('admin',['email_admin' => $this->session->userdata('email_admin')])->row_array();
        $this->load->view('Admin/Template/Header',$data_header);
        $this->load->view('Admin/Admin/AdminEdit', $data);
        $this->load->view('Admin/Template/Footer');
    }

    public function edit_admin()
    {
        $id_admin =  $this->input->post('id_admin');
        $nama_admin = $this->input->post('nama_admin');
        $email_admin = $this->input->post('email_admin');
        $password_admin = $this->input->post('password_admin');
        $no_telp_admin = $this->input->post('no_telp_admin');
        $alamat_admin = $this->input->post('alamat_admin');
        $foto_admin = $_FILES['foto_admin']['name'];
        if ($foto_admin) {
            $config['upload_path'] = './upload';
            $config['allowed_types'] = 'jpg|jpeg|png';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_admin')) {
                $foto_admin = $this->upload->data('file_name');
                $this->db->set('foto_admin', $foto_admin);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $data = array();

        if ($password_admin != "") {
            $data = array(
                'password_admin' => $password_admin
            );
        }

        if ($foto_admin != "") {
            $data += array(
                'foto_admin' => $foto_admin
            );
        }

        $data += array(
            'nama_admin' => $nama_admin,
            'email_admin' => $email_admin,
            'no_telp_admin' => $no_telp_admin,
            'alamat_admin' => $alamat_admin,
        );

        $where = array(
            'id_admin' => $id_admin
        );

        $this->AdminModel->edit_admin('admin', $data, $where);
        redirect('AdminController');
    }

    public function delete_admin($id_admin)
    {
        $where = array('id_admin' => $id_admin);
        $this->AdminModel->delete_admin($where, 'admin');
        redirect('AdminController');
    }
    
}