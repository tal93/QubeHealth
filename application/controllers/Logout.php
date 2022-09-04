<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Logout extends CI_Controller {
	//Function for logout
	public function index(){
	$this->session->unset_userdata('user');
	$this->session->sess_destroy();
	return redirect('login');
	}
}