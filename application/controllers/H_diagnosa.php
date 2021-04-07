<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class H_diagnosa extends CI_Controller {

	function __construct(){
		parent:: __construct();
		$this->load->model('D_diag');
	
	}

	public function index()
	{
		
		$this->template->load('static1','h_diagnosa'$tampil_hasil);
	}
}
