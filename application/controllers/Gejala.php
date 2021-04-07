<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gejala extends CI_Controller {

	function __construct(){
		parent:: __construct();
		$this->load->model('D_gejala');
	
	}
	public function index()
	{
		$data["gejala"] = $this->D_gejala->Get()->result();
		if ($this->session->userdata('is_Login')== TRUE) {
			$this->template->load('admin/astatic','admin/gejala',$data);	
		}else{
			redirect('login');
		}
		// print_r($data);
	}
	public function add()
    {
    	$sbayes = $this->D_gejala->save();
        redirect('Gejala');
    }
    public function edit($kode_gejala)
    {
    		// $id_penyakit = $this->uri->segment[3];
    		// $where = array('id_penyakit' => $id_penyakit);
            $data["gejala"] =$this->D_gejala->Getwhere($kode_gejala)->row_array();

        if ($this->session->userdata('is_Login')== TRUE) {
			$this->template->load('admin/astatic','admin/e_gejala',$data);	
		}else{
			redirect('login');
		}
    }
    public function update()
    {
    	$id['kode_gejala'] = $this->input->post("kode_gejala");
    	$datap = array(
    		'nama_gejala' =>$this->input->post("nama_gejala"),
    	);
    	// $this->db->where('id_penyakit',$id_penyakit);
    	$this->D_gejala->update($datap, $id);
    	redirect('Gejala');
        // print_r($datap);
        // print_r($id);
    }
    public function delete($kode_gejala)
        {
            $where = array('kode_gejala' => $kode_gejala);
            $this->D_gejala->delete($where, 'gejala');
            redirect('Gejala');
        }

}
