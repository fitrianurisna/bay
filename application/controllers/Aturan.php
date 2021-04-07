<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aturan extends CI_Controller {

	function __construct(){
		parent:: __construct();
		$this->load->model('D_aturan');
	
	}
	public function index()
	{
		$data["aturan"] = $this->D_aturan->Get()->result();
        $data["gejala"] = $this->D_aturan->Getg()->result();
        $data["penyakit"] = $this->D_aturan->Geta()->result();
		if ($this->session->userdata('is_Login')== TRUE) {
			$this->template->load('admin/astatic','admin/aturan',$data);	
		}else{
			redirect('login');
		}
		// print_r($data);
	}

	public function add()
        {

            // $this->db->select('MAX(id) as id_terakhir')->from('susulan_uts');
            // $get_id = $this->db->get()->row_array();

            $gejala = $this->input->post('gejala');
            $penyakit = $this->input->post('penyakit');
            $i = 0; $i == count($gejala);
                    $data = [
                        // 'susulan_id' => $get_id['id_terakhir'] + 1,
                        'penyakit_kode' => $penyakit,
                        'gejala_kode' => $gejala[$i],
                    ];
                    $this->db->insert('aturan', $data);
                    print_r($data);
        }
    
 //    public function edit($kode_gejala)
 //    {
 //    		// $id_penyakit = $this->uri->segment[3];
 //    		// $where = array('id_penyakit' => $id_penyakit);
 //            $data["gejala"] =$this->D_gejala->Getwhere($kode_gejala)->row_array();

 //        if ($this->session->userdata('is_Login')== TRUE) {
	// 		$this->template->load('admin/astatic','admin/e_gejala',$data);	
	// 	}else{
	// 		redirect('login');
	// 	}
 //    }
 //    public function update()
 //    {
 //    	$id['kode_gejala'] = $this->input->post("kode_gejala");
 //    	$datap = array(
 //    		'nama_gejala' =>$this->input->post("nama_gejala"),
 //    	);
 //    	// $this->db->where('id_penyakit',$id_penyakit);
 //    	$this->D_gejala->update($datap, $id);
 //    	redirect('Gejala');
 //        // print_r($datap);
 //        // print_r($id);
 //    }
 //    public function delete($kode_gejala)
 //        {
 //            $where = array('kode_gejala' => $kode_gejala);
 //            $this->D_gejala->delete($where, 'gejala');
 //            redirect('Gejala');
 //        }

}