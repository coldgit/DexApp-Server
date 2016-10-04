<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Animes_comment_Ctrl extends MY_Controller 
{

	public function __construct()
	{
		parent::__construct();
	}
	
	public function animes_comment($epi=null,$com_id=null)
	{
		$data = array('epi' => $epi, 'com_id' => $com_id,'key' => $_SERVER['REQUEST_METHOD']);
		switch ($_SERVER['REQUEST_METHOD']) {
			case 'POST':
					$this->__insert_comment($data);
				break;
			
			case 'GET':
					$this->__retrieve_comment($data);
				break;
			
			case 'PUT':
					$this->__update_comment($data);
				break;
			
			case 'DELETE':
					$this->__remove_comment($data);
				break;
			
			default:
				'GET';
				break;
		}
	}

	public function __insert_comment($data)
	{
		var_dump($data);
	}
	
	public function __retrieve_comment($data)
	{
		var_dump($data);
	}
	
	public function __update_comment($data)
	{
		var_dump($data);
	}
	
	public function __remove_comment($data)
	{
		var_dump($data);
	}


}
