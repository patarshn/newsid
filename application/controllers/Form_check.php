<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_check extends Frontend_Controller{
    
    private $_table = 'form_check';
    private $_folder = 'form';
    private $_docxName = 'form_check';
    private $_mainTitle = 'Form Check';  
    private $_fileName = 'form_check';
    
   
    
    function __construct()
	{
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Main_m');
        $_urlHome = base_url($this->_fileName);
    }    
    

    function index($id = null){

        $data = array(
            "jumbotron" => "",
            "title" => $this->_mainTitle,
            "filename" => $this->_fileName,
            'id' => $id,
        );

        $this->load->view('frontend/partials/header');
        $this->load->view('frontend/partials/content_navbar');
        $this->load->view('frontend/partials/content_jumbotron',$data);
        $this->load->view('frontend/'.$this->_folder.'/'.$this->_fileName);
        $this->load->view('frontend/partials/content_footer');
        $this->load->view('frontend/partials/footer');
    }

    function nik($id = null){

        $data = array(
            "jumbotron" => "",
            "title" => $this->_mainTitle,
            "filename" => $this->_fileName,
            'id' => $id,
        );
        $data = array(
            "jumbotron" => "",
            "title" => $this->_mainTitle,
            'data' => $this->Main_m->getReport($id)->result(),
            'id' => $id,

        );

        $this->load->view('frontend/partials/header');
        $this->load->view('frontend/partials/content_navbar');
        $this->load->view('frontend/partials/content_jumbotron',$data);
        $this->load->view('frontend/'.$this->_folder.'/'.$this->_fileName);
        $this->load->view('frontend/partials/content_footer');
        $this->load->view('frontend/partials/footer');
    }

}