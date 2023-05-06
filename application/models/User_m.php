<?php

class User_m extends CI_Model {

	function __construct(){
		parent::__construct();
	}
	
	public function user_verify($post = array())
	{
		if(preg_match("/[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/", trim($post["email"])))
		{
			$sql ="SELECT * FROM `user` WHERE `email` = " . $this->db->escape($post['email']) . " LIMIT 1";
			$query = $this->db->query($sql);
		}
		
		
		if($query->num_rows() > 0)
		{
			$data = $query->row();
			
			if(md5($this->input->post('password')) == $data->password)
			{
				
				if($data->status == 'active')
				{				
					$session_data = array(
					'username' => trim($data->username),
					'email' => trim($data->email),
					'user_id' => trim($data->id),
					'usertype' => trim($data->usertype),
					'logged_in' => "TRUE"
					);
					
					$this->session->set_userdata($session_data);
					
					$this->db->where('id', $data->id);
					$query = $this->db->update('`user`',array('last_login' => time()));
					
					$return["result"] = true;
					return $return;
				}
				else if($data->status == 'banned')
				{
					
					$return["result"] = "banned";
					$return["message"] = "Your account has been banned, Please contact administrator to resolve.";
					return $return;
				}
				else //empty == not verify
				{
					$return["result"] = false;
					$return["message"] = "Please validate your email, in order to proceed.";
					return $return;
				}
			
				$return["result"] = true;
				return $return;
				
			}
			else
			{
				$return["result"] = "wrong password";
				$return["message"] = "Password entered doesnt match, Please try again.";
				
				return $return;
			}
			
		}
		else
		{
			
			$return["result"] = "unregistered";
			$return["message"] = "Please register in order to proceed.";
			
			return $return;
		}
		
	}
	
	public function user_register($post = array())
	{
		
		$sql ="SELECT * FROM `user` WHERE `username` = " . $this->db->escape($post['username']) . " LIMIT 1";
		$query = $this->db->query($sql);
		
		
		if($query->num_rows() > 0)
		{
			$return["result"] = false;
			$return["message"] = "A user with that username already exists.";
			
			return $return;
		}
		else
		{
			if(preg_match("/[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/", trim($post["email"])))
			{
				$sql ="SELECT * FROM `user` WHERE `email` = " . $this->db->escape($post['email']) . " LIMIT 1";
				$query = $this->db->query($sql);
			}
			
			if($query->num_rows() > 0)
			{
				$return["result"] = false;
				$return["message"] = "An account with email " . $post['email'] . " already exists.";
				
				return $return;
			}
			else
			{
				$db_user = array (
				'username'=>isset($post['username']) && $post['username'] != '' ? $post['username'] :'',
				'email'=>isset($post['email']) && $post['email'] != '' ? $post['email'] :'',
				'password'=>isset($post['password']) && $post['password'] != '' ? md5($post['password']) :'',
				'usertype'=>'user',
				'status'=>NULL,
				'date_update'=>time(),
				'date_created'=>time()
				);
				
				$this->db->insert('user',$db_user);
				
				$return["result"] = true;
				return $return;
			}
		}
	}
	
	
}
?>