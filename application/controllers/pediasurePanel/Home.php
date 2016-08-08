<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('admin_logged_in')){
			redirect('pediasurePanel/login');
		} 
	}

	function index(){
		$this->data['content']='pediasurePanel/home';
		$this->load->view('common/pediasurePanel/body',$this->data);
	}

    function logout(){
        $this->session->unset_userdata('admin_logged_in');
        redirect('pediasurePanel/login');
    }


}
?>