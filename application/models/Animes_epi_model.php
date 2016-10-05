<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Animes_epi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function episode_($data)
	{
		switch ($data['key']) {
			case 'POST':
				return $this->_new_epi($data);
				break;
			case 'GET':
				return $this->_retrieve_epi($data);
				break;
			case 'PUT':
				return $this->_update_epi($data);
				break;
			case 'DELETE':
				return $this->_remove_epi($data);
				break;
			
			default:
				# code...
				break;
		}
	}

	public function _new_epi($data)
	{
		//
		$anime_id = $this->db->get_where('anime', array('ani_url' => $data['ani_title']));
		$data['data']+=array('anime_id' => $anime_id->result_array()[0]['anime_id']);
		$this->db->insert('anime_video',$data['data']);
		$query = $this->db->get('anime_video');
		
		return array('status_code' => '200','data' => $query->result_array());
	}
	
	public function _retrieve_epi($data)
	{
		if($data['episode'] != null)
		{	
			$anime_id = $this->db->get_where('anime', array('ani_url' => $data['ani_title']));
			$query = $this->db->query("SELECT episode_id,anime_id,epi_src,date_time,episode
								FROM anime_video 
								WHERE anime_id = '{$anime_id->result_array()[0]['anime_id']}'
								AND episode = '{$data['episode']}' LIMIT 1");
			if($query->num_rows() === 1)
			{
				return array('status_code' => '200','data' => $query->result_array());
			}else{
				return array('status_code'=>'200','data' =>false);
			}
		}else{
			$anime_id = $this->db->get_where('anime', array('ani_url' => $data['ani_title']));
			$query = $this->db->get_where('anime_video', array('anime_id' => $anime_id->result_array()[0]['anime_id']));
			return array('status_code' => '200','data' => $query->result_array());
		}
	}
	
	public function _update_epi($data)
	{
		
		$anime_id = $this->db->get_where('anime', array('ani_url' => $data['data']['ani_title']));
		$data['data']+=array('anime_id' => $anime_id->result_array()[0]['anime_id']);
		unset($data['data']['ani_title']);
		var_dump($data['data'],$this->_retrieve_epi($data)['data'][0]['episode_id']);
		$this->db->update('anime_video', $data['data'], array('episode_id' => $this->_retrieve_epi($data)['data'][0]['episode_id']));
		$query = $this->db->get('anime_video');
		return array('status_code' => '200','data' => $query->result_array());
	}
	
	public function _remove_epi($data)
	{
		$query = $this->db->delete('anime_video', array('episode_id' => $this->_retrieve_epi($data)['data'][0]['episode_id']));
		return array('status_code' => '200','data' => $query);
	}
	
}
