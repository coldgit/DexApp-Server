<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Animes_comment_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function comment_($data)
	{
		switch ($data['key']) {
			case 'POST':
				return $this->_new_comment($data);
				break;
			case 'GET':
				return $this->_retrieve_comment($data);
				break;
			case 'PUT':
				return $this->_update_comment($data);
				break;
			case 'DELETE':
				return $this->_remove_comment($data);
				break;
			
			default:
				# code...
				break;
		}
	}

	public function _new_comment($data)
	{
		$data['data']+=array();
		var_dump($data);
	}
	
	public function _retrieve_comment($data)
	{
		var_dump($data);
	}
	
	public function _update_comment($data)
	{
		var_dump($data);
	}
	
	public function _remove_comment($data)
	{
		var_dump($data);
	}
}
