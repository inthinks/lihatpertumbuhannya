<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cek_pertumbuhan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('general_model');
	}

	function index(){
		$this->data['content']='input_data_anak';
		$this->load->view('common/body',$this->data);
	}

}
?>