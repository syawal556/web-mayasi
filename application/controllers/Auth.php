<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_menu');
    }

    public function index()
    {

        $this->load->view('auth/index');
    }
    


    public function order()
    {
        $data['tampilMenu'] = $this->M_menu->ambil_data('daftar_menu')->result();
        $this->load->view('auth/order');
    }



    public function daftarMenu()
    {
        $data['daftarMenu'] = $this->M_menu->ambil_data()->result();
        $data['title'] = 'Silahkan pilih Menu anda';
        $this->load->view('template_pesanan/header', $data);
        $this->load->view('template_pesanan/navbar');
        $this->load->view('auth/daftarMenu');
        $this->load->view('template_pesanan/footer');
              
    }


    public function pesanan($id)
    {
        $daftarMenu = $this->M_menu->find($id);
        $data = array(
            'id'      => $daftarMenu->id,
            'qty'     => 1,
            'price'   => $daftarMenu->harga_menu,
            'name'    => $daftarMenu->nama_menu,
           
    );
    
    $this->cart->insert($data);
    redirect('Auth/daftarMenu');

    }

    public function detail_menu()
    {
        if (empty($this->cart->contents())) {
            redirect('Auth/daftarMenu');
        }
        $data['daftarMenu'] = $this->M_menu->ambil_data()->result();
        $data['title'] = 'Jumlah pesanan anda';
        $this->load->view('template_pesanan/header', $data);
        $this->load->view('template_pesanan/navbar');
        $this->load->view('admin/detail_menu', $data);
        $this->load->view('template_pesanan/footer');
    }

    


    public function delete($rowid)
    {
        $this->cart->remove($rowid);
        redirect('Auth/menu_utama');
    }


    public function update()
    {
        $i = 1;
        foreach ($this->cart->contents() as $items) {
            $data = array(
                'rowid' => $items['rowid'],
                'qty'   => $this->input->post($i . '[qty]'),
        );
        $this->cart->update($data);
        $i++;
     } 
     $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert" text-center>
                <strong>Success!</strong> Pesanan Telah bertambah.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>');
     redirect('Auth/menu_utama');

    }

    public function clear()
    {
        $this->cart->destroy();
        redirect('Auth/detail_menu');
    }


    public function pembayaran()
    {
        $data ['pesanan'] = $this->Model_invoice->tampil_data();
        $data['title'] = 'Jumlah pembayaran anda';
        $this->load->view('template_pesanan/start', $data);
        $this->load->view('admin/pembayaran', $data);
        $this->load->view('template_pesanan/end');  
    }



    public function menu_utama()
    {   
        if (empty($this->cart->contents())) {
            redirect('Auth/daftarMenu');
        }

        $data['title'] = 'Detail pesanan anda';
        $this->load->view('template_pesanan/start', $data);
        $data['daftarMenu'] = $this->M_menu->ambil_data()->result();
        $this->load->view('auth/detail_pesanan_pelanggan', $data);
        $this->load->view('template_pesanan/end');   
    }

    public function proses_pesanan()
    {         
        
       $is_processed = $this->Model_invoice->index();
        if($is_processed) {
            $this->cart->destroy();
            $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert" text-center>
                <strong>Success!</strong> Pesanan Telah Diproses.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('Auth');

            // $data['title'] = 'Pesanan Di proses';
            // $data ['pesanan'] = $this->model_invoice->tampil_data();
            // $this->load->view('template_pesanan/start', $data);
            // $data['daftarMenu'] = $this->M_menu->ambil_data()->result();
            // $this->load->view('auth/proses_bayar', $data);
            // $this->load->view('template_pesanan/end');   
        } else {
            $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert" text-center>
                <strong>Success!</strong> Pesanan gagal diproses.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('Auth/pembayaran');
        }



        

    }


    public function struk_admin($id_pesanan)
    {   
        $data ['pesanan'] = $this->Model_invoice->tampil_data();
        $data['invoice'] = $this->Model_invoice->ambil_id_pesanan($id_pesanan);
        $data['detail'] = $this->Model_invoice->ambil_id_detail($id_pesanan);
        $data['title'] ='Struk Pesanan';
        $this->load->view('admin/cetak_struk_pelanggan', $data);
    }


    





}


