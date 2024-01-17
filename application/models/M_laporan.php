<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model
{
    //laporan//
    public function lap_harian($tanggal, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('detail_pesanan');
        $this->db->where('Status_bayar=5');
        $this->db->join('tbl_pesanan', 'tbl_pesanan.id_pesanan = detail_pesanan.id_pesan', 'left');
        $this->db->join('daftar_menu', 'daftar_menu.id = detail_pesanan.id_menu', 'left');
        $this->db->where('DAY(tbl_pesanan.tgl_pesan)', $tanggal);
        $this->db->where('MONTH(tbl_pesanan.tgl_pesan)', $bulan);
        $this->db->where('YEAR(tbl_pesanan.tgl_pesan)', $tahun);
        return $this->db->get()->result();
        

    }

    public function lap_bulanan ($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('detail_pesanan');
        $this->db->join('tbl_pesanan', 'tbl_pesanan.id_pesanan = detail_pesanan.id_pesan', 'left');
        $this->db->join('daftar_menu', 'daftar_menu.id = detail_pesanan.id_menu', 'left');
        $this->db->where('MONTH(tgl_pesan)', $bulan);
        $this->db->where('YEAR(tgl_pesan)', $tahun);
        return $this->db->get()->result();
        

    }
    public function lap_tahunan ($tahun)
    {
        $this->db->select('*');
        $this->db->from('detail_pesanan');
        $this->db->join('tbl_pesanan', 'tbl_pesanan.id_pesanan = detail_pesanan.id_pesan', 'left');
        $this->db->join('daftar_menu', 'daftar_menu.id = detail_pesanan.id_menu', 'left');
        $this->db->where('YEAR(tgl_pesan)', $tahun);
        return $this->db->get()->result();
        

    }
    //laporan end//

    
    //utama admin//
    public function lap_keseluruhan()
    {
        $this->db->select('*');
        $this->db->from('detail_pesanan');
        $this->db->join('tbl_pesanan', 'tbl_pesanan.id_pesanan = detail_pesanan.id_pesan', 'left');
        $this->db->join('daftar_menu', 'daftar_menu.id = detail_pesanan.id_menu', 'left');
        return $this->db->get()->result();
    }
    public function lap_tunai()
    {
        $this->db->select('*');
        $this->db->from('detail_pesanan');
        $this->db->where('Status_bayar=0');
        $this->db->join('tbl_pesanan', 'tbl_pesanan.id_pesanan = detail_pesanan.id_pesan', 'left');
        $this->db->join('daftar_menu', 'daftar_menu.id = detail_pesanan.id_menu', 'left');
        return $this->db->get()->result();
    }
    public function lap_tunai_harian($tanggal, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('detail_pesanan');
        $this->db->where('Status_bayar=0');
        $this->db->join('tbl_pesanan', 'tbl_pesanan.id_pesanan = detail_pesanan.id_pesan', 'left');
        $this->db->join('daftar_menu', 'daftar_menu.id = detail_pesanan.id_menu', 'left');
        $this->db->where('DAY(tbl_pesanan.tgl_pesan)', $tanggal);
        $this->db->where('MONTH(tbl_pesanan.tgl_pesan)', $bulan);
        $this->db->where('YEAR(tbl_pesanan.tgl_pesan)', $tahun);
        return $this->db->get()->result();
        
    }
    public function lap_transfer()
    {
        $this->db->select('*');
        $this->db->from('detail_pesanan');
        $this->db->where('Status_bayar=1');
        $this->db->where('status_pesanan=1');
        $this->db->join('tbl_pesanan', 'tbl_pesanan.id_pesanan = detail_pesanan.id_pesan', 'left');
        $this->db->join('daftar_menu', 'daftar_menu.id = detail_pesanan.id_menu', 'left');
        return $this->db->get()->result();
    }
    public function lap_transfer_harian($tanggal, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('detail_pesanan');
        $this->db->where('Status_bayar=1');
        $this->db->where('status_pesanan=1');
        $this->db->join('tbl_pesanan', 'tbl_pesanan.id_pesanan = detail_pesanan.id_pesan', 'left');
        $this->db->join('daftar_menu', 'daftar_menu.id = detail_pesanan.id_menu', 'left');
        $this->db->where('DAY(tbl_pesanan.tgl_pesan)', $tanggal);
        $this->db->where('MONTH(tbl_pesanan.tgl_pesan)', $bulan);
        $this->db->where('YEAR(tbl_pesanan.tgl_pesan)', $tahun);
        return $this->db->get()->result();
        
    }
    public function lap_cancel_pesanan( $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('detail_pesanan');
        $this->db->where('Status_bayar=1');
        $this->db->where('status_pesanan=2');
        $this->db->join('tbl_pesanan', 'tbl_pesanan.id_pesanan = detail_pesanan.id_pesan', 'left');
        $this->db->join('daftar_menu', 'daftar_menu.id = detail_pesanan.id_menu', 'left');
        $this->db->where('MONTH(tbl_pesanan.tgl_pesan)', $bulan);
        $this->db->where('YEAR(tbl_pesanan.tgl_pesan)', $tahun);
        return $this->db->get()->result();
        
    }
    

}