<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bookmarks_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function bookmarked($data)
	{
		switch ($data['key']) 
		{
			case 'POST':
				$this->db->insert('bookmarks', $data['data']);
				$out = $this->bookmarked(array('key'=>'GET',
												'data'=>array('user_id' => $data['data']['user_id'])
										)
								);
			break;
			case 'GET':
				$query = $this->db->query("SELECT ani_title,ani_url,bookmark_id,anime_id 
								  FROM bookmarked 
								  WHERE user_id = '{$data['data']['user_id']}'
								  ORDER BY bookmark_id DESC");
				$out = $query->result_array();

			break;
			case 'PUT':
				# code...
			break;
			case 'DELETE':
				$this->db->delete('bookmarks', array('user_id' => $data['data']['user_id'],'anime_id' => $data['data']['anime_id']));
				$out = $this->bookmarked(array('key'=>'GET',
											'data'=>array('user_id' => $data['data']['user_id'])
											)
									);
			break;
			default:
				# code...
			break;
		}
		return array('status_code' => '200','data' => $out);
	}
}
