<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		security_checking();
		
		$this->load->view('auth/sign_in_v');
	}
	
	public function login()
	{
		if($this->input->is_ajax_request())
		{		
			
			$result = $this->user->user_verify($this->input->post());
			
			if($result['result'] === true)
			{
				$response['result'] = 'success';
			}
			else
			{
				$response['result'] = 'fail';
				$response['message'] = $result['message'];
			}
			
			echo json_encode($response);
			return;
			
		}
		
		redirect('oops');
	}
	
	public function signup()
	{
		if($this->input->is_ajax_request())
		{		
			
			$result = $this->user->user_register($this->input->post());
			
			if($result['result'] === true)
			{
				$response['result'] = 'success';
			}
			else
			{
				$response['result'] = 'fail';
				$response['message'] = $result['message'];
			}
			
			echo json_encode($response);
			return;
			
		}
		
		redirect('oops');
	}
	
	public function validate($token = NULL)
	{
		if($token != NULL)
		{
			$token_exist = check_by_value_and_column($token,'token','user');
			if($token_exist == true)
			{
				$update_status = $this->user->activate_user($token); 
				
				if($update_status == true)
				{
					$this->load->view('auth/welcome_v');
					return;
				}
				else
				{
					redirect('oops');
				}
			}
			
			redirect('oops');
		}
		redirect('oops');
	}
	
	/* public function view_template()
	{
		$data['username'] = 'Ikhwansalihin';
		$token = openssl_random_pseudo_bytes(16);
		$token = bin2hex($token);
		$data['validate'] = base_url() . 'authentication/validate/' . $token;
		$body = $this->load->view('email/welcome_t', $data, true);
		
		$subject = '3 Testing from local';
		$to = 'ezzahmawadah97@gmail.com';
		$image = array(
		'logo-1.png'=> array('path'=>'metronic/dist/assets/media/email/logo-1.png','cid'=>'logo','type'=>'png'),
		'icon-positive-vote-1.png'=> array('path'=>'metronic/dist/assets/media/email/icon-positive-vote-1.png','cid'=>'positive-icon','type'=>'png')
	    );
		$rs = sendmail($subject,$body,$to,array(),$image);
		ad($rs);
		// $this->load->view('email/welcome_t', $data);
	} */
	
	public function sayonara()
	{
		$this->session->sess_destroy();
		redirect('authentication');
	}
}
