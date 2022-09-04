<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
use Twilio\Rest\Client;
class Signin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('signin_model');
	}

	public function sign_in() {
		$this->load->view('header');
		$this->load->view('sign_in');	
		$this->load->view('footer');
	}

	public function login() {
		$this->form_validation->set_rules('mobile','Mobile Number','required');
		if($this->form_validation->run()){
			$mobile		= preg_replace('/^(?:\+?91|0)?/','+91',$this->input->post('mobile'));
			$user 		= $this->signin_model->check_mobile($mobile);
			if($user) {

				// Generate OTP
				$otp = $this->generate_otp();

				$data = [
					'otp'	=> $otp,
				];

				// update otp in database
				$this->signin_model->update_otp($mobile, $data);

				// send otp on mobile number
				$message = $otp." is your OTP. Do not share with anyone.";

				// $this->send_sms($mobile, $message);

			 	$data = ['phone' => $mobile, 'text' => $otp];
			    $this->send_sms($data);

				$data['mobile'] = $mobile;
				$this->load->view('header');
				$this->load->view('verify', $data);	
				$this->load->view('footer');

			} else {
				$this->session->set_flashdata('error','Invalid mobile number');	
				redirect('login');
			}
		}else{
			$this->session->set_flashdata('error',validation_errors());	
			redirect('login');
		}
	}

 	protected function send_sms($data) {
		// Your Account SID and Auth Token from twilio.com/console
     	$sid = 'AC19461ecda01caeb1d5074b9e64acdd80';
	  	$token = 'dba7d1452ff6661ddd4b9728137f5bf5';
 		$client = new Client($sid, $token);
        
        // Use the client to do fun stuff like send text messages!
         return $client->messages->create(
            // the number you'd like to send the message to
            $data['phone'],
            array(
                // A Twilio phone number you purchased at twilio.com/console
                "from" => "MG4e5ef92b0d746673e22d7b491cdee693",
                // the body of the text message you'd like to send
                'body' => $data['text']
            )
        );
   }

	public function generate_otp() {
		$OTP 	=	rand(1,9);
		$OTP 	.=	rand(0,9);
		$OTP 	.=	rand(0,9);
		$OTP 	.=	rand(0,9);
		$OTP 	.=	rand(0,9);
		$OTP 	.=	rand(0,9);
		return $OTP;
	}
	
	public function verify() {
		$mobile		= $this->input->post('mobile');
		$otp			= $this->input->post('otp');

		// check for otp 
		$user = $this->signin_model->verify($mobile, $otp);
		if($user) {
			$this->session->set_userdata('user',$user);
			redirect('user/dashboard');
		} else {
			$data['mobile'] = $mobile;
			$this->session->set_flashdata('error','Invalid OTP'); 
			$this->load->view('header');
			$this->load->view('verify',$data);	
			$this->load->view('footer');
		}
	}

}

