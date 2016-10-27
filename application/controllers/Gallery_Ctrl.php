<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//anime nga data
class Gallery_Ctrl extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function gallery($username=null,$gallery_id=null)
	{
		//img_src status = 1,
		$data = array('username' => $username,
					  'gallery_id' => $gallery_id,
					  'key' => $_SERVER['REQUEST_METHOD'],
					  'data' => $this->input->post());
		$this->_resp($this->Gallery_model->gallery($data));
	}

}
