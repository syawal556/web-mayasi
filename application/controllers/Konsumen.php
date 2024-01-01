<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Konsumen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {   
        $this->form_validation->set_rules('nama_pelanggan','Name','required|trim');
        $this->form_validation->set_rules('no_meja','Nomor Meja','required|trim');
        if ($this->form_validation->run()== false) {
            $data['title'] ='silahkan masukan nama dan tempat duduk anda';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('konsumen/index');
            $this->load->view('templates/auth_footer');
           
        } else {
             
            $data = [
                'nama_pelanggan' => htmlspecialchars($this->input->post('nama_pelanggan',true)),
                'no_meja' => htmlspecialchars($this->input->post('no_meja',true)),
            ];

            $this->db->insert('tbl_pesanan', $data);
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Akun berhasil di daftarkan! silahkan login dengan akun anda .
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('Auth/daftarMenu');
        }
    }


    public function login_konsumen()
    {
       
    }
}