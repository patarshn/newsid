<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin:*');
class MY_Controller extends CI_Controller {
    public function __construct()
    {	
        parent::__construct();
        
        
    }

    public function notelp($notelp) {
        // kadang ada penulisan no hp 0811 239 345
        $notelp = str_replace(" ","",$notelp);
        // kadang ada penulisan no hp (0274) 778787
        $notelp = str_replace("(","",$notelp);
        // kadang ada penulisan no hp (0274) 778787
        $notelp = str_replace(")","",$notelp);
        // kadang ada penulisan no hp 0811.239.345
        $notelp = str_replace(".","",$notelp);
        // kadang ada penulisan no hp +6211239345
        $notelp = str_replace("+","",$notelp);
        $hp =  $notelp;
        // cek apakah no hp mengandung karakter + dan 0-9
        if(!preg_match('/[^0-9]/',trim($notelp))){
            // cek apakah no hp karakter 1-3 adalah +62
            if(substr(trim($notelp), 0, 2)=='62'){
                $hp = trim($notelp);
            }
            // cek apakah no hp karakter 1 adalah 0
            elseif(substr(trim($notelp), 0, 1)=='0'){
                $hp = '62'.substr(trim($notelp), 1);
            }
        }
        return $hp;
    }
}

class Frontend_Controller extends MY_Controller {
    public function __construct()
    {	
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function upload_file($inputname,$upload_path,$file_name){
        
        #$config['upload_path']      = "./uploads/".$this->_folder."/"; //lokasi
        $config['upload_path']      = $upload_path;
        $config['allowed_types']    = 'jpg|png|jpeg'; //file dizinka
        #$config['file_name']        = $this->_folder.uniqid();
        $config['file_name']        = $file_name;
        $config['overwrite']        = true;
        $config['max_size']         = 2000; // 2MB

        $this->load->library('upload',$config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload($inputname)) {
            return $this->upload->data("file_name");
        }
        else{
            return false;
        }    
    }

    public function destroy_file($id) {
        $berkas_id =  $this->Main_m->get($this->_table,$id)->result();  
        foreach ($berkas_id as $b_id) {
            
            if(empty($b_id->berkas)){
                return true;
            }

            if (!unlink(FCPATH."uploads/".$this->_folder."/".$b_id->berkas)) {
                return false;
            }
            
        }
        return true;
    }
}

class Backend_Controller extends MY_Controller {
    public function __construct()
    {	
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_message('required', 'field %s harus diisi');
        $this->load->helper('indonesia_date_helper');
        if($this->session->userdata('login') != TRUE){
            redirect(base_url());
        }
    }
}

class Admin_Controller extends Backend_Controller {
    public function __construct()
    {	
        parent::__construct();
        if($this->session->userdata('role') != 'admin'){
            redirect(base_url());
        }
    }
}


class RT_Controller extends Backend_Controller {
    public function __construct()
    {	
        parent::__construct();
        if($this->session->userdata('role') != 'rt'){
            redirect(base_url());
        }
    }
}


class RW_Controller extends Backend_Controller {
    public function __construct()
    {	
        parent::__construct();
        if($this->session->userdata('role') != 'rw'){
            redirect(base_url());
        }
    }
}