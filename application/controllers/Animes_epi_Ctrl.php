<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//anime nga data
class Animes_epi_Ctrl extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function animes_epi_($title=null,$epi=null)
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
						$data = array('ani_title' => $title, 'episode' => $epi ,'key' => $_SERVER['REQUEST_METHOD'],
							'data' => array());
						switch ($_SERVER['REQUEST_METHOD']) 
						{
							case 'POST':
									$data['data'] += $this->input->post()+array('date_time' => date('Y-m-d H:i:s'));
									$this->_resp($this->Animes_epi_model->episode_($data));
							break;
							case 'GET':
									$this->_resp($this->Animes_epi_model->episode_($data));
							break;
							case 'PUT':
									$data['data'] += $this->input->get()+array('date_time' => date('Y-m-d H:i:s'));
									$this->_resp($this->Animes_epi_model->episode_($data));
							break;
							case 'DELETE':
									$this->_resp($this->Animes_epi_model->episode_($data));
							break;
							default:
							
								break;
						}
			case '401':
				 $this->_resp(array('status_code' => 401,'data' => 'Unauthorized!'));
				 // echo getallheaders()['x-token'].'-'.$_SERVER['REQUEST_METHOD'];
			break;
			
		}
	}

}
