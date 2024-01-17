<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller
{
    function __construct()

    {
           parent::__construct();
           $this->load->model('Tambah_user');
           $this->load->model('M_menu');
           $this->load->model('Model_transfer');
           $this->load->helper(array('form', 'url'));
    }


    public function index()
    {
        
        $data['tampilMenu'] = $this->M_menu->ambil_data('daftar_menu')->result();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] ='Daftar menu';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/menu_user', $data); 
        $this->load->view('templates/footer');
    }
    public function view_edit_menu($id)
    {
        $data['menu'] = $this->M_menu->get_menu_by_id($id);
        // $data ['id_menu'] = $this->M_menu->ambil_id_menu($id);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] ='Daftar menu';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/form_edit_menu', $data); 
        $this->load->view('templates/footer');
    }

    public function update_menu($id)
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 2048; // in KB
        $config['max_width']            = 2000;
        $config['max_height']           = 2000;

        $this->load->library('upload', $config);
        
        $data = array(
            'id' => $id,
            'nama_menu'  =>$this->input->post('nama_menu'),
            'keterangan' =>$this->input->post('keterangan'),
            'harga_menu' => $this->input->post('harga_menu'),
            'gambar' => $this->upload->data('file_name'),
        );

        $this->M_menu->edit_data_menu($data, 'daftar_menu');
        $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Edit Data Berhasil.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect ('Menu');

    }
    
    public function hapus_menu($id)
    {
            $where = array ('id' => $id);
            $this->Tambah_user->delete($where, 'daftar_menu');
            $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Data Berhasil Dihapus.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('Menu');
    }

    public function transfer()
    {
        $data['daftarMenu'] = $this->M_menu->ambil_data()->result();
        $data['title'] = 'Metode pembayaran';
        $this->load->view('template_pesanan/start', $data);
        $this->load->view('Auth/metode_transfer', $data);
        $this->load->view('template_pesanan/end');   

    }

    public function transfer_selesai()
    {         
        
       $is_processed = $this->Model_transfer->index();
        if($is_processed) {
            $data['title'] = 'Pesanan telah Diproses';
            $this->load->view('template_pesanan/start', $data);
            $data['daftarMenu'] = $this->M_menu->ambil_data()->result();
            $this->load->view('Auth/proses_bayar', $data);
            $this->load->view('template_pesanan/end');   
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

    public function do_input()
     {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama_menu', 'Nama Menu', 'required');
        $this->form_validation->set_rules('harga_menu', 'Harga Menu', 'required|numeric');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'max_length[500]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('input_menu_form');
        }
        else {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|jpeg|png';
            $config['max_size']             = 2048; // in KB
            $config['max_width']            = 2000;
            $config['max_height']           = 2000;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('gambar')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('input_menu_form', $error);
            }
            else {
                $data = array(
                    'nama_menu' => $this->input->post('nama_menu'),
                    'harga_menu' => $this->input->post('harga_menu'),
                    'keterangan' => $this->input->post('keterangan'),
                    // 'kategori' =>$this->input->post('kategori'),
                    'gambar' => $this->upload->data('file_name'),
                );
                $this->db->insert('daftar_menu', $data);
                $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert" text-center>
                <strong>Success!</strong> Menu Berhasil Ditambahkan!!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('Menu');
               
            }
        }
    }

    public function nonaktif_menu($id)
    {
        $data = array(
            'id' => $id,
            'status_menu' => 1,
        );
        $this->Model_invoice->no_fungsi_menu($data);
        $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                 Menu Telah Dinonaktifkan
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
                 </div>');
        redirect('Menu');
    }

    public function aktifkan_menu($id)
    {
        $data = array(
            'id' => $id,
            'status_menu' => 2,
        );
        $this->Model_invoice->jalankan_menu($data);
        $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
                 Menu Telah Diaktifkan
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
                 </div>');
        redirect('Menu');

    }

}





?>