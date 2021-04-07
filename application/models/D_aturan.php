<?php defined('BASEPATH') OR exit('No direct script access allowed');

class D_aturan extends CI_Model
{ 
    private $_table = "aturan";
    
    public function Get()
    {
        // return $this->db->get('susulan_uts');
        return $this->db->get('aturan');
    }
    public function Getg()
    {
        // return $this->db->get('susulan_uts');
        return $this->db->get('gejala');
    }
     public function Geta()
    {
        // return $this->db->get('susulan_uts');
        return $this->db->get('penyakit');
    }
     public function save()
    {
        $data = [
            'kode_gejala' => $this->input->post('kode_gejala'),
            'nama_gejala' => $this->input->post('nama_gejala'),
            // 'createdAt' => date("Y-m-d")
        ];
        $inputan = $this->db->insert($this->_table, $data);
        return $inputan;
    }
    public function Getwhere($kode_gejala)
    {
        return $this->db->get_where('gejala',array('kode_gejala' =>$kode_gejala));

         // $this->db->where($where);
         // $this->db->get($table);
    }
    public function update($datap, $id)
    {
        $query = $this->db->update("gejala" ,$datap ,$id);
    }
     public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
