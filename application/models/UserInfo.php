<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserInfo extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function users($data)
	{

			switch ($data['key']) {
				case 'POST':
					//print_r($data);
					$pwd = password_hash($data['password'],PASSWORD_BCRYPT);
					$this->db->query("INSERT INTO 
												userinfo(username,password,email,role,acc_created)
												VALUES('{$data['username']}','{$pwd}','{$data['email']}','{$data['role']}','{$data['created']}' )
												");
					$query =   $this->db->query("SELECT username,email,role,acc_created FROM userinfo");
						return $query->result_array();
				break;
			case 'GET':
					//print_r($data);
					if($data['single_q'])
					{
						if(isset($data['username']))
						{
							$query = $this->db->query("SELECT user_id,username,email,password,role FROM userinfo WHERE username = '{$data['username']}'");
							if($query->num_rows() === 1)
							{
								return $query->result_array();
							}else{
								return false;
							}
						}else{
							$query =   $this->db->query("SELECT username,email,role,acc_created FROM userinfo");
						return $query->result_array();
						}

					}else{
						$query =   $this->db->query("SELECT username,email,role,acc_created FROM userinfo");
						return $query->result_array();
					}
				break;
			case 'PUT':
					print_r($data);//not done
				break;
			case 'DELETE':
					$this->db->query("DELETE FROM userinfo WHERE username = '{$data['username']}'");
					$query =   $this->db->query("SELECT username,email,role,acc_created FROM userinfo");
						return $query->result_array();
				break;
			}

	}
	
	// public function updateUser($data)
	// {	
	// 	$data = $data+array('key' => 'GET','single_q' => 'true');
		
	// 	$up = $this->users($data);
	// 	var_dump($up);
	// 	$info = array(
	// 			'username' => array('username',((isset($data['username']))? $data['username']:$up['username'])), 
	// 			'password' => array('password',((isset($data['password']))? password_hash($data['password'],PASSWORD_BCRYPT) : $up['password'])),
	// 			'email'	   => array('email' ,((isset($data['email']))? $data['email']: $up[0]['email'])));
		
	// 	foreach ($info as $x) 
	// 	{
	// 		switch (isset($x[1])) 
	// 		{
	// 			case 1:
	// 				$this->db->query("UPDATE userinfo SET $x[0] = '{$x[1]}' WHERE user_id = '{$up[0]['user_id']}' ");
	// 				return true;
	// 				break;
				
	// 			default:
	// 				echo 'false';
	// 				break;
	// 		}
			
	// 	}
		
//	}


}
