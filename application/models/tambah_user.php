<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambah_user extends CI_Model
{

   public function get_data($table)
  {

    return $this->db->get($table);

  }

    public function update_data($data, $table)
    {
       $this->db->where('id', $data['id']);
       $this->db->update($table , $data);


    }



    public function delete($where, $table)
    {
      $this->db->where($where);
      $this->db->delete($table);
    }


    
}

?>