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
			case 'DELETE':
				return $this->_remover_($data);
				break;
		}

	}

	public function _insert_($data)
	{
		 // para sa ani_url
		$data['ani_url'] = explode(" ", $data['ani_title']);
		for($i = 0; $i < count($data['ani_url']) ; $i++) {
			$data['ani_url'][$i] = ucfirst($data['ani_url'][$i]);  
		}
		$data['ani_url'] = implode("-", $data['ani_url']);
		$data['ani_title'] = str_replace("-"," ",$data['ani_url']);
		$this->db->query("INSERT INTO anime(ani_title,img_src,summary,date_time,ani_url)
			VALUES('{$data['ani_title']}','{$data['img_src']}','{$data['summary']}','{$data['date_time']}','{$data['ani_url']}')");
		$query = $this->db->query("SELECT ani_title,ani_url,img_src,summary,date_time FROM anime");

		return array('status_code' => '200','data' => $query->result_array());
	}

	public function _retrieve_($data)
	{	
		if($data['title'] != null)
		{
			$data['title'] = str_replace("-"," ",$data['title']);
			//var_dump($data);
			$query = $this->db->query("SELECT ani_title,ani_url,img_src,summary,date_time FROM anime WHERE ani_title = '{$data['title']}'");
			if($query->num_rows() === 1)
			{
				return array('status_code' => '200','data' => $query->result_array());
			}else{
				return array('status_code' => '200','data' =>false);
			}

		}else{
			$query = $this->db->query("SELECT ani_title,ani_url,img_src,summary,date_time FROM anime");
			return array('status_code' => '200','data' => $query->result_array());
		}
	}

	public function _remover_($data)
	{
		//var_dump($data);
		$data['title'] = str_replace("-"," ",$data['title']);
		$this->db->query("DELETE FROM anime WHERE ani_title = '{$data['title']}'");
		$query = $this->db->query("SELECT ani_title,ani_url,img_src,summary,date_time FROM anime");
		return array('status_code' => '200', 'data' => $query->result_array());
	}

}
