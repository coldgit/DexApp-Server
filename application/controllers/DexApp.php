<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//base controller
class Dexapp extends CI_Controller {

	
	public $resources = [
	 					'css' => array('assets/bower_components/bootstrap/dist/css/bootstrap.css',
										'assets/bower_components/angular-bootstrap/ui-bootstrap-csp.css'
										),
						'scripts' => array('assets/bower_components/angular/angular.js',
											'assets/js/app.js',
											'assets/js/server.services.js',
											'assets/js/server.directive.js',
											'assets/bower_components/angular-bootstrap/ui-bootstrap.js',
											'assets/bower_components/angular-bootstrap/ui-bootstrap-tpls.min.js'
										)
						];
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->load->view('dexapp',$this->resources);
	}


	public function regAuth()
	{
		$data = $this->input->post();
		$this->form_validation->set_rules('username', 'Username', 
														'required|min_length[8]|is_unique[userinfo.username]',
														array(
																'required'      => 'You have not provided %s.',
																'is_unique'     => 'This %s already exists.'
															)
														);
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[32]');
		$this->form_validation->set_rules('repassword', 'Re-Type Password', 'required|matches[password]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		if($this->form_validation->run()  == FALSE){
					$this->output
					->set_status_header(200)
					->set_header('Content-type:application/json')
					->set_output(json_encode(
							array('error_username' => '<strong>' . form_error('username'). '</strong>',
								  'error_password' => '<strong>' . form_error('password'). '</strong>',
								  'error_repassword' => '<strong>'. form_error('repassword'). '</strong>',
								  'error_email' => '<strong>'. form_error('email') . '</strong>')),
													JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
		}
		if($this->form_validation->run() == TRUE){

					 $data = $this->input->post(array('username','password','repassword','email'),true);
					 $data['acc_created'] = date('Y-m-d H:i:s');
					 $data['role'] = 'Client';
					
					 $this->UserInfo->
					 			makeUser(
					 					$data['username'],
					 					$data['password'],
					 					$data['email'],
					 					$data['role'],
					 					$data['acc_created']
					 					);

					 $this->output
						->set_status_header(200)
						->set_header('Content-type:application/json')
						->set_output(json_encode(array('success' => '<strong>Successfully Registered</strong>','data' =>  $this->UserInfo->regList())),
																	JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
			}
		
	}

	public function deleteUser($username)
	{
		if($this->UserInfo->removeUser($username))
		{
		$this->output
			->set_status_header(200)
			->set_header('Content-type:application/json')
			->set_output(json_encode(array('data' => $this->UserInfo->regList(),'done' => true)),
														JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
		}else{
				$this->output
			->set_status_header(200)
			->set_header('Content-type:application/json')
			->set_output(json_encode(array('data' => 'false')),
														JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
		}
	}
	public function registered()
	{
		$this->output
			->set_status_header(200)
			->set_header('Content-type:application/json')
			->set_output(json_encode(array('data' => $this->UserInfo->regList())),
														JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
			
	}
}
