<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class About extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	function index(){
		// Hitung selisih bulan 
		/*date_default_timezone_set('Asia/Jakarta');  // you are required to set a timezone

		$date1 = new DateTime('2009-02-30');
		$date2 = new DateTime('2003-04-14');

		$diff = $date1->diff($date2);

		echo (($diff->format('%y') * 12) + $diff->format('%m')) . " full months difference";*/
		//-------------
		
		// echo strtotime("+10 days");die;
		$this->data['content']='about';
		$this->load->view('common/body',$this->data);
	}

	function test(){
		$this->load->view('test');
	}


}
?>