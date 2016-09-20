<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserInfo extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function makeUser($username,$pwd,$email,$role,$created)
	{	
		$password = password_hash($pwd,PASSWORD_BCRYPT);
		$this->db->query("INSERT INTO 
									userinfo(username,password,email,role,acc_created)
									VALUES('{$username}','{$password}','{$email}','{$role}','{$created}' )
									");
	}
	
	public function removeUser($username)
	{	
		$this->db->query("DELETE FROM userinfo WHERE username = '{$username}'");
		return true;
	}

	public function regList()
	{
		$query =   $this->db->query("SELECT username,email,role,acc_created FROM userinfo");
		return $query->result_array();
	}
	public function getUser($username)
	{	
				
		$query = $this->db->query("SELECT user_id,username,email,password,role FROM userinfo WHERE username = '{$username}'");
		if($query->num_rows() === 1)
		{
			return $query->result_array();
		}else{
			return false;
		}
	}

<<<<<<< HEAD
	public function updateUser($data)
	{
		$info = array(
				'username' => array('username',$data['username']), 
				'password' => array('password',((isset($data['password']))? password_hash($data['password'],PASSWORD_BCRYPT) : null)),
				'email' =>array('email' ,$data['email']));
=======
	public function updateUser($user_id,$username,$password,$email)
	{
		$info = array(
				'username' => array('username',$username), 
				'password' => array('password',((isset($password))? password_hash($password,PASSWORD_BCRYPT) : null)),
				'email' =>array('email' ,$email));
>>>>>>> 58897e094e7362cb1c5f10b5a9767d1a4d6bfed0
		foreach ($info as $x) 
		{
			switch (isset($x[1])) 
			{
				case 1:
					$this->db->query("UPDATE userinfo 
						  SET '{$x[0]}' = '{$x[1]}'
	 					  WHERE user_id = '{$user_id}'
	 					");
					return true;
					break;
				
				default:
					echo 'false';
					break;
			}
			
		}
		
	}


}
