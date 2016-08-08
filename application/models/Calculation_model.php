<?php if(!defined('BASEPATH')) exit('Hack attemp?');
class Calculation_model extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	
	function get_weight(){
		$sql = "select * from weight_calculation_tb where gender = '1'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function get_weight_female(){
		$sql = "select * from weight_calculation_tb where gender = '0'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function get_weight_detail($id){
		$sql = "select * from weight_calculation_tb where id = '".esc($id)."'";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	function check_month($month){
		$sql = "select * from weight_calculation_tb where month = '".esc($month)."'";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	// Height Calculation
	
	function get_height(){
		$sql = "select * from height_calculation_tb where gender = '1'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function get_height_female(){
		$sql = "select * from height_calculation_tb where gender = '0'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function get_height_detail($id){
		$sql = "select * from height_calculation_tb where id = '".esc($id)."'";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	function check_month_height($month){
		$sql = "select * from height_calculation_tb where month = '".esc($month)."'";
		$query = $this->db->query($sql);
		return $query->row_array();
	} 

	function weight_calculation($gender,$age){
		$sql = "SELECT *  FROM `weight_calculation_tb` WHERE `gender` = '".esc($gender)."' AND `month` = ".esc($age);
		$result = $this->db->query($sql);
		return $result->row_array();
	}

	function height_calculation($gender,$age){
		$sql = "SELECT *  FROM `height_calculation_tb` WHERE `gender` = '".esc($gender)."' AND `month` = ".esc($age);
		$result = $this->db->query($sql);
		return $result->row_array();
	}

	function max_month($gender){
		$sql = "select * from height_calculation_tb where gender = '".esc($gender)."' order by month desc";
		$query = $this->db->query($sql);
		return $query->row_array();
	} 

	function min_month($gender){
		$sql = "select * from height_calculation_tb where gender = '".esc($gender)."' order by month asc";
		$query = $this->db->query($sql);
		return $query->row_array();
	} 

	function get_cek_pertumbuhan(){
		$sql = "select * from cek_pertumbuhan_tb order by id desc";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

}?>