<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cek_pertumbuhan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('general_model');
		$this->load->model('calculation_model');
	}

	function index(){
		$this->data['cek'] = $this->calculation_model->get_cek_pertumbuhan();
		$this->data['content']='pediasurePanel/cek_pertumbuhan';
		$this->load->view('common/pediasurePanel/body',$this->data);
	}

}
?>