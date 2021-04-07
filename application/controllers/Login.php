<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent:: __construct();
		$this->load->model('D_login');
	}
	public function index()
	{
		if ($this->session->userdata('is_Login')==TRUE){
			redirect('admin');
		}else{
			$this->load->view('login');	
		}
 		
	}
	
	function do_login(){

		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$cek = $this->D_login->cek_user($email,$password);
		if(count($cek) == 1){
			$this->session->set_userdata(array(
				'is_Login' =>TRUE, //set data telah login
				'email' => $email,//set session email
				));

			redirect('admin');
		}else{
			$this->session->set_flashdata('gagallogin','Maaf email atau password yang anda masukkan salah');
			$this->load->view('login');
		}
	}
}
