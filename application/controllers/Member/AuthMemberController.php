<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthMemberController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('MemberModel');

    }

    public function index()
    {
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('pass','Pass','trim|required');  

        if($this->form_validation->run() == false){
            
            $this->load->view('Auth/Template/Auth_Header');
            $this->load->view('Auth/Login');
            $this->load->view('Auth/Template/Auth_Footer');

        }else{
            $this->login();
        }
    }

    private function login(){
        $email = $this->input->post('email');
        $password = $this->input->post('pass');
        $passwordx = md5($password); 

        $user = $this->db->get_where('member',['email_member' => $email,'password_member' => $passwordx])->row();

        $user_length = $this->db->get_where('member',['email_member' => $email,'password_member' =>  $passwordx])->num_rows();
        if($user_length == 0) {
             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Please check your email or password and try again.</div>', 300);
            //  $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Password Salah</div>');

            redirect('AuthController','refresh'); 
        }else{
             $data = array(
                'id_member' => $user->id_member,
                'kode_member' => $user->kode_member,
                'role' => $user->role,
                'nama_member' => $user->nama_member,
                'no_telp_member' => $user->no_telp_member,
                'email_member' => $user->email_member,
                'password_member' => $user->password_member,
                'alamat_member' => $user->alamat_member,
                'foto_member' => $user->foto_member
            );


            $this->session->set_userdata($data);

            // redirect('Member/DashboardController','refresh');
            redirect('Member/Member');
        }
    }





    public function register()
    {
        $this->form_validation->set_rules('nama_member','Nama','required|trim');
		$this->form_validation->set_rules('nim_member','NIM','required|trim');
        $this->form_validation->set_rules('email_member','Email','required|trim|valid_email|is_unique[admin.email_admin]',[
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('alamat_member','Alamat','required|trim');
        $this->form_validation->set_rules('password1','Password','required|trim|min_length[3]|matches[password2]',[
            'matches' => 'Password not matches!',
            'min_length' => 'Password too short'
        ]);
        $this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');
        

        if($this->form_validation->run() == false){

            $this->load->view('Auth/Template/Auth_Header');
            $this->load->view('Auth/Register');
            $this->load->view('Auth/Template/Auth_Footer');

        }else{
            $kode_member = $this->MemberModel->CreateCode();

            $data = [
                'kode_member' => $kode_member,
                'role' => 'MEMBER',
                'nama_member' => htmlspecialchars($this->input->post('nama_member', true)),
				'nim_member' => htmlspecialchars($this->input->post('nim_member', true)),
                'email_member' => htmlspecialchars($this->input->post('email_member')),
                'password_member' => md5($this->input->post('password1')),
                'alamat_member' => $this->input->post('alamat_member'),
                'foto_member' => 'default.jpg'
            ];

            $this->db->insert('member',$data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Email berhasil disimpan, silahkan login</div>');
            redirect('AuthController');
        }
    }


    public function logout(){
        $this->session->unset_userdata('email');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Anda telah logout</div>');
            redirect('Member/AuthMemberController');
    }

    public function restricted(){
        $this->load->view('errors/Template/Header');
        $this->load->view('errors/404');
        $this->load->view('errors/Template/Footer');
    }


   
}