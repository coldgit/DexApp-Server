<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Animes_comment_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function comment_($data)
	{
		switch ($data['key']) 
		{
			case 'POST':
				$this->db->insert('comment_per_episode', $data['data']);
				$out = $this->comment_(array('key'=>'GET','epi' => $data['epi']));
				break;
			case 'GET':
				if(isset($data['com_id']))
				{
					$query = $this->db->query("SELECT comment_id,comment 
											   FROM users_anime_episode_and_comments
											   WHERE episode_id = '{$data['epi']}' 
											   AND comment_id = '{$data['com_id']}'");
				}else{
					$query = $this->db->query("SELECT comment_id,comment,username,profpic,date_time_commented
											   FROM users_anime_episode_and_comments
											   WHERE episode_id = '{$data['epi']}' ORDER BY comment_id ASC");
				}
				$out = $query->result_array();
				break;
			case 'PUT':
				$this->db->update('comment_per_episode', $data['data'], array('comment_id' => $data['com_id']));
				$out = $this->comment_(array('key'=>'GET','epi' => $data['epi']));
				break;
			case 'DELETE':
				$this->db->delete('comment_per_episode', array('comment_id' => $data['com_id']));
				$out = $this->comment_(array('key'=>'GET','epi' => $data['epi']));
			break;
			
			default:
				# code...
				break;
		}
		return array('status_code' => '200','data' => $out);
	}
}
