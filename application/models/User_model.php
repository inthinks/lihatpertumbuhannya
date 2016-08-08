<?php if(!defined('BASEPATH')) exit('Hack attemp?');
class User_model extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	
	function get_user(){
		$sql = "select * from user_tb";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function get_user_by_login($id){
		$sql = "select * from user_tb WHERE id =".esc($id);
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	function check_fb_id($fbid){
		$q="select * from user_tb where fb_id='".esc($fbid)."' ";
		$query = $this->db->query($q);
		return $query->row_array();
	}

	function check_tw_id($twid){
		$q="select * from user_tb where tw_id='".esc($twid)."' ";
		$query = $this->db->query($q);
		return $query->row_array();
	}

}?>