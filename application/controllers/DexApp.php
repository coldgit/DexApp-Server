<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//base controller
class DexApp extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		// header('Location: '.base_url().'#/home');
		// if(!isset(getallheaders()['Authorization']))
		// echo $_SERVER['REQUEST_METHOD'];
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

	public function users($username = null){
		
		$data = array(
					'key' => $_SERVER['REQUEST_METHOD'], 
					'method' => (strtolower($_SERVER['REQUEST_METHOD']) == 'put')? 'get': strtolower($_SERVER['REQUEST_METHOD'])
					);
		//var_dump($username);
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
		//$data = array('username'=>'dexterity','password'=>'cold@123');

		$data = $this->input->post()+array('key' => 'GET','single_q' => 'true');
		// var_dump($data);
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
								 'logged_in' => TRUE
						);
						switch($info[ 0 ]['role'])
						{
							case 'Admin':
								$data = array('status_code' => '200','data' => array('success' => 'TRUE','location' => 'admin','credentials' => $items));
								$this->_resp($data);
								//$this->session->set_userdata($items);
							break;
							
							case 'Client':
							$data = array('status_code' => '200','data' => array('success' => 'TRUE','location' => 'client'));
							$this->_resp($data);
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
	// 	$data = $this->input->post();
	// 	$data['key'] = 'GET';
	// 	$data['single_q'] = (empty($_GET['username']))? 'false':'true';
	// 	$this->_resp(300,$this->UserInfo->users($data));
		
	// }

	public function generate_token($data_post)
	{
	    $CONSUMER_SECRET = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
	    $data = array('issuedAt'=>date(DATE_ISO8601, strtotime("now")),'ttl'=> ' 86400')+$data_post;
	    // $data = array('status_code' => '200', 'data' => 
	    return $this->jwt->encode($data, $CONSUMER_SECRET);
	    // );

	   // $this->_resp($data);
	}

	public function extract_token()
	{
	    // $CONSUMER_KEY = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
	    $CONSUMER_SECRET = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
	    // var_dump($this->input->post());
	    $CONSUMER_TTL = 86400;
	    $data = array('status_code' => '200', 'data' => $this->jwt->decode($this->generate_token($this->input->post()),$CONSUMER_SECRET));

	    $this->_resp($data);
	}
	
}
