<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller
{       
        public function __construct()

        {
                parent::__construct();
                $this->load->model('M_laporan');
        }

        public function index()
        {
                $data['user'] = $this->db->get_where('user', ['email' =>
                $this->session->userdata('email')])->row_array();   
                $data['title'] ='Laporan Penjualan';
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('laporan/index', $data); 
                $this->load->view('templates/footer');

        }


        public function lap_harian()
        {
                $tanggal = $this->input->post('tanggal');
                $bulan = $this->input->post('bulan');
                $tahun = $this->input->post('tahun');
                $data = array(
                    'tanggal' => $tanggal,
                    'bulan' => $bulan,
                    'tahun' => $tahun,
                    'laporan' => $this->M_laporan->lap_harian($tanggal, $bulan, $tahun),
                );
                $data['title'] ='Laporan Penjualan Harian';
                $this->load->view('laporan/lap_harian', $data); 
               
        }
        public function lap_bulanan()
        {
                $bulan = $this->input->post('bulan');
                $tahun = $this->input->post('tahun');
                $data = array(
                    'bulan' => $bulan,
                    'tahun' => $tahun,
                    'laporan' => $this->M_laporan->lap_bulanan($bulan, $tahun),
                );
                $data['title'] ='Laporan Penjualan Bulanan';
                $this->load->view('laporan/lap_bulanan', $data); 
               
        }
        public function lap_tahunan()
        {

                $tahun = $this->input->post('tahun');
                $data = array(
                    'tahun' => $tahun,
                    'laporan' => $this->M_laporan->lap_tahunan( $tahun),
                );
                $data['title'] ='Laporan Penjualan Tahunan';
                $this->load->view('laporan/lap_tahunan', $data); 
               
        }
        public function lap_pembayaran()
        {
                $data['user'] = $this->db->get_where('user', ['email' =>
                $this->session->userdata('email')])->row_array();   
                $data['title'] ='Laporan Pembayaran';
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('laporan/lap_pembayaran', $data); 
                $this->load->view('templates/footer');
               
        }

        public function lap_bayar_harian()
        {
                $tanggal = $this->input->post('tanggal');
                $bulan = $this->input->post('bulan');
                $tahun = $this->input->post('tahun');
                $data = array(
                'tanggal' => $tanggal,
                'bulan' => $bulan,
                'tahun' => $tahun,
                'lap_tunai_harian' => $this->M_laporan->lap_tunai_harian($tanggal, $bulan, $tahun),
            );
                $data['title'] ='Laporan Pembayaran Tunai Harian';
                $this->load->view('laporan/lap_bayar_harian', $data); 
               
        }
        public function lap_transfer_harian()
        {
                $tanggal = $this->input->post('tanggal');
                $bulan = $this->input->post('bulan');
                $tahun = $this->input->post('tahun');
                $data = array(
                'tanggal' => $tanggal,
                'bulan' => $bulan,
                'tahun' => $tahun,
                'lap_transfer_harian' => $this->M_laporan->lap_transfer_harian($tanggal, $bulan, $tahun),
            );
                $data['title'] ='Laporan Harian Pembayaran Transfer';
                $this->load->view('laporan/lap_transfer_harian', $data); 
               
        }
        public function lap_pesan_batal()
        {
                $bulan = $this->input->post('bulan');
                $tahun = $this->input->post('tahun');
                $data = array(
                'bulan' => $bulan,
                'tahun' => $tahun,
                'lap_cancel' => $this->M_laporan->lap_cancel_pesanan($bulan, $tahun),
            );
                $data['title'] ='Laporan Bulanan cancel Pesanan ';
                $this->load->view('laporan/lap_pesanan_batal', $data); 
               
        }



       


}