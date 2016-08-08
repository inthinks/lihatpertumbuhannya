<?php if(!defined("BASEPATH")) exit("Hack Attempt");
class User extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('admin_logged_in')==false) redirect('pediasurePanel/login');
		$this->load->model('user_model');
		$this->load->model('general_model');
	} 

	function index(){
		$this->data['user'] = $this->user_model->get_user();
		$this->data['content'] = 'pediasurePanel/user/list';
		$this->load->view('common/pediasurePanel/body', $this->data);
	}

	function delete($id){
		$this->general_model->delete_data('user_tb',array('id'=>$id));
		redirect($_SERVER['HTTP_REFERER']);
	}
	
}?>