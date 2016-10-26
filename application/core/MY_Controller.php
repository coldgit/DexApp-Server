<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//base controller
class MY_Controller extends CI_Controller
{

	protected $skey = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
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
	public function __construct()
	{
// 		header("Access-Control-Allow-Origin: *");
// 		header("Access-Control-Allow-Headers: Authorization, Origin, X-Requested-With, Content-Type,Accept");
// 		header("Content-Type: application/json");
// 		$headers = getallheaders();
// echo $headers['Authorization'];
		parent::__construct();

// 		$headers = apache_request_headers() ;
// //  print_r($headers);
// 		if(isset($headers['Authorization'])){
// 		        //$credentials = base64_decode($headers);
// 		        print_r(apache_request_headers());
// 		}
	}

	public function _resp($data)
	{
		// $this->output->set_header('Authorization:'.$data['auth']);
		$this->output
			->set_status_header($data['status_code'])
			->set_header('Content-type:application/json')
			->set_header('Access-Control-Allow-Origin: *')
			->set_output(json_encode($data['data']),
			JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
	}
	
}
