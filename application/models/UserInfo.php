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
					$query =   $this->db->query("SELECT username,email,role,acc_created FROM userinfo WHERE role != 'Admin'");
						return array('status_code'=>'200','data' => $query->result_array());
				break;
			case 'GET':
					//print_r($data);
					if($data['single_q'])
					{
						if(isset($data['username']))
						{
							$query = $this->db->query("SELECT user_id,username,email,password,role FROM userinfo WHERE username = '{$data['username']}'  WHERE role != 'Admin' ");
							if($query->num_rows() === 1)
							{
								return array('status_code'=>'200','data' => $query->result_array());
							}else{
								return array('status_code'=>'200','data' =>false);
							}
						}else{
							$query =   $this->db->query("SELECT username,email,role,acc_created FROM userinfo  WHERE role != 'Admin'");
						return array('status_code'=>'200','data' => $query->result_array() );
						}

					}else{
						$query =   $this->db->query("SELECT username,email,role,acc_created FROM userinfo  WHERE role != 'Admin'");
						return array('status_code'=>'200','data' =>$query->result_array());
					}
				break;
			case 'PUT':
					print_r($data);//not done
				break;
			case 'DELETE':
					$this->db->query("DELETE FROM userinfo WHERE username = '{$data['username']}'");
					$query =   $this->db->query("SELECT username,email,role,acc_created FROM userinfo  WHERE role != 'Admin'");
						return array('status_code'=>'200','data' =>$query->result_array());
				break;
			}

	}
	
}
