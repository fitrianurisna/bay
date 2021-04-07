<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent:: __construct();
		// $this->load->model('D_info');
	}
	public function index()
	{
		if ($this->session->userdata('is_Login')== TRUE) {
			$this->template->load('admin/astatic','admin/dashboard');
		}else{
			redirect('login');
		}

	}
	
}
