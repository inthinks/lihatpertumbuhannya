<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Makanan_bervariasi extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	function index(){
		$this->data['content']='makananBervariasi';
		$this->load->view('common/body',$this->data);
	}


}
?>