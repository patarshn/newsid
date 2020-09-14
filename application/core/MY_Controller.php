<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    public function __construct()
    {	
        parent::__construct();
        
    }

    function printUri(){
        $segment = $this->uri->segment_array();
        $uri = base_url();
        $uriCount = count($segment);
        $i = 1;
        foreach ($segment as $s)
        {
          //echo $s;
          //echo '<br />';
          $uri = $uri.$s.'/';
          echo '<a href="'.$uri.'">'.ucfirst($s).'</a>';
          if($i != $uriCount){
            echo " » ";
          }
          $i++;
        }
      }
      
    public function print_uri(){
        $segment = $this->uri->segment_array();
        $uri = base_url();
        $uriCount = count($segment);
        $url = "";
        $i = 1;
        foreach ($segment as $s)
        {
          //echo $s;
          //echo '<br />';
          $uri = $uri.$s.'/';
          //echo '<a href="'.$uri.'">'.ucfirst($s).'</a>';
          $url = $url.'<a href="'.$uri.'">'.ucfirst($s).'</a>';
          if($i != $uriCount){
            //echo " » ";
            $url = $url." » ";
          }
          $i++;
        }
        return $url;
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
}

class Backend_Controller extends MY_Controller {
    public function __construct()
    {	
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        
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