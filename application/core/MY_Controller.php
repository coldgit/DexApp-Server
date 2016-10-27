<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//base controller
class MY_Controller extends CI_Controller
{

	public $resources = [
	 					'css' => array('assets/bower_components/bootstrap/dist/css/bootstrap.css',
										'assets/bower_components/angular-bootstrap/ui-bootstrap-csp.css',
										// 'assets/bower_components/material-design-lite/material.min.css'
										),
						'scripts' => array(
											// 'assets/bower_components/material-design-lite/material.min.js',
											'assets/bower_components/angular/angular.js',
											'assets/js/app.js',
											'assets/js/server.controllers.js',
											'assets/js/server.routes.js',
											'assets/js/server.services.js',
											'assets/js/server.directive.js',
											'assets/bower_components/angular-ui-router/release/angular-ui-router.js',

											'assets/js/server.services.js',
											'assets/js/server.directive.js',

											'assets/bower_components/angular-bootstrap/ui-bootstrap.js',
											'assets/bower_components/angular-bootstrap/ui-bootstrap-tpls.min.js'
										)
						];
	protected $restrict = '';

	// public function restrict($restrict_user)
	// {
	// 	$headers = getallheaders();
	// 	if(isset($headers['x-token']))
	// 	{
	// 		 // echo $headers['x-token'];
	// 	 	$credit = explode("@", $headers['x-token']);
	// 	 	$user = (Array)$this->jwt->decode($credit[0],base64_decode($credit[1]));
	// 	 		for($user_type = 0 ; $user_type < COUNT($restrict_user['list_users']) ; $user_type++ )
	// 	 		{	
	// 	 			if($user["role"] === $restrict_user['list_users'][$user_type])
	// 	 			{
	// 	 				for($method = 0; $method < COUNT($restrict_user['allowed_method'][$user["role"]]['method']) ; $method++ )
	// 	 				{
	// 	 					if($restrict_user['method_use'] == $restrict_user['allowed_method'][$user["role"]]['method'][$method])
	// 	 					{
	// 	 						$this->restrict = 'true';
	// 	 					 }

	// 	 				}
			 		
	// 		 		}
	// 	 		}
				
	// 	 }else{
	// 	 	$this->restrict = '401';
	// 	 }
	// return $this->restrict;
	// }


	public function __construct()
	{
		parent::__construct();
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: x-token, Origin, X-Requested-With, Content-Type,Accept");
		header('Access-Control-Request-Method: POST, GET, PUT, DELETE');
		
	}

	public function _resp($data)
	{
		$this->output->set_status_header($data['status_code']);
		$this->output->set_header('Content-type:application/json');
		if(isset($data['xtoken']))
		{
			$this->output->set_header('x-token: '.$data['xtoken']);
		}
		if(isset($data['data']))
		{
			$this->output->set_output(json_encode($data['data']),
			JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
		}
	}
	
}
