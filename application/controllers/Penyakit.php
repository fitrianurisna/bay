<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyakit extends CI_Controller {

	function __construct(){
		parent:: __construct();
		$this->load->model('D_penyakit');
	
	}
	public function index()
	{
		$data["penyakit"] = $this->D_penyakit->Get()->result();
		if ($this->session->userdata('is_Login')== TRUE) {
			$this->template->load('admin/astatic','admin/penyakit',$data);	
		}else{
			redirect('login');
		}
		// print_r($data);
	}
	public function add()
    {
    	$sbayes = $this->D_penyakit->save();
        redirect('Penyakit');
    }
    public function edit($kode_penyakit)
    {
    		// $kode_penyakit = $this->uri->segment[3];
    		// $where = array('kode_penyakit' => $kode_penyakit);
            $data["penyakit"] =$this->D_penyakit->Getwhere($kode_penyakit)->row_array();

        if ($this->session->userdata('is_Login')== TRUE) {
			$this->template->load('admin/astatic','admin/e_penyakit',$data);	
		}else{
			redirect('login');
		}
    }
    public function update()
    {
    	$id['kode_penyakit'] = $this->input->post("kode_penyakit");
    	$datap = array(
    		'nama_penyakit' =>$this->input->post("nama_penyakit"),
    	);
    	// $this->db->where('kode_penyakit',$kode_penyakit);
    	$this->D_penyakit->update($datap, $id);
    	redirect('Penyakit');
    }
    public function delete($kode_penyakit)
        {
            $where = array('kode_penyakit' => $kode_penyakit);
            $this->D_penyakit->delete($where, 'penyakit');
            redirect('Penyakit');
        }

}
