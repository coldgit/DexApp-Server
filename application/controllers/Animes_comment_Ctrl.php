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
		$users = array(
						'list_users' => array('Admin','Client'),
					  	'allowed_method' => array(
					  							 'Admin' => array('method' => array('POST','GET','PUT','DELETE')),
					  							 'Client' => array('method' => array('GET')),
					   							 ),
					  	'method_use' => $_SERVER['REQUEST_METHOD']
					   );

		switch ($this->restrict($users)) 
		{
			case 'true':
						$data = array('epi' => $epi, 'com_id' => $com_id,'key' => $_SERVER['REQUEST_METHOD'],
							'data' => array());
						$data['data'] += $this->input->post()+array('date_time' => date('Y-m-d H:i:s'));
						
						$this->_resp($this->Animes_comment_model->comment_($data));
			case '401':
				 $this->_resp(array('status_code' => 401,'data' => 'Unauthorized!'));
			break;
			
		}
	}


}
