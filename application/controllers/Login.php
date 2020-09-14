<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Frontend_Controller{

    function __construct()
	{
        parent::__construct();
        $this->load->model('Login_M');
    }    
    
    function rulesLogin(){
        return[
            
            ['field' => 'username',
            'label' => 'Username',
            'rules' => 'required'],
            
            ['field' => 'password',
            'label' => 'Password',
            'rules' => 'required'],
        ];
    }

    function isLogin(){
        if($this->session->userdata('login') == TRUE){
            if($this->session->userdata('role') == 'admin'){
                redirect(base_url('admin'));
            }
            else if($this->session->userdata('role') == 'rt'){
                redirect(base_url('rt'));
            }
            else if($this->session->userdata('role') == 'rw'){
                redirect(base_url('rw'));
            }
            return true;
        }
        return false;
    }

    function index(){
        $this->isLogin();
        $this->load->view('login');
    }

    function login(){
        if($this->isLogin()){
            return ;
        }
        $validation = $this->form_validation;
        $validation->set_rules($this->rulesLogin());
        if($validation->run()){
            if($this->Login_M->store()){
                $this->session->set_flashdata('success_message', 'Berhasil masuk, terimakasih');
                $callback = array(
                    'status' => 'success',
                    'message' => 'Login Success',
                    'redirect' => base_url('login'),
                );
            }
            else{
                //$this->session->set_flashdata('error_message', 'Mohon maaf, pengisian form gagal');
                $callback = array(
                    'status' => 'error',
                    'message' => 'Login Fail',
                );
            }
        }
        else{
            //$this->session->set_flashdata('error_message', validation_errors());
            $callback = array(
                'status' => 'error',
                'message' => validation_errors(),
            );

            
        }
        redirect(base_url('login'));
        
    }


}