<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Terms_conditions extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	function index(){
		$this->data['content']='Tc';
		$this->load->view('common/body',$this->data);
	}


}
?>