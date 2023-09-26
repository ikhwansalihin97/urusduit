<?php

class Account_m extends CI_Model {

	function __construct(){
		parent::__construct();
	}
	
	public function account_data()
	{
		$user_account = $this->db->where('user_id',$this->session->userdata('user_id'))->get('user_account')->result();
		
		foreach($user_account as $row_account)
		{
			$return['user_account'][$row_account->account_token] = array(
			'account_token'=>$row_account->account_token,
			'account_name'=>$row_account->account_name,
			'create_date'=>$row_account->create_date,
			'update_date'=>$row_account->update_date
			);
			
			
			$account_data = $this->db->where('account_token',$row_account->account_token)->get('account_data')->result();
			
			if(sizeof($account_data) > 0)
			{
				foreach($acount_data as $row_data)
				{
					ad($row_data);
				}
			}
			else
			{
				$return['user_account'][$row_account->account_token]['amount_total'] = '0.00';
			}
			
		}
		
		return $return;
	}
	
	
}
?>