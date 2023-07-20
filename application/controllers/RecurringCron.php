<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RecurringCron extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load any necessary models, libraries, or helpers here
    }

	//command to run from cmd = php index.php recurringcron recurring_job 
	//command to run from cmd = php index.php recurringcron recurring_job 2023-07-10
    public function recurring_job($date = null) {
        
		// Your cron job logic goes here
		
		// This method will be executed when the controller is called from the CLI
		if (!$this->input->is_cli_request()) {
			redirect('oops');// or redirect or display a message
			return;
		}
		
		$use_date = true;
		
		if ($date === null) {
			
			$use_date = false;
            $date = date("y-m-d");
        }
		
		
		$this->load->database();
		
		
		$recurring_data = $this->db->where('exact_record_date',$date)->get('account_data')->result();

		if(is_array($recurring_data) && sizeof($recurring_data) > 0)
		{
			foreach($recurring_data as $row_recurring)
			{				
				if($row_recurring->record_option == 1)
				{
					continue;
				}
				
				$recurring = false;
				
				if($row_recurring->type == 'Recurring Monthly')
				{					
					$selected_day = intval($row_recurring->record_date_simple);
					
					if($use_date)
					{
						$current_month = date('Y-m', strtotime($date));
					}
					else
					{
						$current_month = date('Y-m');
					}
					
					$next_month = date('Y-m', strtotime('+1 month', strtotime($current_month)));
					$last_day_of_month = date('t', strtotime($next_month));
						
					// Adjust the selected day if it exceeds the last day of the current month
						
					if ($selected_day > $last_day_of_month) {
						$selected_day = $last_day_of_month;
					}
						

					$next_month = date('Y-m', strtotime('+1 month', strtotime($current_month)));
					$exact_record_date = date("Y-m-d", strtotime($next_month . '-' . $selected_day));
					
					$recurring = true;
				}
				else if($row_recurring->type == 'Recurring Weekly')
				{
					$exact_record_date = date('Y-m-d', strtotime($row_recurring->exact_record_date . ' +7 days'));
					
					$recurring = true;
					
				}
				else if($row_recurring->type == 'Recurring Anually')
				{
					$exact_record_date = date('Y-m-d', strtotime($row_recurring->exact_record_date . ' +1 year'));
					
					$recurring = true;
				}
				
				if($recurring)
				{
					$recurring_insert[] = array(
					'account_token'=> $row_recurring->account_token,
					'flow'=> $row_recurring->flow,
					'category'=> $row_recurring->category,
					'type'=> $row_recurring->type,
					'remarks'=> $row_recurring->remarks,
					'amount'=> $row_recurring->amount,
					'record_date_simple'=> $row_recurring->record_date_simple,
					'exact_record_date'=> $exact_record_date,
					'record_option'=> 0,
					'create_date'=> time(),
					'create_by'=> 0,
					'update_date'=> time(),
					'update_by'=> 0,
					);
				}

				// update for current row database
				$recurring_update[] = array(
				'id'=>$row_recurring->id,
				'record_option'=>1,
				);
				
			}
			
				if(!empty($recurring_insert)) 
					$this->db->insert_batch('account_data', $recurring_insert);
				if(!empty($recurring_update)) 
					$this->db->update_batch('account_data', $recurring_update, 'id');
		}

    }
}


?>