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
				$this->_insert($data);
				break;
			case 'GET':
				$this->_retrieve($data);
				break;
			case 'DELETE':
				$this->_remover($data);
				break;
			
			default:
				'GET';
				break;
		}

	}

	public function _insert($data)
	{
		var_dump($data);
		 // para sa ani_url
		// $data['ani_url']= explode(" ", $data['title']);
		// for($i = 0; $i < count($data['ani_url']) ; $i++) {
		// 	$data['ani_url'][$i] = ucfirst($data['ani_url'][$i]);  
		// }
		// $data['ani_url'] = implode("-", $data['ani_url']);
		// 	           // Hello world!
		// $this->db->query("INSERT INTO anime(ani_title,img_src,summary,date_time,ani_url)
		// 	VALUES('{$data['ani_title']}','{$data['img_src']}','{$data['summary']},'{$data['date_time']}','{$data['ani_url']}')");
		// $query = $this->db->query("SELECT ani_title,ani_url,img_src,summary,date_time FROM anime ");

		// return array('status_code'=>'200','data' => $query->result_array());
	}

	public function _retrieve($data)
	{
		var_dump($data);
		// if($title == null)
		// {
		// 	$query = $this->db->query("SELECT ani_title,ani_url,img_src,summary,date_time FROM anime WHERE ani_title = '{$data['title']}'");
		// 	if($query->num_rows() === 1)
		// 	{
		// 		return array('status_code'=>'200','data' => $query->result_array());
		// 	}else{
		// 		return array('status_code'=>'200','data' =>false);
		// 	}

		// }else{
		// 	$query = $this->db->query("SELECT ani_title,ani_url,img_src,summary,date_time FROM anime ");
		// 	return array('status_code'=>'200','data' => $query->result_array());
		// }
	}

	public function _remover($data)
	{
		var_dump($data);
		// $this->db->query("DELETE FROM anime WHERE ani_title = '{$data['title']}'");
		// $query = $this->db->query("SELECT ani_title,ani_url,img_src,summary,date_time FROM anime ");
		// return array('status_code'=>'200','data' =>$query->result_array());
	}

}
