<?php

class Account_m extends CI_Model {

	function __construct(){
		parent::__construct();
	}
	
	public function account_data()
	{
		$user_account = $this->db->where('user_id',$this->session->userdata('user_id'))->get('user_account')->result();
		
		$sum_balance = 0;
		
		foreach($user_account as $row_account)
		{
			$return['user_account'][$row_account->account_token] = array(
			'account_token'=>$row_account->account_token,
			'account_name'=>$row_account->account_name,
			'create_date'=>$row_account->create_date,
			'update_date'=>$row_account->update_date
			);
			
			
			$account_data = $this->db->order_by('exact_record_date','DESC')->order_by('id', 'DESC')->where('account_token',$row_account->account_token)->where('exact_record_date <=',date('Y-m-d'))->get('account_data')->result();
			
			if(sizeof($account_data) > 0)
			{
				$amount_total = 0;
				$count = 0;
				foreach($account_data as $row_data)
				{
					if($row_data->record_option == true)
					{
						if($count == 0)
						{
							$return['last_update_date'] = date("j F Y" , strtotime($row_data->exact_record_date)) . ' ' . date("h:i A");
							$return['update_date'] = getDurationFromEpoch($row_data->update_date);
						}
						
						if($count < 5)
						{
							if($row_data->flow == 'in')
								$record = 'Deposit';
							else
								$record = 'Expenditure';
							
							$return['transactions'][$row_account->account_token][] = array(
							'account_name'=>$row_account->account_name,
							'category'=>$row_data->category,
							'remarks'=>$row_data->remarks,
							'record'=>$record,
							'type'=>$row_data->type,
							'create_date'=>$row_data->create_date,
							'exact_record_date'=>date("d F Y", strtotime($row_data->exact_record_date)),
							'amount'=>$row_data->amount,
							'id'=>$row_data->id,
							);							
						
							$count++;
						}
						
						if($row_data->flow == 'in')
						{
							$sum_balance = $amount_total + $row_data->amount;
							$amount_total = $amount_total + $row_data->amount;
						}
						else
						{
							$sum_balance = $amount_total - $row_data->amount;
							$amount_total = $amount_total - $row_data->amount;
						}
						
						$update_date = $row_data->update_date;
					}
					else
					{
						$update_date = $row_account->update_date;
					}
				}
				
				$return['user_account'][$row_account->account_token]['amount_total'] = $amount_total;
				$return['user_account'][$row_account->account_token]['update_date'] = $update_date;
			}
			else
			{
				$return['user_account'][$row_account->account_token]['amount_total'] = '0.00';
			}
			
		}
		
		$return['balance'] = $sum_balance;
		
		return $return;
	}
	
	function record_in($post = array(), $files = array())
	{
		if(isset($post) && is_array($post) && sizeof($post) > 0)
		{
			if(!isset($post['account_token']))
			{
				$result['result'] = false;
				$result['msg'] = 'Account token missing, please try again later.';
			}
			else//search if token exist 
			{
				$account_token = $this->db->where('account_token', $post['account_token'])->limit(1)->get('user_account')->row_array();
				
				//token exist condition
				if(isset($account_token) && is_array($account_token) && sizeof($account_token) > 0 )
				{
					$record_date = NULL;
					$record_option = true;
					if($post['type'] == 'One Time')
					{
						$record_date_simple = date("d/m/Y",strtotime($post['date']));
						$exact_record_date = date("Y-m-d",strtotime($post['date']));
						
						if($exact_record_date <= date("y-m-d"))
							$record_option = true;
						else
							$record_option = false;
						
					}
					else if($post['type'] == 'Recurring Monthly')
					{
						$record_date_simple = $post['recurring_date_monthly'];
						$selected_day = intval($post['recurring_date_monthly']);
				
						$current_month = date('y-m');
						$last_day_of_month = date('t');

						// Adjust the selected day if it exceeds the last day of the current month
						if ($selected_day > $last_day_of_month) {
							$selected_day = $last_day_of_month;
						}

						$exact_record_date = date("Y-m-d", strtotime($current_month . '-' . $selected_day));
								
						if($exact_record_date <= date("y-m-d"))
							$record_option = true;
						else
							$record_option = false;
					}
					else if($post['type'] == 'Recurring Weekly')
					{
						$record_date_simple = trim($post['weekly_recurring_date']);

						$today_date_name = date('l');
						
						if(strcasecmp($today_date_name, $record_date_simple) === 0)
						{
							$exact_record_date = date('Y-m-d');
							$record_option = true;
						}
						else
						{
							$record_option = false;
							
							// Get the current day of the week as an integer (0 for Sunday, 1 for Monday, etc.)
							$current_day_of_week = date('w');
							
							// Get the day of the week for the selected option as an integer
							$selected_day_of_week = date('w', strtotime($record_date_simple));
							
							// Calculate the number of days until the next occurrence of the selected day
							$days_until_next_occurrence = ($selected_day_of_week + 7 - $current_day_of_week) % 7;
							
							// Calculate the timestamp for the next occurrence of the selected day
							$next_occurrence_timestamp = strtotime("+$days_until_next_occurrence days");
							
							// Format the next occurrence date as d/m/y
							$exact_record_date = date('Y-m-d', $next_occurrence_timestamp);
						}
					}
					else if($post['type'] == 'Recurring Anually')
					{
						$record_date_simple = date("d/m", strtotime(trim($post['recurring_date_anually'])));
						
						$recurring_date_annually = $post['recurring_date_anually'];

						$current_year = date('y');
						$recurring_date_parts = explode('/', $recurring_date_annually);

						$day = $recurring_date_parts[1];
						$month = $recurring_date_parts[0];

						$exact_record_date = date("Y-m-d", strtotime($current_year .'-' . $month . '-' . $day));
						
						if($exact_record_date <= date("y-m-d"))
							
						{
							$record_option = true;
						}
						else
						{
							$record_option = false;
						}
					}
					
					$db_data = array(
					'account_token'=> $post['account_token'],
					'flow'=> 'in',
					'category'=> $post['category'],
					'type'=> $post['type'],
					'remarks'=> $post['remarks'],
					'amount'=> $post['amount'],
					'record_date_simple'=> $record_date_simple,
					'exact_record_date'=> $exact_record_date,
					'record_option'=> $record_option,
					'create_date'=> time(),
					'create_by'=> $this->session->userdata('user_id') !='' ? $this->session->userdata('user_id') : NULL,
					'update_date'=> time(),
					'update_by'=>$this->session->userdata('user_id') !='' ? $this->session->userdata('user_id') : NULL,
					);
					
					$rs = $this->db->insert('account_data',$db_data);
					$insert_id = $this->db->insert_id();
					
					if($rs == true)
					{
						if(isset($files['file']) && is_array($files['file']) && sizeof($files['file']) > 0 )
						{
							if(!is_dir("uploads"))
							mkdir("uploads", 0777, TRUE);

							if(!is_dir("uploads/files"))
							mkdir("uploads/files", 0777, TRUE);
						
							if(!is_dir("uploads/files/". $this->session->userdata('user_id')))
							mkdir("uploads/files/". $this->session->userdata('user_id'), 0777, TRUE);
						
							$config['upload_path'] = "uploads/files/".$this->session->userdata('user_id');
							$config['allowed_types'] = '*';
							$config['max_size'] = '0';
							$config['max_width'] = '0'; /* max width of the image file */
							$config['max_height'] = '0'; /* max height of the image file */
							$config['file_name'] = $files['file']['name'];

							$this->load->library('upload', $config);
							$this->upload->initialize($config);
							if (!$this->upload->do_upload('file'))
							{
								$params = array('error' => $this->upload->display_errors());
								$result['msg'] = $params['error'];
								$result['result'] = false;
							}
							else
							{
								$upload_data = $this->upload->data();
								$file_result = $this->db->where('id',$insert_id)->update('account_data',array('file'=>$config['upload_path'] .'/'.$upload_data['file_name']));
								
								if(isset($file_result) && $file_result == true)
								{
									$result['result'] = true;
									$result['msg'] = 'New account records stored succesfully.';
								}
								else
								{
									$result['result'] = false;
									$result['msg'] = 'Unable to upload file given, Please try again later.';
								}
							}
						}
						
						$result['result'] = true;
						$result['msg'] = 'New account records stored succesfully.';
					}
					else
					{
						$result['result'] = false;
						$result['msg'] = 'Unable to insert record, please try again later.';
					}
				}
				else
				{
					$result['result'] = false;
					$result['msg'] = 'Account token doesnt exist, please try again later.';
				}
			}
			
			return $result;
		}
		else
		{
			$result['result'] = false;
			$result['msg'] = 'Required parameter missing, please try again later.';
			
			return $result;
		}
	}
	
	
	function record_out($post = array(), $files = array())
	{
		if(isset($post) && is_array($post) && sizeof($post) > 0)
		{
			if(!isset($post['account_token']))
			{
				$result['result'] = false;
				$result['msg'] = 'Account token missing, please try again later.';
			}
			else//search if token exist 
			{
				$account_token = $this->db->where('account_token', $post['account_token'])->limit(1)->get('user_account')->row_array();
				
				//token exist condition
				if(isset($account_token) && is_array($account_token) && sizeof($account_token) > 0 )
				{
					$record_date = NULL;
					$record_option = true;
					if($post['type'] == 'One Time')
					{
						$record_date_simple = date("d/m/Y",strtotime($post['date']));
						$exact_record_date = date("y-m-d",strtotime($post['date']));
						
						if($exact_record_date <= date("y-m-d"))
							$record_option = true;
						else
							$record_option = false;
					}
					else if($post['type'] == 'Recurring Monthly')
					{
						$record_date_simple = $post['recurring_date_monthly'];
						$selected_day = intval($post['recurring_date_monthly']);
				
						$current_month = date('y-m');
						$last_day_of_month = date('t');

						// Adjust the selected day if it exceeds the last day of the current month
						if ($selected_day > $last_day_of_month) {
							$selected_day = $last_day_of_month;
						}

						$exact_record_date = date("y-m-d", strtotime($current_month . '-' . $selected_day));
								
						if($exact_record_date <= date("y-m-d"))
							$record_option = true;
						else
							$record_option = false;
						
					}
					else if($post['type'] == 'Recurring Weekly')
					{
						$record_date_simple = trim($post['weekly_recurring_date']);

						$today_date_name = date('l');
						
						if(strcasecmp($today_date_name, $record_date_simple) === 0)
						{
							$exact_record_date = date('y-m-d');
							$record_option = true;
						}
						else
						{
							$record_option = false;
							
							// Get the current day of the week as an integer (0 for Sunday, 1 for Monday, etc.)
							$current_day_of_week = date('w');
							
							// Get the day of the week for the selected option as an integer
							$selected_day_of_week = date('w', strtotime($record_date_simple));
							
							// Calculate the number of days until the next occurrence of the selected day
							$days_until_next_occurrence = ($selected_day_of_week + 7 - $current_day_of_week) % 7;
							
							// Calculate the timestamp for the next occurrence of the selected day
							$next_occurrence_timestamp = strtotime("+$days_until_next_occurrence days");
							
							// Format the next occurrence date as d/m/y
							$exact_record_date = date('y-m-d', $next_occurrence_timestamp);
						}
					}
					else if($post['type'] == 'Recurring Anually')
					{
						$record_date_simple = date("d/m/y", strtotime(trim($post['recurring_date_anually'])));
						
						$recurring_date_annually = $post['recurring_date_anually'];

						$current_year = date('y');
						$recurring_date_parts = explode('/', $recurring_date_annually);

						$day = $recurring_date_parts[1];
						$month = $recurring_date_parts[0];

						$exact_record_date = date("y-m-d", strtotime($current_year .'-' . $month . '-' . $day));
						
						if($exact_record_date <= date("y-m-d"))
							
						{
							$record_option = true;
						}
						else
						{
							$record_option = false;
						}
					}
					
					$db_data = array(
					'account_token'=> $post['account_token'],
					'flow'=> 'out',
					'category'=> $post['category'],
					'type'=> $post['type'],
					'remarks'=> $post['remarks'],
					'amount'=> $post['amount'],
					'record_date_simple'=> $record_date_simple,
					'exact_record_date'=> $exact_record_date,
					'record_option'=> $record_option,
					'create_date'=> time(),
					'create_by'=> $this->session->userdata('user_id') !='' ? $this->session->userdata('user_id') : NULL,
					'update_date'=> time(),
					'update_by'=>$this->session->userdata('user_id') !='' ? $this->session->userdata('user_id') : NULL,
					);
					
					$rs = $this->db->insert('account_data',$db_data);
					$insert_id = $this->db->insert_id();
					
					if($rs == true)
					{
						if(isset($files['file']) && is_array($files['file']) && sizeof($files['file']) > 0 )
						{
							if(!is_dir("uploads"))
							mkdir("uploads", 0777, TRUE);

							if(!is_dir("uploads/files"))
							mkdir("uploads/files", 0777, TRUE);
						
							if(!is_dir("uploads/files/". $this->session->userdata('user_id')))
							mkdir("uploads/files/". $this->session->userdata('user_id'), 0777, TRUE);
						
							$config['upload_path'] = "uploads/files/".$this->session->userdata('user_id');
							$config['allowed_types'] = '*';
							$config['max_size'] = '0';
							$config['max_width'] = '0'; /* max width of the image file */
							$config['max_height'] = '0'; /* max height of the image file */
							$config['file_name'] = $files['file']['name'];

							$this->load->library('upload', $config);
							$this->upload->initialize($config);
							if (!$this->upload->do_upload('file'))
							{
								$params = array('error' => $this->upload->display_errors());
								$result['msg'] = $params['error'];
								$result['result'] = false;
							}
							else
							{
								$upload_data = $this->upload->data();
								$file_result = $this->db->where('id',$insert_id)->update('account_data',array('file'=>$config['upload_path'] .'/'.$upload_data['file_name']));
								
								if(isset($file_result) && $file_result == true)
								{
									$result['result'] = true;
									$result['msg'] = 'New account records stored succesfully.';
								}
								else
								{
									$result['result'] = false;
									$result['msg'] = 'Unable to upload file given, Please try again later.';
								}
							}
						}
						
						$result['result'] = true;
						$result['msg'] = 'New account records stored succesfully.';
					}
					else
					{
						$result['result'] = false;
						$result['msg'] = 'Unable to insert record, please try again later.';
					}
				}
				else
				{
					$result['result'] = false;
					$result['msg'] = 'Account token doesnt exist, please try again later.';
				}
			}
			
			return $result;
		}
		else
		{
			$result['result'] = false;
			$result['msg'] = 'Required parameter missing, please try again later.';
			
			return $result;
		}
	}
	
	
}
?>