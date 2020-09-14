<?php

class Login_M extends MY_Model
{
    private $_table = 'users';

    function __construct(){
		  parent::__construct();
    }
    
    public function store(){
        $_POST = $this->input->post();
        $data['username'] = $_POST['username'];
        $data['password'] = $_POST['password'];
        $where = array(
            'username' => $_POST['username'],
            'password' => $_POST['password'],
        );
        //$status = $this->db->insert($this->_table,$data) ? true:false;
        $result = $this->db->get_where('users',$where);
        $check = $result->num_rows();
        if($check > 0){
            //echo $check;
            $result = $result->row();
            //echo $result->role;
            $session = array(
                'uid' => $result->id,
                'username'  => $result->username,
                'role' => $result->role,
                'login' => TRUE
            );
        
            $this->session->set_userdata($session);
            $status = true;
        }
        else{
            $status = false;
        }

        return $status;
        
    }
}
