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
	// public function getUser($username)
	// {	
				
	// 	$query = $this->db->query("SELECT username,password,email,role,acc_stat FROM users_list WHERE username = '{$username}'");
	// 	if($query->num_rows() === 1)
	// 	{
	// 		return $query->result_array();
	// 	}else{
	// 		return false;
	// 	}
	// }
}
