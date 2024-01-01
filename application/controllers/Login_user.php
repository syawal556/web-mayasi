<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_user extends CI_Controller
{

        public function __construct()
        {
            parent::__construct();
            $this->load->model('model_invoice');
        }
        public function index()
        {       
                
                $data['user'] = $this->db->get_where('user', ['email' =>
                $this->session->userdata('email')])->row_array();
                $data['tampilMenu'] = $this->M_menu->ambil_data('daftar_menu')->result();        
                $data['title'] ='Welcome To Dashboard User';
                $this->load->view('templates_user/header', $data);
                $this->load->view('templates_user/sidebar', $data);
                $this->load->view('templates_user/topbar', $data);
                $this->load->view('userLogin/index', $data); 
                $this->load->view('templates_user/footer');

              
               
        }



        public function tampilan_menu_user()
        {
                $data['user'] = $this->db->get_where('user', ['email' =>
                $this->session->userdata('email')])->row_array();
                $data['tampilMenu'] = $this->M_menu->ambil_data('daftar_menu')->result();        
                $data['title'] ='Daftar Menu';
                $this->load->view('templates_user/header', $data);
                $this->load->view('templates_user/sidebar', $data);
                $this->load->view('templates_user/topbar', $data);
                $this->load->view('userLogin/menu_user', $data); 
                $this->load->view('templates_user/footer');


        }

        public function index_menu()
        {
            $data ['pesanan'] = $this->model_invoice->belum_bayar();
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();    
            $data['title'] ='Daftar Pesanan Konsumen';
            $this->load->view('templates_user/header', $data);
            $this->load->view('templates_user/sidebar', $data);
            $this->load->view('templates_user/topbar', $data);
            $this->load->view('userLogin/detail_menu_user', $data); 
            $this->load->view('templates_user/footer');

        }

        public function detail_pesanan_user($id_pesanan)
         {
        
                $data['invoice'] = $this->model_invoice->ambil_id_pesanan($id_pesanan);
                $data['detail'] = $this->model_invoice->ambil_id_detail($id_pesanan);
                $data['user'] = $this->db->get_where('user', ['email' =>
                $this->session->userdata('email')])->row_array();    
                $data['title'] ='Detail Pesanan';
                $this->load->view('templates_user/header', $data);
                $this->load->view('templates_user/sidebar', $data);
                $this->load->view('templates_user/topbar', $data);
                $this->load->view('userLogin/detail_pesanan_user', $data); 
                $this->load->view('templates_user/footer');

         }

        //  public function struk_user($id_pesanan)
        //  {
        //         $data ['pesanan'] = $this->model_invoice->tampil_data();
        //         $data['invoice'] = $this->model_invoice->ambil_id_pesanan($id_pesanan);
        //         $data['detail'] = $this->model_invoice->ambil_id_detail($id_pesanan);
        //         $data['title'] ='Struk Pesanan';
        //         $this->load->view('userlogin/cetak_struk_pelanggan', $data);
        //  }

         
         public function user_proses_pesanan($id_pesanan)
         {
             $data = array(
                 'id_pesanan' => $id_pesanan,
                 'status_pesanan' => 1,
             );
             $this->model_invoice->pesanan_status($data);
             $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                 <strong>Success!</strong> Pesanan Telah Diproses, Mohon teliti untuk Memproses Pesanan pelanggan!!!.
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
                 </div>');
                 redirect('Login_user/index_menu');
     
         }


         public function pesanan_telah_diproses()
    {
        
        $data['telah_diproses'] = $this->model_invoice->telah_diproses();
        $data ['pesanan'] = $this->model_invoice->tampil_data();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();    
        $data['title'] ='Daftar pesanan pelanggan';
        $this->load->view('templates_user/header', $data);
        $this->load->view('templates_user/sidebar', $data);
        $this->load->view('templates_user/topbar', $data);
        $this->load->view('userLogin/pesanan_selesai_user', $data); 
        $this->load->view('templates_user/footer');


    }

}       

?>