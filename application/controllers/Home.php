<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	function index(){
		$param = $this->input->get('vserv',true);
		if($param!="") {
			$this->session->set_userdata('vserv', $param);
		} else {
			$this->session->unset_userdata('vserv');
		}
		$this->data['content']='home';
		$this->load->view('common/body',$this->data);
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('home');
	}

	function sess(){
		$this->session->unset_userdata('img');
		$this->session->unset_userdata('caption');
		$this->session->unset_userdata('token');
		redirect('home');
	}



}
?>