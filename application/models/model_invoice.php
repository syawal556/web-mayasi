<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_invoice extends CI_Model
{
    public function index()
    {
        date_default_timezone_set('Asia/Pontianak');
        $nama_pelanggan = $this->input->post('nama_pelanggan');
        $no_meja = $this->input->post('no_meja');
        $catatan = $this->input->post('catatan');
        // $metode_pembayaran = $this->input->post('metode_pembayaran');

        $pesanan = array(
            'nama_pelanggan' =>$nama_pelanggan,
            'no_meja'   => $no_meja,
            'tgl_pesan' => date('Y-m-d H:i:s'),
            'catatan'   => $catatan,
            'Status_bayar'   => 0,
            'status_pesanan'=>0,
            // 'metode_pembayaran' => $metode_pembayaran,

        );

        $this->db->insert('tbl_pesanan', $pesanan );
        $id_pesan = $this->db->insert_id();

        foreach($this->cart->contents() as $items){
            $data = array(
                'id_pesan'       => $id_pesan,
                'id_menu'       => $items['id'],
                'nama_menu'     => $items['name'],
                'jumlah'        => $items['qty'],
                'harga'         => $items['price'],
            );

            $this->db->insert('detail_pesanan', $data);
        }
        return TRUE;
    }


    public function tampil_data()
    {
        $result = $this->db->get('tbl_pesanan');
        if ($result->num_rows() > 0) {
            return $result->result();
        }else{
            return false;
        }
    }


    public function ambil_id_pesanan($id_pesanan)
    {
        $result = $this->db->where('id_pesanan', $id_pesanan)->limit(1)->get('tbl_pesanan');
        if ($result->num_rows() > 0) {
            return $result->row();
        }else{
            return false;
        }
    }

    public function ambil_id_detail($id_pesan)
    {
        $result = $this->db->where('id_pesan', $id_pesan)->get('detail_pesanan');
        if ($result->num_rows() > 0) {
            return $result->result();
        }else{
            return false;
        }
    }

    public function belum_bayar()
    {
        $this->db->select('*');
        $this->db->from('tbl_pesanan');
        $this->db->where('status_pesanan=0');
        $this->db->order_by('id_pesanan', 'DESC');
        return $this->db->get()->result();



    }
   
    public function pesanan_status($data)
    {
        $this->db->where('id_pesanan', $data['id_pesanan']);
        $this->db->update('tbl_pesanan', $data);
    }


    public function update_struk($data)
    {
        $this->db->where('id_pesanan', $data['id_pesanan']);
        $this->db->update('tbl_pesanan', $data);
    }


    public function telah_diproses()
    {
        $this->db->select('*');
        $this->db->from('tbl_pesanan');
        $this->db->where('status_pesanan=1');
        $this->db->order_by('id_pesanan','DESC');
        return $this->db->get()->result();
    }
    public function telah_diproses_user()
    {
        $this->db->select('*');
        $this->db->from('tbl_pesanan');
        $this->db->where('status_pesanan=1');
        $this->db->order_by('id_pesanan','DESC');
        return $this->db->get()->result();
    }


    public function pesanan_gagal($data)
    {
        $this->db->where('id_pesanan', $data['id_pesanan']);
        $this->db->update('tbl_pesanan', $data);
    }

    public function cancel_pesanan()
    {
        $this->db->select('*');
        $this->db->from('tbl_pesanan');
        $this->db->where('status_pesanan=2');
        $this->db->order_by('id_pesanan','DESC');
        return $this->db->get()->result();
    }

}