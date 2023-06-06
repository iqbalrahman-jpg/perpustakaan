<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Member extends CI_Controller

{

    function __construct()

    {

        parent::__construct();

        $this->load->helper('url');

        $this->load->library('form_validation');

        $this->load->library('session');

        $this->load->model('MemberModel');

        if($this->session->userdata('role') != "MEMBER") {

            redirect('AuthController');

        }

    }



    public function index()

    {

        $data_header['user'] = $this->db->get_where('member',['email_member' => $this->session->userdata('email_member')])->row_array();

        $id_member = $this->session->userdata("kode_member");

        $data['peminjaman'] = $this->MemberModel->data_peminjaman($id_member)->result();

        $this->load->view('Member/Template/Header',$data_header);

        $this->load->view('Member/Member',$data);

        $this->load->view('Member/Template/Footer');

    }

    

    public function Edit_View()

    {

        $data_header['user'] = $this->db->get_where('member',['email_member' => $this->session->userdata('email_member')])->row_array();        

        $this->load->view('Member/Template/Header',$data_header);

        $this->load->view('Member/MemberEdit',$data_header);

        $this->load->view('Member/Template/Footer');

    }



    public function Simpan_Edit()

    {

        $id_member =  $this->input->post('id_member');

        $kode_member = $this->input->post('kode_member');

        $nama_member = $this->input->post('nama_member');

        $no_telp_member = $this->input->post('no_telp_member');

        $alamat_member = $this->input->post('alamat_member');

        $email_member = $this->input->post('email_member');

        $password_member = $this->input->post('password_member');

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

            'no_telp_member' => $no_telp_member,

            'alamat_member' => $alamat_member,

            'email_member' => $email_member,

        );



        $where = array(

            'id_member' => $id_member

        );



        $this->MemberModel->edit_member('member', $data, $where);

        redirect('Member/Member/index');

    }

}