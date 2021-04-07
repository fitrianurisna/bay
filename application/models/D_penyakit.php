<?php defined('BASEPATH') OR exit('No direct script access allowed');

class D_penyakit extends CI_Model
{ 
    private $_table = "penyakit";
    
    public function Get()
    {
        // return $this->db->get('susulan_uts');
        return $this->db->get('penyakit');
    }
     public function save()
    {
        $data = [
            'kode_penyakit' => $this->input->post('kode_penyakit'),
            'nama_penyakit' => $this->input->post('nama_penyakit'),
            // 'createdAt' => date("Y-m-d")
        ];
        $inputan = $this->db->insert($this->_table, $data);
        return $inputan;
    }
    public function Getwhere($kode_penyakit)
    {
        return $this->db->get_where('penyakit',array('kode_penyakit' =>$kode_penyakit));

         // $this->db->where($where);
         // $this->db->get($table);
    }
    public function update($datap, $id)
    {
        $query = $this->db->update("penyakit" ,$datap ,$id);
    }
     public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
