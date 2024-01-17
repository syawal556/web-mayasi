<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_invoice');
    }


    public function index()
    {
        $data['belum_bayar'] = $this->Model_invoice->belum_bayar();
        $data['telah_diproses'] = $this->Model_invoice->telah_diproses();
        $data ['pesanan'] = $this->Model_invoice->tampil_data();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();    
        $data['title'] ='Daftar pesanan pelanggan';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pesanan_pelanggan', $data); 
        $this->load->view('templates/footer');


    }

    public function index_pesanan()
    {
        
        $data['telah_diproses'] = $this->Model_invoice->telah_diproses();
        $data['telah_diproses_user'] = $this->Model_invoice->telah_diproses_user();
        $data ['pesanan'] = $this->Model_invoice->tampil_data();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();    
        $data['title'] ='Daftar pesanan pelanggan';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pesanan_selesai', $data); 
        $this->load->view('templates/footer');


    }


    public function detail_pesanan($id_pesanan)
    {
        $data['invoice'] = $this->Model_invoice->ambil_id_pesanan($id_pesanan);
        $data ['pesanan'] = $this->Model_invoice->tampil_data();
        $data['detail'] = $this->Model_invoice->ambil_id_detail($id_pesanan);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();    
        $data['title'] ='Detail Pesanan';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/detail_pesanan_pelanggan', $data); 
        $this->load->view('templates/footer');

    }
    public function validasi_pembayaran($id_pesanan)
    {
        $data['invoice'] = $this->Model_invoice->ambil_id_pesanan($id_pesanan);
        $data['detail'] = $this->Model_invoice->ambil_id_detail($id_pesanan);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();    
        $data['title'] ='Validasi Pembayaran Konsumen';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/valid_pembayaran', $data); 
        $this->load->view('templates/footer');

    }

    public function proses_lanjut($id_pesanan)
    {
        $data = array(
            'id_pesanan' => $id_pesanan,
            'status_pesanan' => 1,
        );
        $this->Model_invoice->pesanan_status($data);
        $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Pesanan Telah Diproses, Mohon teliti untuk Memproses Pesanan pelanggan!!!.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('Pesanan');

    }
    public function after_bayar($id_pesanan)
    {
        $data = array(
            'id_pesanan' => $id_pesanan,
            'Status_bayar' => 5,
        );
        $this->Model_invoice->pesanan_status($data);
        $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Pesanan Telah Diproses, Mohon teliti untuk Memproses Pesanan pelanggan!!!.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('Pesanan/index_pesanan');

    }

    public function pesanan_batal($id_pesanan)
    {
        $data = array(
            'id_pesanan' => $id_pesanan,
            'status_pesanan' => 2,
        );
        $this->Model_invoice->pesanan_gagal($data);
        $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Pesanan Telah Dibatalkan!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('Pesanan');
    }

    public function batal()
    {
        $data ['cancel'] = $this->Model_invoice->cancel_pesanan();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();    
        $data['title'] ='Detail Pesanan';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/cancel_pesanan', $data); 
        $this->load->view('templates/footer');
    }

    public function konfirmasi_pesanan($id_pesanan)
    {
        $data = array(
            'id_pesanan' => $id_pesanan,
            'order_id' => 1,
        );
        $this->Model_invoice->acc_pesanan($data);
        $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Pesanan Telah DiKonfirmasi!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('Pesanan');
    }
    





    


}