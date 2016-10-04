<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Animes_epi_Ctrl extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function animes_epi_($title=null,$epi=null)
	{
		$data = array('title' => $title, 'epi' => $epi ,'key' => $_SERVER['REQUEST_METHOD']);
		switch ($_SERVER['REQUEST_METHOD']) {
			case 'POST':
					$this->__insert_epi($data);
				break;
			
			case 'GET':
					$this->__retrieve_epi($data);
				break;
			
			case 'PUT':
					$this->__update_epi($data);
				break;
			
			case 'DELETE':
					$this->__remove_epi($data);
				break;
			
			default:
				'GET';
				break;
		}
	}

	public function __insert_epi($data)
	{
		var_dump($data);
	}

	public function __retrieve_epi($data)
	{
		var_dump($data);
	}

	public function __update_epi($data)
	{
		var_dump($data);
	}

	public function __remove_epi($data)
	{
		var_dump($data);
	}

	
}
