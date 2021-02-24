<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Auth extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('m_admin');
    }

    public function displayFormLogin(){
        $this->load->view('pages/auth/v_login');
    }

    public function displayFormRegister(){
        $this->load->view('pages/auth/v_register');
    }

    public function login(){
        $dataPost = array(
            'username'  =>  $this->input->post('username'),
            'password'  =>  md5($this->input->post('password'))
        );
        $data['admin'] = $this->m_admin->checkAcc($dataPost);
        if(is_null($data['admin'])){
            redirect('login');
        }

        $this->session->set_userdata('login_stat', TRUE);
        $this->session->set_userdata('username_admin', $data['admin']->username);

        redirect('c_berita/displayToAdmin');
    }

    public function logout(){
        $this->session->unset_userdata('login_stat'); 
        $this->session->unset_userdata('username_admin'); 
        $this->session->sess_destroy(); 
        redirect('login'); 
    }


}