<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

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
	
	function __construct(){
		parent::__construct();
		
		security_checking();
	}
	
	public function in_records()
	{
		if($this->input->is_ajax_request())
		{	

			
			$result = $this->account->record_in($this->input->post(),$_FILES);
			
			if($result['result'] == true)
			{
				$response['result'] = 'success';
				$response['msg'] = $result['msg'];
			}
			else
			{
				$response['result'] = 'failed';
				$response['msg'] = $result['msg'];
			}
		
			
			echo json_encode($response);
			return;
		}
		
		redirect('oops');
	}
	
	public function out_records()
	{
		if($this->input->is_ajax_request())
		{		
			$result = $this->account->record_out($this->input->post(),$_FILES);
			
			if($result['result'] == true)
			{
				$response['result'] = 'success';
				$response['msg'] = $result['msg'];
			}
			else
			{
				$response['result'] = 'failed';
				$response['msg'] = $result['msg'];
			}
		
			
			echo json_encode($response);
			return;
		}
		
		redirect('oops');
	}
	
	
	
}
