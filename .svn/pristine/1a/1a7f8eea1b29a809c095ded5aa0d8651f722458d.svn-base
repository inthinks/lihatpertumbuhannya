<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Thanks extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	function index(){
		if(!$this->session->userdata('img')) redirect('photo_competition');
		$date = date('Y-m-d');
		$periode = $date < date('2016-08-18') ? 0 : 1;
		// $this->db->insert('photo_competition_tb',array('user_id'=>$this->session->userdata('user_id'), 'active'=>1,'photo'=>$nama,'token'=>$token, 'periode'=>$periode, 'created_date'=> date('Y-m-d H:i:s')));
		$this->db->insert('photo_competition_tb', array('user_id'=>$this->session->userdata('user_id'),'photo' => $this->session->userdata('img'),'caption' => $this->session->userdata('caption'), 'created_date'=> date('Y-m-d H:i:s'), 'periode'=>$periode, 'active'=>1));
		$this->session->unset_userdata('img');
		$this->session->unset_userdata('caption');
		$this->session->unset_userdata('token');
		$this->data['content']='thanks';
		$this->load->view('common/body',$this->data);
	}
}
?>