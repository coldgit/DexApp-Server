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
				$this->_new_comment($data);
				break;
			case 'GET':
				$this->_retrieve_comment($data);
				break;
			case 'PUT':
				$this->_update_comment($data);
				break;
			case 'DELETE':
				$this->_remove_comment($data);
				break;
			
			default:
				# code...
				break;
		}
	}

	public function _new_comment($data)
	{
		return $data;
	}
	
	public function _retrieve_comment($data)
	{
		return $data;
	}
	
	public function _update_comment($data)
	{
		return $data;
	}
	
	public function _remove_comment($data)
	{
		return $data;
	}
	
}
