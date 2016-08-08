<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Photo_competition extends CI_Controller {
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('user_logged_in')) redirect('home');
		$this->load->model('general_model');
		$this->load->model('photo_model');
	}

	function index(){
		$this->data['param'] = $this->session->userdata('vserv');
		$this->data['content']='photo_competition';
		$this->load->view('common/body',$this->data);
	}

	function edit(){
		if(!$this->session->userdata('img')) redirect('photo_competition');
		$this->data['photo']=($this->photo_model->get_edit_photo($this->session->userdata('user_id')));
		$this->data['content']='photo_competition_edit';
		$this->load->view('common/body',$this->data);
	}

	function do_post(){
		$this->session->set_userdata('caption', $this->input->post('caption'));
		$token = $this->input->post('token');

		$this->db->update('photo_competition_tb', array('caption'=>$caption),array('token'=>$token));
		redirect('preview');
	}

	function rotate(){
		if(!$this->input->is_ajax_request()){
			show_404();
		}
		$img = $this->session->userdata('img');
		$degrees = $this->input->post('degre');
		$imageUrl = FCPATH.'/userdata/photos/'.$img;
        $info = getimagesize($imageUrl);
        if($info['mime']) {
            if($info['mime']=='image/gif'){
                $canvas = imagecreatefromgif($imageUrl);
                $rotate = imagerotate( $canvas, -$degrees, 0 ) ;
                imagegif( $rotate, $imageUrl );
            }elseif($info['mime']=='image/jpeg'){
                $canvas = imagecreatefromjpeg($imageUrl);
                $rotate = imagerotate( $canvas, -$degrees, 0 ) ;
                imagejpeg( $rotate, $imageUrl );
            }elseif($info['mime']=='image/png'){
                $canvas = imagecreatefrompng($imageUrl);
                $rotate = imagerotate( $canvas, -$degrees, 0 ) ;
                imagepng( $rotate, $imageUrl );
            }
        }
        imagedestroy( $canvas );
        echo "SUKSES";
	}

	function upload(){
		if(!$this->input->is_ajax_request()){
			show_404();
		}
		// $id = str_replace('=', '', str_replace('nice_try_do_the_next_step', '', base64_decode($id)));
		$config['upload_path']   = './userdata/photos/';
        $config['allowed_types'] = 'gif|jpg|png|ico';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload',$config);
        $date = date('Y-m-d');
        $periode = $date < date('2016-08-18') ? 0 : 1;
        // pre($this->upload);die;
        // $img=$this->input->post('image');
        // echo $periode; die;

        if($this->upload->do_upload('image')){
        	$token=$this->input->post('token');
        	$nama=$this->upload->data('file_name');
        	$this->session->set_userdata('img', $nama);
        	$this->session->set_userdata('token', $token);
        	$imageUrl = FCPATH.'/userdata/photos/'.$nama;
        	/*if(exif_imagetype($imageUrl) == 2)//2 IMAGETYPE_JPEG
			{
			    $exif = exif_read_data($imageUrl);
			    if(!empty($exif['Orientation']))
			    {
			        $image = imagecreatefromjpeg($imageUrl);

			        switch($exif['Orientation']) 
			                {
			        case 8:
			            $image = imagerotate($image,90,0);
			            break;
			        case 3:
			            $image = imagerotate($image,180,0);
			            break;
			        case 6:
			            $image = imagerotate($image,-90,0);
			            break;
			        }
			            imagejpeg($image, $imageUrl);
			    }
			} 	*/

        	$json = array('id' => $nama, 'imageUrl'=>$imageUrl);
			
       		echo json_encode($json);
        }
	}

	function remove_foto(){
		if(!$this->input->is_ajax_request()){
			show_404();
		}

		if(file_exists($file=FCPATH.'/userdata/photos/'.$this->session->userdata('img'))){
				unlink($file);
				echo 'sukses';
			}
			$this->session->unset_userdata('img');

		echo "SUKSES";
	}


}
?>