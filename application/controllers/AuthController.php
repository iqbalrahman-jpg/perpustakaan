<?php

defined('BASEPATH') or exit('No direct script access allowed');



class AuthController extends CI_Controller

{



    function __construct()

    {

        parent::__construct();

        $this->load->library('form_validation');

        $this->load->library('session');

        $this->load->model('AdminModel');

    }



    public function index()

    {

        $this->form_validation->set_rules('email','Email','trim|required|valid_email'); //Membuat rules untuk input form email

        $this->form_validation->set_rules('pass','Pass','trim|required'); //Membuat rules untuk input form password



        if($this->form_validation->run() == false){

            

            $this->load->view('Auth/Template/Auth_Header');

            $this->load->view('Auth/Login');

            $this->load->view('Auth/Template/Auth_Footer');



        }else{

            $this->login(); //Mengarahkan ke Function Login

        }

    }




    private function login(){

        $email = $this->input->post('email');

        $password = $this->input->post('pass');

        $passwordx = md5($password); //Membuat password menjadi MD5



        $user = $this->db->get_where('admin',['email_admin' => $email,'password_admin' => $passwordx])->row();

        $user_length = $this->db->get_where('admin',['email_admin' => $email,'password_admin' =>  $passwordx])->num_rows();

        if($user_length == 0) {

             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Please check your email or password and try again.</div>', 300); //Membuat pesan alert jika password / email salah

            redirect('AuthController','refresh'); 

        }else{

             $data = array(

                'id_admin' => $user->id_admin,

                'role' => $user->role,

                'nama_admin' => $user->nama_admin,

                'no_telp_admin' => $user->no_telp_admin,

                'email_admin' => $user->email_admin,

                'password_admin' => $user->password_admin,

                'alamat_admin' => $user->alamat_admin,

                'foto_admin' => $user->foto_admin

            );

            $this->session->set_userdata($data);

            redirect('HomeController');

        }

    }



    public function register()

    {

        $this->form_validation->set_rules('nama_member','Nama','required|trim'); //Membuat rules untuk input form nama member

        $this->form_validation->set_rules('nim_member','NIM','required|trim'); //Membuat rules untuk input form nim member

        $this->form_validation->set_rules('email_member','Email','required|trim|valid_email|is_unique[admin.email_admin]',[ 

            'is_unique' => 'This email has already registered!' //Mengecek di database email sudah terdaftar / belum

        ]); //Membuat rules untuk input form email

        $this->form_validation->set_rules('alamat_member','Alamat','required|trim'); //Membuat rules untuk input form alamat member

        $this->form_validation->set_rules('password1','Password','required|trim|min_length[3]|matches[password2]',[

            'matches' => 'Password not matches!', //Mengecek di apakah input form password 1 dan input form password 2 sama atau tidak

            'min_length' => 'Password too short'//Mengecek di apakah input form password terlalu pendek atau tidak

        ]);//Membuat rules untuk input form password

        $this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');


        if($this->form_validation->run() == false){


            $this->load->view('Auth/Template/Auth_Header');

            $this->load->view('Auth/Register');

            $this->load->view('Auth/Template/Auth_Footer');



        }else{

            $kode_member = $this->MemberModel->CreateCode(); //Membuat kode member secara otomatis yang ada di Model MemberModel, Function CreateCode

            $data = [

                'kode_member' => $kode_member,

                'role' => 'ADMIN',

                'nama_member' => htmlspecialchars($this->input->post('nama_member', true)),

                'nim_member' => htmlspecialchars($this->input->post('nim_member')),

                'email_member' => htmlspecialchars($this->input->post('email_member')),

                'password_member' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),

                'alamat_member' => $this->input->post('alamat_member'),

                'foto_member' => 'default.jpg'

            ];

            $this->db->insert('member',$data);

            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Email berhasil disimpan, silahkan login</div>'); //Membuat pesan alert jika register berhasil dilakukan

            redirect('AuthController');

        }

    }





    public function logout(){

        $this->session->unset_userdata('email'); //Melakukan unset data session email pengguna

        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Anda telah logout</div>'); //Membuat pesan alert jika logout dilakukan

        $this->session->sess_destroy(); //Menghapus Session

            redirect('AuthController');

    }



    public function restricted(){

        $this->load->view('errors/Template/Header');

        $this->load->view('errors/404');

        $this->load->view('errors/Template/Footer');

    }





   

}