<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DexApp extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();	
	}

	public function index()
	{
		$this->load->view('dexapp',$this->resources);
		
	}

	public function checker()
	{
		$data = $this->input->get();
		$data['key'] = 'GET';
		$data['single_q'] = (empty($_GET['username']))? 'false':'true';
		if(!$this->UserInfo->users($data)['data'])
		{
				$data = array('status_code' => '200','data' => array('check' => true));
		}else{
				$data = array('status_code' => '200','data' => array('check' => false));
		}
		$this->_resp($data);
	}

	public function users($username = null)
	{
		
		$data = array(
					'key' => $_SERVER['REQUEST_METHOD'], 
					'method' => (strtolower($_SERVER['REQUEST_METHOD']) == 'put')? 'get': strtolower($_SERVER['REQUEST_METHOD'])
					);
		if($data['key'] == 'POST')
		{	
			$data += $this->input->$data['method']()+array('role' => 'Client','created' => date('Y-m-d H:i:s') );
		}elseif($data['key'] == 'GET')
		{
			$data += $this->input->$data['method']()+array('single_q' => (($username == null)? 'false':'true'),'username' => $username );
		}else{
			$data= array('username'=> $username,'key' => $_SERVER['REQUEST_METHOD']);
		}	

	$this->_resp($this->UserInfo->users($data));
	
	}
	
	public function Login()
	{		
		$data = $this->input->post()+array('key' => 'GET','single_q' => 'true');
		$info = $this->UserInfo->users($data)['data'];
		$data_err = array('status_code'=> '300','data' => array('err' => array('error_login' => 'Invalid Username Or Password')));	
		switch($info)
		{
			case FALSE:
					$this->_resp($data_err);	
			break;
			default:
				$passmatch = password_verify($data['password'],$info[ 0 ]['password']);
				switch($passmatch)
				{
					case FALSE:
						$this->_resp($data_err);	
					break;
					case TRUE:
						$items = array(
										'username' => $info[ 0 ]['username'],
										'email' => $info[ 0 ]['email'],
										'role' => $info[ 0 ]['role'],
										'logged_in' => true
								);
						$data = array(
								'xtoken' => $this->jwt->encode($items,base64_encode($items['username'])).'@'.base64_encode($items['username']),
								'status_code' => '200',
								'data' => array(
												'success' => 'TRUE','location' => (($info[ 0 ]['role'] === 'Admin')? 'admin':'client'),
												'credentials' => $items)
											);
									$this->_resp($data);
					break;
				}
			break;
		}
	}	
}
