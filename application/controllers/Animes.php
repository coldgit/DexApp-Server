<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//base controller
class Animes extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function _animes($title = null)
	{
		switch ($_SERVER['REQUEST_METHOD']){
			case 'POST':
					$this->_resp($this->_insert($_SERVER['REQUEST_METHOD']));
				break;
			case 'GET':
					$this->_resp($this->_retrieve($title,$_SERVER['REQUEST_METHOD']));
			break;
			case 'DELETE':
					$this->_resp($this->_remover($title,$_SERVER['REQUEST_METHOD']));
			break;
			default:
			
				break;
		}
	}

	public function _insert($key)
	{
		$data = $this->input->post()+array('date_time' => date('Y-m-d H:i:s'),'key' => $key);
		$this->Animes_model->animes($data);
	}
	
	public function _retrieve($title,$key)
	{
		$data = $this->input->get()+array('title'=>$title,'key' => $key);
		$this->Animes_model->animes($data);
	}

	public function _remover($key)
	{
		$data = $this->input->get()+array('title'=>$title,'key' => $key);
		$this->Animes_model->animes($data);
	}
}
