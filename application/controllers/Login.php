<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('general_model');
		$this->load->model('user_model');
	}
	
	function fb(){
		
		$fbid=$this->input->post('facebook_id');
		$name=$this->input->post('name');
		$email=$this->input->post('email');
		$data_facebook=$this->input->post('data_facebook');
		$token=$this->input->post('token');
		
		$newdate=date("Y-m-d H:i:s");
		$check=$this->user_model->check_fb_id($fbid);
		$imageURL = "http://graph.facebook.com/".$fbid."/picture?type=large";
		if($check){
			//update data
			$user_id=$check['id'];
			$table='user_tb';
			$where=array('id'=>$user_id);
			$data=array('fb_data'=>json_encode($data_facebook,TRUE));
			$this->general_model->update_data($table,$data,$where);
			
			$sess_user = array (
								   'user_logged_in' => true,
								   'user_id' => $check['id'],
								   'email' => $email,
								   'name' => $name,
								   'session_login'=>'facebook'
								);
			$this->session->set_userdata($sess_user);

			if($check['tanggal_lahir_sikecil']=='0000-00-00'){
				$tanggal = "01-01-2010";
			}else{
				$tanggal = date('d-m-Y',strtotime($check['tanggal_lahir_sikecil']));
			}
			
			echo json_encode(array('status'=>1,'message'=>'update','name'=>$check['name'],
				'email'=>$check['email'],'telp'=>$check['telp'],'tanggal'=>$tanggal,'produk_susu'=>$check['product_susu_yang_digunakan']));exit();
		}
		else{
			//insert new user
			if($this->session->userdata('vserv') != ''){
				$vserv = $this->session->userdata('vserv');
			} else {
				$vserv = '';
			}
			$table='user_tb';
			$data=array('fb_id'=>$fbid,'email'=>$email,'fb_data'=>json_encode($data_facebook,TRUE),'name'=>$name,
				'profile_picture'=>$imageURL,'created_date'=>$newdate,'vserv' => $vserv);
			$this->general_model->insert_data($table,$data);
			$user_id=$this->db->insert_id();
				
			$sess_user = array (
								   'user_logged_in' => true,
								   'user_id' => $user_id,
								   'email' => $email,
								   'name' => $name,
								   'session_login'=>'facebook'
								   
								);
			$this->session->set_userdata($sess_user);
			
			echo json_encode(array('status'=>1,'message'=>'insert','name'=>$name,'email'=>$email));exit();
		}
		
		
		echo json_encode(array('status'=>0,'message'=>'error'));exit();		
	}
    
}