<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function gallery($data)
	{
		switch ($data['key']) 
		{
			case 'POST':
				$this->insert('gallery',$data['data']+array('username'=>$data['username']));
				$this->gallery(array(
									'key'=>'PUT',
									'data'=>array('status' => '0'),
									'gallery_id' => $data['gallery_id']));
				$out = $this->gallery(array('key' => 'GET','username' => $data['username']));
			break;
			case 'GET':
				if(isset($data['gallery_id']))
				{	$query = $this->db->query("SELECT gallery_id,img_src,status 
										   FROM gallery_user
										   WHERE gallery_id = '{$data['gallery_id']}'
										   AND  username = '{$data['username']}'
										   AND status = 1");
				}else{$query = $this->db->query("SELECT user_id,username,gallery_id,img_src,status
											FROM gallery_user 
											WHERE username = '{$data['username']}'
											AND status = 1");
				}
				$out = $query->result_array();
			break;
			case 'PUT':
				$this->db->update('gallery', $data['data'], array('gallery_id' => $data['gallery_id']));
				$out = $this->gallery(array('key' => 'GET','username' => $data['username']));
			break;
			case 'DELETE':
				$this->db->delete('gallery', array('gallery_id' => $data['gallery_id']));
				$out = $this->gallery(array('key' => 'GET','username' => $data['username']));
			break;
			default:
				# code...
				break;
		}
		return array('status_code' => '200','data' => $out);
	}
}
