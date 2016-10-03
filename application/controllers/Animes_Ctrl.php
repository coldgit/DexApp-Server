<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//base controller
class Animes_Ctrl extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function anime_c($title = null)
	{
		//var_dump($title);
		switch ($_SERVER['REQUEST_METHOD']){
			case 'POST':
					$this->_insert($_SERVER['REQUEST_METHOD']);
				break;
			case 'GET':
					$this->_retrieve($title,$_SERVER['REQUEST_METHOD']);
			break;
			case 'DELETE':
					$this->_remover($title,$_SERVER['REQUEST_METHOD']);
			break;
			default:
			
				break;
		}
	}

	public function _insert($key)
	{
		$data = $this->input->post()+array('date_time' => date('Y-m-d H:i:s'),'key' => $key);
		$this->_resp($this->Animes_model->animes($data));
	}
	
	public function _retrieve($title,$key)
	{
		$data = $this->input->get()+array('title'=> $title,'key' => $key);
		$this->_resp($this->Animes_model->animes($data));
	}

	public function _remover($title,$key)
	{
		$data = $this->input->get()+array('title'=>$title,'key' => $key);
		$this->_resp($this->Animes_model->animes($data));
	}
}
