<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Calculation_result extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('calculation_model');
		$this->load->model('general_model');

	}

	function index(){
		$name = $this->security->xss_clean($_POST['nama']);
		$gender = $this->security->xss_clean($_POST['jenis_kelamin']);
		$tanggal = $this->security->xss_clean($_POST['tanggal_lahir']);
		$weight = $this->security->xss_clean($_POST['berat_badan']);
		$height = $this->security->xss_clean($_POST['tinggi_badan']);
		$tanggal_lahir = date('Y-m-d',strtotime($tanggal));

		if(!$name){
			$this->session->set_flashdata('name',$name);
			$this->session->set_flashdata('weight',$weight);
			$this->session->set_flashdata('height',$height);
			$this->session->set_flashdata('gender',$gender);
			$this->session->set_flashdata('notif', 'Nama harus diisi');
			redirect($_SERVER['HTTP_REFERER']);
		}
		// if(!$gender){
		// 	$this->session->set_flashdata('name',$name);
		// 	$this->session->set_flashdata('weight',$weight);
		// 	$this->session->set_flashdata('height',$height);
		// 	$this->session->set_flashdata('gender',$gender);
		// 	$this->session->set_flashdata('notif', 'Jenis kelamin harus diisi');
		// 	redirect($_SERVER['HTTP_REFERER']);
		// }
		if(!$tanggal_lahir){
			$this->session->set_flashdata('name',$name);
			$this->session->set_flashdata('weight',$weight);
			$this->session->set_flashdata('height',$height);
			$this->session->set_flashdata('gender',$gender);
			$this->session->set_flashdata('notif', 'Tanggal lahir harus diisi');
			redirect($_SERVER['HTTP_REFERER']);
		}
		if(!$weight){
			$this->session->set_flashdata('name',$name);
			$this->session->set_flashdata('weight',$weight);
			$this->session->set_flashdata('height',$height);
			$this->session->set_flashdata('gender',$gender);
			$this->session->set_flashdata('notif', 'Berat badan harus diisi');
			redirect($_SERVER['HTTP_REFERER']);
		}
		if(!$height){
			$this->session->set_flashdata('name',$name);
			$this->session->set_flashdata('weight',$weight);
			$this->session->set_flashdata('height',$height);
			$this->session->set_flashdata('gender',$gender);
			$this->session->set_flashdata('notif', 'Tinggi badan harus diisi');
			redirect($_SERVER['HTTP_REFERER']);
		}
		/*if($gender != 1 || $gender != 0){
			$this->session->set_flashdata('name',$name);
			$this->session->set_flashdata('weight',$weight);
			$this->session->set_flashdata('height',$height);
			$this->session->set_flashdata('gender',$gender);
			$this->session->set_flashdata('notif', 'Jenis kelamin harus laki-laki atau perempuan');
			redirect($_SERVER['HTTP_REFERER']);
		}*/
		$berat2 = str_replace(',','.', $weight);
		$tinggi2 = str_replace(',','.', $height);

		if(!is_numeric($berat2)){
			$this->session->set_flashdata('name',$name);
			$this->session->set_flashdata('weight',$weight);
			$this->session->set_flashdata('height',$height);
			$this->session->set_flashdata('gender',$gender);
			$this->session->set_flashdata('notif', 'Berat badan harus angka');
			redirect($_SERVER['HTTP_REFERER']);
		}
		if(!is_numeric($tinggi2)){
			$this->session->set_flashdata('name',$name);
			$this->session->set_flashdata('weight',$weight);
			$this->session->set_flashdata('height',$height);
			$this->session->set_flashdata('gender',$gender);
			$this->session->set_flashdata('notif', 'Tinggi badan harus angka');
			redirect($_SERVER['HTTP_REFERER']);
		}


/*		if($gender == 'laki-laki'){
			$jenis_kelamin = '1';
		}
		else if($gender == 'perempuan'){
			$jenis_kelamin = '0';
		}*/


		date_default_timezone_set('Asia/Jakarta');  // you are required to set a timezone

		$date1 = new DateTime($tanggal_lahir);
		$date2 = new DateTime(date('Y-m-d'));

		$diff = $date1->diff($date2);

		$month = (($diff->format('%y') * 12) + $diff->format('%m'));

		$max_month = $this->calculation_model->max_month($gender);
		$min_month = $this->calculation_model->min_month($gender);

		if($month > $max_month['month']){
			$this->session->set_flashdata('name',$name);
			$this->session->set_flashdata('weight',$weight);
			$this->session->set_flashdata('height',$height);
			$this->session->set_flashdata('gender',$gender);
			$this->session->set_flashdata('notif', 'Umur harus di bawah '.$max_month['month'].' bulan');
			redirect($_SERVER['HTTP_REFERER']);
		}
		if($month < $min_month['month']){
			$this->session->set_flashdata('name',$name);
			$this->session->set_flashdata('weight',$weight);
			$this->session->set_flashdata('height',$height);
			$this->session->set_flashdata('gender',$gender);
			$this->session->set_flashdata('notif', 'Umur harus di atas '.$min_month['month'].' bulan');
			redirect($_SERVER['HTTP_REFERER']);
		}

		$this->data['Wresult'] = $this->result_weight_calculation($gender,$month,$berat2);
		$this->data['Hresult'] = $this->result_height_calculation($gender,$month,$tinggi2);
		
		if($this->data['Wresult'] < $this->data['Hresult']){
			$this->data['result'] = $this->data['Wresult'];
		}
		else if($this->data['Wresult'] > $this->data['Hresult']){
			$this->data['result'] = $this->data['Hresult'];
		}
		else{
			$this->data['result'] = $this->data['Hresult'];
		}
		//echo $this->data['Wresult'];exit;
		if($this->session->userdata('user_logged_in')){
			$user_id = $this->session->userdata('user_id');
			$source = $this->session->userdata('session_login');
		}
		else{
			$user_id = "";
			$source = "";
		}

		$data = array(
				'user_id'=>$user_id,
				'login_from'=>$source,
				'nama'=>$name,
				'jenis_kelamin'=>$gender,
				'tanggal_lahir'=>$tanggal_lahir,
				'tinggi_badan'=>$tinggi2,
				'berat_badan'=>$berat2,
				'result'=>$this->data['result'], 
				'created_date'=>date('Y-m-d H:i:s'));
		$this->general_model->insert_data('cek_pertumbuhan_tb',$data);

		$this->data['weight'] = $berat2;
		$this->data['height'] = $tinggi2;
		$this->data['month'] = $month;
		$this->data['jenis_kelamin'] = $gender;
		$this->data['content']='result_boy';
		$this->load->view('common/body',$this->data);
	}

	function result_weight_calculation($gender,$month,$weight){
		//Check ke table weight
		$rowW = $this->calculation_model->weight_calculation($gender,$month);
		//print_r($row);

		$valW1 = $rowW['val1'];
		$valW2 = $rowW['val2'];
		$valW3 = $rowW['val3'];
		$valW4 = $rowW['val4'];
		$valW5 = $rowW['val5'];
		$valW6 = $rowW['val6'];
		$valW7 = $rowW['val7'];


		 return $this->checkWeightCalculation($weight,$valW1,$valW2,$valW3,$valW4,$valW5,$valW6,$valW7);
	}

	function result_height_calculation($gender,$month,$height){
		$rowH = $this->calculation_model->height_calculation($gender,$month);
		//print_r($row);

		$valH1 = $rowH['val1'];
		$valH2 = $rowH['val2'];
		$valH3 = $rowH['val3'];
		$valH4 = $rowH['val4'];
		$valH5 = $rowH['val5'];
		$valH6 = $rowH['val6'];
		$valH7 = $rowH['val7'];

		return $this->checkHeightCalculation($height,$valH1,$valH2,$valH3,$valH4,$valH5,$valH6,$valH7);
	}

	function checkWeightCalculation($weight,$val1,$val2,$val3,$val4,$val5,$val6,$val7){
		$result = 0 ;
		if ($weight <= $val1)
		{
			$result = 1;
		}
		else if ($weight > $val7)
		{
			$result = 7;
		}
		else if ($weight > $val1 && $weight <= $val2)
		{

			$result = 2;
			
		}
		else if ($weight > $val2 && $weight <= $val3)
		{
			$result = 3;
			
		}
		else if ($weight > $val3 && $weight < $val4)
		{
			$result = 3;
			
		}
		else if ($weight >= $val4 && $weight < $val5)
		{
			
			$result = 4;
			
		}
		else if ($weight >= $val5 && $weight < $val6)
		{
			
			$result = 5;
			
		}
		else if ($weight >= $val6 && $weight < $val7)
		{
			
			$result = 6;
		
		}
		return $result;

}

function checkHeightCalculation($height,$val1,$val2,$val3,$val4,$val5,$val6,$val7){
		$result = 0 ;
		if ($height <= $val1)
		{
			$result = 1;
		}
		else if ($height > $val7)
		{
			$result = 7;
		}
		else if ($height > $val1 && $height <= $val2)
		{

			$result = 2;
			
		}
		else if ($height > $val2 && $height <= $val3)
		{
			$result = 3;
			
		}
		else if ($height > $val3 && $height < $val4)
		{
			$result = 3;
			
		}
		else if ($height >= $val4 && $height < $val5)
		{
			
			$result = 4;
			
		}
		else if ($height >= $val5 && $height < $val6)
		{
			
			$result = 5;
			
		}
		else if ($height >= $val6 && $height < $val7)
		{
			
			$result = 6;
		
		}
		return $result;
	}

}
?>