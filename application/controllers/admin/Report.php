<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends Admin_Controller{

    private $_table = 'report';
    private $_folder = 'report';
    private $_docxName = 'report.docx';
    private $_mainTitle = 'Report';

    function __construct()
	{
        parent::__construct();
        $this->load->model('Main_m');        
        $this->load->library('breadcrumbcomponent'); 
    }    
    
    function index(){

        $this->breadcrumbcomponent->add('Home', base_url());
        $this->breadcrumbcomponent->add('Admin', base_url('admin'));  
        $this->breadcrumbcomponent->add($this->_mainTitle, base_url('admin/'.$this->_folder.'/'));
        $breadcrumb = $this->breadcrumbcomponent->output();
        $data = array(
            
            'breadcrumb' => $breadcrumb,
            'data' => $this->Main_m->getAllReport()->result(),
            'title' => 'Report',
            'uri' => $this->uri->segment_array(),

        );

        
        $this->load->view('admin/partials/header');
        $this->load->view('admin/partials/content_sidebar');
        $this->load->view('admin/partials/content_navbar');
        $this->load->view('admin/report/index',$data);
        $this->load->view('admin/partials/content_footer');
        $this->load->view('admin/partials/footer');
        
    }

}