<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gallery extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('photo_model');
	}

	function index(){
		$date= date('Y-m-d');
		if($date < date('2016-08-18')){
			redirect('gallery/periode_1');
		}
		else {
			redirect('gallery/periode_2');
		}
	}

	function periode_1(){
		$this->data['photos'] = $this->photo_model->get_all_photo();
		$this->data['content']='gallery';
		$this->load->view('common/body',$this->data);
	}

	function periode_2(){
		$this->data['photos'] = $this->photo_model->get_all_photo_periode2();
		$this->data['content']='gallery';
		$this->load->view('common/body',$this->data);
	}
}
?>