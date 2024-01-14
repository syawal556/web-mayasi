<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{

        function __construct()
        {
               parent::__construct();
               $this->load->model('Tambah_user');
               $this->load->model('M_laporan');
               $this->load->model('Model_invoice');
        }

        public function index()
            {   
                
                $data ['lap_transfer']  = $this->M_laporan->lap_transfer();
                $data ['lap_tunai']  = $this->M_laporan->lap_tunai();
                $data ['laporan']  = $this->M_laporan->lap_keseluruhan();
                $data['tampilMenu'] = $this->M_menu->ambil_data('daftar_menu')->result();
                $data['user'] = $this->db->get_where('user', ['email' =>
                $this->session->userdata('email')])->row_array();
                $data['tampilkan'] =$this->Tambah_user->get_data('user')->result();     
                $data['title'] ='Dashboard admin';
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('templates/daftarTable');
                $this->load->view('admin/utama_admin', $data); 
                $this->load->view('templates/footer');

              
               
        }

        public function delete($id)
        {
                $where = array ('id' => $id);
                $this->Tambah_user->delete($where, 'user');
                $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Data Berhasil Dihapus.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('data_user');
        }


        public function tambahMenu()
    {
        
        $data['tampilMenu'] = $this->M_menu->ambil_data('daftar_menu')->result();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['tampilkan'] =$this->Tambah_user->get_data('user')->result();
        $data['title'] ='Tambah menu baru';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/T_menu', $data); 
        $this->load->view('templates/footer');

        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'png|jpg|gif|PNG';
        $config['max_size']      = 10000;
        $config['max_width']     = 10000;
        $config['max_height']    = 10000;

        $this->load->library('upload', $config);

        if (! $this->upload->do_upload('userfile')) 
        {
           echo '';
            
        } 
        else
        {
            $gambar =  $this->upload->data();
            $gambar = $gambar ['file_name'];
            $nama_menu  = $this->input->post('nama_menu', TRUE);
            $keterangan = $this->input->post('keterangan', TRUE);
            $harga_menu  = $this->input->post('harga_menu', TRUE);
            $kategori   = $this->input->post('kategori', TRUE);

            $data = array(
                'nama_menu' => $nama_menu,
                'keterangan' => $keterangan,
                'gambar' => $gambar,
                'harga_menu' => $harga_menu,
                'kategori' => $kategori,

            );
             $this->db->insert('daftar_menu', $data);
             $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Menu berhasil di tambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('Menu');

        }
        

    }


    public function edit_menu($id)
    {
        $id = $this->input->post('id');
        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'png|jpg|gif|PNG|JPG|jpeg';
        $config['max_size']      = 10000;
        $config['max_width']     = 10000;
        $config['max_height']    = 10000;

        $this->load->library('upload', $config);

        if ( $this->upload->do_upload('userfile')) 
        {
            $gambar =  $this->upload->data();
            $gambar = $gambar ['file_name'];
            $nama_menu  = $this->input->post('nama_menu', TRUE);
            $keterangan = $this->input->post('keterangan', TRUE);
            $harga_menu  = $this->input->post('harga_menu', TRUE);
            $data = array(
                'nama_menu' => $nama_menu,
                'keterangan' => $keterangan,
                'gambar' => $gambar,
                'harga_menu' => $harga_menu,

            );
             $this->db->where('id', $id);
             $this->db->update('daftar_menu', $data);
             $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Menu berhasil di tambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('Menu');
        } 
        else
        {
            $gambar =  $this->upload->data();
            $gambar = $gambar ['file_name'];
            $nama_menu  = $this->input->post('nama_menu', TRUE);
            $keterangan = $this->input->post('keterangan', TRUE);
            $harga_menu  = $this->input->post('harga_menu', TRUE);

            $data = array(
                'nama_menu' => $nama_menu,
                'keterangan' => $keterangan,
                'gambar' => $gambar,
                'harga_menu' => $harga_menu,

            );
             $this->db->where('id', $id);
             $this->db->update('daftar_menu', $data);
             $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Menu berhasil di tambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('Menu');

        }
        
    }

       
}
?>