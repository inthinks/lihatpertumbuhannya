<?php if(!defined("BASEPATH")) exit("Hack Attempt");
class Height_calculation extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('admin_logged_in')==false) redirect('pediasurePanel/login');
		$this->load->model('calculation_model');
		$this->load->model('general_model');
	} 

	function index(){
		$this->data['height'] = $this->calculation_model->get_height();
		$this->data['content'] = 'pediasurePanel/height_calculation/list';
		$this->data['gender']=1;
		$this->load->view('common/pediasurePanel/body', $this->data);
	}

	function female(){
		$this->data['height'] = $this->calculation_model->get_height_female();
		$this->data['content'] = 'pediasurePanel/height_calculation/list';
		$this->data['gender']=0;
		$this->load->view('common/pediasurePanel/body', $this->data);
	}

	function add($gender){
		$this->data['gender']=$gender;
		$this->data['content'] = 'pediasurePanel/height_calculation/add';
		$this->load->view('common/pediasurePanel/body', $this->data);
	}
	
	function do_add(){
		$month = $this->input->post('month');
		$gender = $this->input->post('gender');
		$val1 = $this->input->post('val1');
		$val2 = $this->input->post('val2');
		$val3 = $this->input->post('val3');
		$val4 = $this->input->post('val4');
		$val5 = $this->input->post('val5');
		$val6 = $this->input->post('val6');
		$val7 = $this->input->post('val7');
		$check_month = $this->calculation_model->check_month_height($month);

		if($check_month){
			$this->session->set_flashdata('notif1', 'Bulan sudah ada');
			redirect($_SERVER['HTTP_REFERER']);
		}
		else{
			$table='height_calculation_tb';
			$data=array('gender'=>$gender,'month'=>$month,'val1'=>$val1, 'val2'=>$val2, 'val3'=>$val3, 'val4'=>$val4, 'val5'=>$val5, 'val6'=>$val6, 'val7'=>$val7);

			$this->general_model->insert_data($table,$data);
			redirect('pediasurePanel/height_calculation');
		}
	}

	function edit($id){
		$this->data['id']=$id;
		$this->data['height']=$this->calculation_model->get_height_detail($id);
		$this->data['content'] = 'pediasurePanel/height_calculation/edit';
		$this->load->view('common/pediasurePanel/body', $this->data);
	}
	
	function do_edit(){
		$month = $this->input->post('month');
		$val1 = $this->input->post('val1');
		$val2 = $this->input->post('val2');
		$val3 = $this->input->post('val3');
		$val4 = $this->input->post('val4');
		$val5 = $this->input->post('val5');
		$val6 = $this->input->post('val6');
		$val7 = $this->input->post('val7');
		$id= $this->input->post('id');
		$table='height_calculation_tb';
		$data=array('month'=>$month,'val1'=>$val1, 'val2'=>$val2, 'val3'=>$val3, 'val4'=>$val4, 'val5'=>$val5, 'val6'=>$val6, 'val7'=>$val7);

		$where=array('id'=>$id);
		$this->general_model->update_data($table,$data,$where);
		redirect('pediasurePanel/height_calculation');
	}

	function delete($id){
		$this->general_model->delete_data('height_calculation_tb',array('id'=>$id));
		redirect($_SERVER['HTTP_REFERER']);
	}
	
}?>