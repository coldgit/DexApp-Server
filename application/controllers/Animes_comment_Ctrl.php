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
		$data = array(
					'epi' => $epi,
					'com_id' => $com_id,
					'key' => $_SERVER['REQUEST_METHOD'],
					'data' => array());
		switch ($_SERVER['REQUEST_METHOD']) 
		{
			case 'POST':
				$data['data'] += $this->input->post()+array('date_time' => date('Y-m-d H:i:s'),'epi_id'=>$epi);
			break;
			case 'GET':
				$data;
			break;
			case 'PUT':
				$data['data']+= $this->input->get()+array('date_time' => date('Y-m-d H:i:s'));
			break;
			case 'DELETE':
				$data;
			break;
			default:
				# code...
			break;
		}
		$this->_resp($this->Animes_comment_model->comment_($data));
	}


}
