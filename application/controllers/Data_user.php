<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_user extends CI_Controller
{

        public function index()
        {
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();
            $data['tampilkan'] =$this->tambah_user->get_data('user')->result();
            $data['title'] ='Data user';
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/daftarTable', $data);
            $this->load->view('admin/data_user',$data); 
            $this->load->view('templates/footer');

        }
 



}

?>