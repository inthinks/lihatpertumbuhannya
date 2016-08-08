<?php if(!defined("BASEPATH")) exit("Hack Attempt");
class Photo extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('admin_logged_in')==false) redirect('pediasurePanel/login');
		$this->load->model('photo_model');
		$this->load->model('general_model');
	} 

	function index(){
		$this->data['photo'] = $this->photo_model->get_photo();
		$this->data['content'] = 'pediasurePanel/photo/list';
		$this->load->view('common/pediasurePanel/body', $this->data);
	}

	function delete($id){
		$this->general_model->delete_data('photo_competition_tb',array('id'=>$id));
		redirect($_SERVER['HTTP_REFERER']);
	}

	function active(){
		$active = $this->input->post('value');
		$id = $this->input->post('id');
		// $active == 0 ? $active = 1 : $active = 0; 
		
		$table='photo_competition_tb';
		$data=array('active'=>$active);
		$where=array('id'=>$id);
		$result = $this->general_model->update_data($table,$data,$where);
		if($result){
			echo $result;
		}else{
			echo 'ERROR '.$result;
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	
}?>