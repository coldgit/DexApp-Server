<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//base controller
class Dexapp extends MY_Controller
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
		if(!$this->UserInfo->users($data))
		{
				$out = array('check' => true);
		}else{
				$out = array('check' => false);
		}
		$this->_resp(200,$out);
	}

	public function users(){
		$data = array(
					'key' => $_SERVER['REQUEST_METHOD'], 
					'method' => (strtolower($_SERVER['REQUEST_METHOD']) == 'delete' || strtolower($_SERVER['REQUEST_METHOD']) == 'put')? 'get': strtolower($_SERVER['REQUEST_METHOD'])
					);
		if($data['key'] == 'POST')
		{
			$data += $this->input->$data['method']()+array('role' => 'Client','created' => date('Y-m-d H:i:s') );
		}elseif($data['key'] == 'GET')
		{
			$data += $this->input->$data['method']()+array('single_q' => (empty($_GET['username']))? 'false':'true');
		}else{
			$data += $this->input->$data['method']();
		}
		$this->_resp(200,$this->UserInfo->users($data));
		
	}
	
	public function auth()
	{
		//$data = array('username'=>'dexterity','password'=>'cold@123');

		$data = $this->input->post()+array('key' => 'GET','single_q' => 'true');
		$info = $this->UserInfo->users($data);
		$err = array('error_login' => 'Invalid Username Or Password');	
		switch($info){
			case FALSE:
				$this->_resp(200,array('err' =>$err));	
			break;
					
			default:
					
			$passmatch = password_verify($data['password'],$info[ 0 ]['password']);
				switch($passmatch)
					{
					case FALSE:
						$this->_resp(200,array('err' =>$err));	
						break;
						
					case TRUE:
						$items = array(
								'username' => $info[ 0 ]['username'],
								'email' => $info[ 0 ]['email'],
								'role' => $info[ 0 ]['role'],
								 'logged_in' => TRUE
						);
						switch($info[ 0 ]['role'])
							{
							case 'Admin':
								$this->_resp(200,array('success' => 'TRUE','location' => 'admin'));
								//$this->session->set_userdata($items);
							break;
							
							case 'Client':
							$this->_resp(300,array('success' => 'TRUE','location' => 'client'));
								//$this->session->set_userdata($items);
								break;		
								}
					}
				}
	}

	// public function up()
	// {	
	// 	$data = $this->input->post();
	// 	// var_dump($data);
	// 	var_dump($this->UserInfo->updateUser($data));
	// }
	// public function updateUser()
	// {
	// 	$data = $this->input->post();
	// 	$this->output
	// 		->set_status_header(200)
	// 		->set_header('Content-type:application/json')
	// 		->set_output(json_encode(array('data' => $this->UserInfo->regList(),'done' => true)),
	// 													JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
	// }

	
	// public function profile($username)
	// {
	// 	$data = $this->input->get();
	// 	$data['key'] = 'GET';
	// 	$data['single_q'] = (empty($_GET['username']))? 'false':'true';
	// 	$this->output
	// 		->set_status_header(200)
	// 		->set_header('Content-type:application/json')
	// 		->set_output(json_encode($this->UserInfo->users($data)),
	// 									JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
	// }

	
}
