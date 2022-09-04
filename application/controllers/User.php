<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('signin_model');
		$this->load->model('user_model');
		// print_r($this->session->userdata('user')['isAdmin']);die;
		if(!$this->session->userdata('user')){
			redirect('login');
		}
	}

	public function index() {
		$this->dashboard();
	}

	public function dashboard() {
		// print_r($this->session->userdata());die;
		$data['userName']=$this->session->userdata('user')['login_name'];
		$this->load->view('header');
		if($this->session->userdata('user')['isAdmin']){
			$data['user_list'] = $this->user_model->get_all_users();
			$this->load->view('welcome',$data);	
		}else{
			$data['picture_list'] = $this->user_model->get_all_pics();
			$this->load->view('picture_list', $data);	
		}
		$this->load->view('footer');
	}

    public function form(){
        $this->load->view('header');
        $this->load->view('signup_form');
        $this->load->view('footer');
    }

	public function add_user()
	{
		//Form Validation
		$this->form_validation->set_rules('name','Name','required|alpha');
		$this->form_validation->set_rules('mobile','Mobile Number','required|regex_match[/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/]|is_unique[user_info.mobile]');
		
		if($this->form_validation->run())
		{
			//Getting Post Values
			$name=$this->input->post('name');
			$mobile=preg_replace('/^(?:\+?91|0)?/','+91',$this->input->post('mobile'));
			$res = $this->user_model->create_user($name,$mobile);
			// print_r($res);die;
			if($res){
				$this->session->set_flashdata('success','Registration successfull.');
			}
		} else {
			$this->session->set_flashdata('error',validation_errors());	
		}
		redirect('user/form');
	}
}
