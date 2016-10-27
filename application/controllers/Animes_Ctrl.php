<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Animes_Ctrl extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function anime_c($title = null)
	{
		$data = array('ani_title' => $title,'data'=> array(), 'key' => $_SERVER['REQUEST_METHOD']);
		switch ($_SERVER['REQUEST_METHOD'])
		{
			case 'POST':
				$data['data'] += $this->input->post()+array('date_time' => date('Y-m-d H:i:s'));
				$this->_resp($this->Animes_model->animes($data));
			break;
			case 'GET':
				$data['data']+=$this->input->get();
			  	$this->_resp($this->Animes_model->animes($data));
			break;
			case 'PUT':
				$data += $this->input->get();
			 	$this->_resp($this->Animes_model->animes($data));
			break;
			case 'DELETE':
				$data += $this->input->get();
				$this->_resp($this->Animes_model->animes($data));
			break;
			default:
			break;
		}			
	}
}
