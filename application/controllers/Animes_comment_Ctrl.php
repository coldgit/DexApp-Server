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
		$data = array('epi' => $epi, 'com_id' => $com_id,'key' => $_SERVER['REQUEST_METHOD'],
			'data' => array());
		$data['data'] += $this->input->post()+array('date_time' => date('Y-m-d H:i:s'));
		
		$this->_resp($this->Animes_comment_model->comment_($data));
	}


}
