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
	public function __construct()
	{
		parent::__construct();
	}

	public function _resp($data)
	{
		$this->output
			->set_status_header($data['status_code'])
			->set_header('Content-type:application/json')
			->set_output(json_encode($data['data']),
			JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
	}
	
}
