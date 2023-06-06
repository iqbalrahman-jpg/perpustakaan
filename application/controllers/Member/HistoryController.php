<?php

defined('BASEPATH') or exit('No direct script access allowed');



class HistoryController extends CI_Controller

{



	 public function __construct()

    {

        parent::__construct();

        $this->load->model(array('Mod_history'));

        $this->load->library('form_validation');

        $this->load->library('session');

        if($this->session->userdata('role') != "MEMBER") {

            redirect('AuthController');

        }

    }

    

    

    public function peminjaman()

    {

        // $kode_detail_peminjaman = $this->Mod_Peminjaman->GenerateNumberBarcode();

        $data_header['user'] = $this->db->get_where('member',['email_member' => $this->session->userdata('email_member')])->row_array();

        $this->load->view('Member/Template/Header',$data_header);

        $this->load->view('Member/HistoryPeminjaman');

        $this->load->view('Member/Template/Footer');

    }



    public function get_tampil_pinjaman()

    {

        $id_member = $this->session->userdata("kode_member");

        $data = $this->Mod_history->get_tampil_pinjaman($id_member);

        //print_r($this->db->last_query());

        echo json_encode($data);

    }



    public function download_ebook(){

        $data_header['user'] = $this->db->get_where('member',['email_member' => $this->session->userdata('email_member')])->row_array();

        $this->load->view('Member/Template/Header',$data_header);

        $this->load->view('Member/HistoryDownload');

        $this->load->view('Member/Template/Footer');

    }



    public function get_tampil_download_history(){

        $id_member = $this->session->userdata("kode_member");

        $data = $this->Mod_history->get_tampil_download_history($id_member);

        //print_r($this->db->last_query());

        echo json_encode($data);

    }



}	