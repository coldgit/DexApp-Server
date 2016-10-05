<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Animes_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function animes($data)
	{
		switch ($data['key']) {
			case 'POST':
				return $this->_insert_($data);
				break;
			case 'GET':
				return $this->_retrieve_($data);
				break;
			case 'PUT':
				return $this->_update_($data);
			break;
		
			case 'DELETE':
				return $this->_remover_($data);
				break;
		}

	}
	public function _data($data)
	{
		$data['data']['ani_url'] = explode(" ", $data['data']['ani_title']);
		for($i = 0; $i < count($data['data']['ani_url']) ; $i++) {
			$data['data']['ani_url'][$i] = ucfirst($data['data']['ani_url'][$i]);  
		}
		$data['data']['ani_url'] = implode("-", $data['data']['ani_url']);

		$data['data']['ani_title'] = str_replace("-"," ",$data['data']['ani_url']);
		return $data;
	}

	public function _insert_($data)
	{
		 // para sa ani_url
		
		$data = $this->_data($data);
		$this->db->insert('anime',$data['data']);
		$query = $this->db->get('anime');
		return array('status_code' => '200','data' => $query->result_array());
	}

	public function _retrieve_($data)
	{	
		if($data['ani_title'] != null)
		{
			$data['ani_title'] = str_replace("-"," ",$data['ani_title']);
			$query = $this->db->query("SELECT anime_id,ani_title,ani_url,img_src,summary,date_time FROM anime WHERE ani_title = '{$data['ani_title']}'");
			if($query->num_rows() === 1)
			{
				return array('status_code' => '200','data' => $query->result_array());
			}else{
				return array('status_code' => '200','data' =>false);
			}

		}else{
			$query = $this->db->get('anime');
			
			return array('status_code' => '200','data' => $query->result_array());
		}
	}

	public function _update_($data)
	{
		$title['ani_title'] = $data['ani_title'];
		$id = $this->_retrieve_($title);
		$ani_id = $id['data'][0]['anime_id'];
		$data = $this->_data($data);

		$this->db->update('anime', $data['data'], array('anime_id' => $ani_id));
		$query = $this->db->get('anime');
		
		return array('status_code' => '200','data' => $query->result_array());
	}
	public function _remover_($data)
	{
		$data['ani_title'] = str_replace("-"," ",$data['ani_title']);
		$this->db->delete('anime', array('ani_title' => $data['ani_title']));
		$query = $this->db->get('anime');
		
		return array('status_code' => '200', 'data' => $query->result_array());
	}

}
