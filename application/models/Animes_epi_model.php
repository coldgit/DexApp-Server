<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Animes_epi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function episode_($data)
	{
		switch ($data['key']) {
			case 'POST':
				$this->_new_epi($data);
				break;
			case 'GET':
				$this->_retrieve_epi($data);
				break;
			case 'PUT':
				$this->_update_epi($data);
				break;
			case 'DELETE':
				$this->_remove_epi($data);
				break;
			
			default:
				# code...
				break;
		}
	}

	public function _new_epi($data)
	{
		return $data;
	}
	
	public function _retrieve_epi($data)
	{
		return $data;
	}
	
	public function _update_epi($data)
	{
		return $data;
	}
	
	public function _remove_epi($data)
	{
		return $data;
	}
	
}
