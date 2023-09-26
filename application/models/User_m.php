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
					$return["message"] = "Please verify your email, in order to proceed.";
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
				$token = openssl_random_pseudo_bytes(16);
				$token = bin2hex($token);
				
				$db_user = array (
				'username'=>isset($post['username']) && $post['username'] != '' ? trim($post['username']) :'',
				'email'=>isset($post['email']) && $post['email'] != '' ? trim($post['email']) :'',
				'password'=>isset($post['password']) && $post['password'] != '' ? md5($post['password']) :'',
				'usertype'=>'user',
				'status'=>NULL,
				'token'=>$token,
				'date_update'=>time(),
				'date_created'=>time()
				);
				
				$rs = $this->db->insert('user',$db_user);
				
				$data['username'] = trim($post['username']);
				
				$data['validate'] = base_url() . 'authentication/validate/' . $token;
				$data['body'] = $this->load->view('email/welcome_t', $data, true);
				
				$data['subject'] = 'Verify your FieldPass account';
				$data['recipient'] = trim($post['email']);
				
				$db_email = array (
				'subject'=>isset($data['subject']) && $data['subject'] != '' ? trim($data['subject']) :'',
				'body'=>isset($data['body']) && $data['body'] != '' ? trim($data['body']) :'',
				'recipient'=>isset($data['recipient']) && $data['recipient'] != '' ? trim($data['recipient']) :'',
				'date_created'=>time()
				);
				
				$rs = $this->db->insert('email_log',$db_email);
				$email_id = $this->db->insert_id();
				
				$image = array(
				'logo-1.png'=> array('path'=>'metronic/dist/assets/media/email/logo-1.png','cid'=>'logo','type'=>'png'),
				'icon-positive-vote-1.png'=> array('path'=>'metronic/dist/assets/media/email/icon-positive-vote-1.png','cid'=>'positive-icon','type'=>'png')
				);
				
				$email_rs = sendmail($data['subject'],$data['body'],$data['recipient'],array(),$image);
				
				if($email_rs == true)
				{
					$this->db->where('id', $email_id);
					$query = $this->db->update('`email_log`',array('send_date' => time(),'status'=>1,'date_updated'=>time()));
				}
				
				$return["result"] = $rs;
				return $return;
			}
		}
	}
	
	public function activate_user($token = NULL)
	{
		if($token != NULL)
		{
			$user = $this->db->where('token',$token)->get('user')->row();
			
			$rs = $this->db->where('token',$token)->update('user',array('status'=>'active', 'token'=>NULL));

			if($rs == true)
			{
				$session_data = array(
				'username' => trim($user->username),
				'email' => trim($user->email),
				'user_id' => trim($user->id),
				'usertype' => trim($user->usertype),
				'logged_in' => "TRUE"
				);
				
				$username_explode = explode(' ',$user->username);
				$this->session->set_userdata($session_data);
				
				$this->db->where('id', $user->id);
				$this->db->update('`user`',array('last_login' => time()));
				
				return true;
			}
			
			return false;
		}
		
		return false;
	}
	
	
}
?>