<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_menu extends CI_Model
{

    public function ambil_data()
    {
  
     return $this->db->get('daftar_menu');
  
    }

    public function ubahdata($where, $table)
    {
        $this->db->get_where($table,$where);
    }



    public function update_data($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }



    public function find($id)
    {
        $result = $this->db->where('id', $id)
                            ->limit(1)
                            ->get('daftar_menu');

        if ($result->num_rows() > 0){
            return $result->row();
        }else {
            return array();
        }
  
    }

    public function edit_data_menu($data, $table)
    {
       $this->db->where('id', $data['id']);
       $this->db->update($table , $data);


    }


}

 
?>