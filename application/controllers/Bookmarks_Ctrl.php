<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//anime nga data
class Bookmarks_Ctrl extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function bookmarked($user_id=null,$anime_id=null)
	{
		$this->_resp($this->Bookmarks_model->bookmarked(array('data'=> array('user_id' => $user_id,'anime_id' => $anime_id),'key' => $_SERVER['REQUEST_METHOD'])));
	}

}
