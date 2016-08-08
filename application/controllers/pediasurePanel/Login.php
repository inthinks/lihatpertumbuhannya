<?php if(!defined("BASEPATH")) exit("Hack Attempt");
class Login extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('admin_logged_in')==true) redirect('pediasurePanel/home');
        $this->load->model('admin_model');
    }

    function index(){
        $this->data['content'] = 'pediasurePanel/login';
        $this->load->view('common/pediasurePanel/body', $this->data);
    }

    function do_login(){
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        if(!$username || !$password){
            $this->session->set_flashdata('notif','Invalid Username or Password');
            redirect('citiPanel/login');
        }
        else{
            $login = $this->admin_model->login($username, $password);
            if ($login != NULL) {
                $sess_admin = array (
                    'admin_logged_in' => true,
                    'admin_id' => $login['id'],
                    'admin_username' => $login['username']
                );
                $this->session->set_userdata($sess_admin);
                redirect ('pediasurePanel/home');
            }
            else {
                $this->session->set_flashdata('notif','Invalid Username or Password');
                redirect('pediasurePanel/login');
            }
        }
    }

}?>