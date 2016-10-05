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
		switch ($_SERVER['REQUEST_METHOD']){
			case 'POST':
					$this->_insert($data);
				break;
			case 'GET':
					$this->_retrieve($data);
				break;
			case 'PUT':
					$this->_update($data);
				break;
			case 'DELETE':
					$this->_remover($data);
				break;
			default:
			
				break;
		}
	}

	public function _insert($data)
	{
		$data['data'] += $this->input->post()+array('date_time' => date('Y-m-d H:i:s'));
		$this->_resp($this->Animes_model->animes($data));
	}
	
	public function _update($data)
	{
		$data['data']+=$this->input->get();
		$this->_resp($this->Animes_model->animes($data));
	}
	public function _retrieve($data)
	{
		$data += $this->input->get();
		$this->_resp($this->Animes_model->animes($data));
	}

	public function _remover($data)
	{
		$data += $this->input->get();
		$this->_resp($this->Animes_model->animes($data));
	}
}
