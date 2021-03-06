<?php if(!defined('BASEPATH')) exit('Hack attemp?');
class Photo_model extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	
	function get_photo(){
		$sql = "select * from photo_competition_tb where caption != '' && photo != '' order by created_date desc";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function get_last_photo(){
		$result = $this->db->query('select * from photo_competition_tb order by id desc limit 1');
		return $result->row_array();
	}

	function get_edit_photo($user_id){
		$result = $this->db->query('select * from photo_competition_tb WHERE user_id = '.esc($user_id));
		return $result->row_array();
	}

	function get_all_photo(){
		$result = $this->db->query("select photo.*, user.* from photo_competition_tb photo join user_tb user on photo.user_id = user.id WHERE photo.active = 1 && photo.periode = 0 && photo.photo !='' && photo.caption !='' ORDER BY photo.id DESC");
		return $result->result_array();
	}

	function get_all_photo_periode2(){
		$result = $this->db->query("select photo.*, user.* from photo_competition_tb photo join user_tb user on photo.user_id = user.id WHERE photo.active = 1 && photo.periode = 1 && photo.photo !='' && photo.caption !='' ORDER BY photo.id DESC");
		return $result->result_array();
	}



}?>