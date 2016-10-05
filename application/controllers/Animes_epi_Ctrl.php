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
		$data = array('ani_title' => $title, 'episode' => $epi ,'key' => $_SERVER['REQUEST_METHOD'],
			'data' => array());
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
		$data['data'] += $this->input->post()+array('date_time' => date('Y-m-d H:i:s'));
		$this->_resp($this->Animes_epi_model->episode_($data));
	}

	public function __retrieve_epi($data)
	{
		$this->_resp($this->Animes_epi_model->episode_($data));
	}

	public function __update_epi($data)
	{
		$data['data'] += $this->input->get()+array('date_time' => date('Y-m-d H:i:s'));
		$this->_resp($this->Animes_epi_model->episode_($data));
	}

	public function __remove_epi($data)
	{
		$this->_resp($this->Animes_epi_model->episode_($data));
	}

	
}
