<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_transfer extends CI_Model
{

    public function index($result)
    {
        date_default_timezone_set('Asia/Pontianak');
        $nama_pelanggan = $this->input->post('nama_pelanggan');
        $no_meja = $this->input->post('no_meja');
        $catatan = $this->input->post('catatan');
        

        $pesanan = array(
            'nama_pelanggan' =>$nama_pelanggan,
            'no_meja'   => $no_meja,
            'tgl_pesan' => date('Y-m-d H:i:s'),
            'catatan'   => $catatan,
            'Status_bayar' => 1,
            'status_pesanan' => 0, 
            'bank' => $result['va_numbers'][0]["bank"],
            'va_number' => $result['va_numbers'][0]["va_number"],
            'pdf_url' => $result ['pdf_url'],
            'status_code' => $result['status_code'],
            'order_id' => $result['order_id'],

        );

        $this->db->insert('tbl_pesanan', $pesanan);
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


}