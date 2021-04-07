<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class D_login extends CI_Model {

	function cek_user($email="",$password="")
	{
		$query = $this->db->get_where('user',array('email'=> $email, 'password'=>$password));
		$query = $query->result_array();
		return $query;
	}

}
