<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_adm_pembangunan extends Admin_Controller{

    private $_folder = 'report_adm_pembangunan';
    private $_mainTitle = 'Report Administrasi Pembangunan';

    function __construct()
	{
        parent::__construct();
        $this->load->model('Report_adm_pembangunan_m');        
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
                'title' => $this->_mainTitle,
                'uri' => $this->uri->segment_array(),
                'folder' => $this->_folder,
            );

        
        $this->load->view('admin/partials/header');
        $this->load->view('admin/partials/content_sidebar');
        $this->load->view('admin/partials/content_navbar');
        $this->load->view('admin/'.$this->_folder.'/index',$data);
        $this->load->view('admin/partials/content_footer');
        $this->load->view('admin/partials/footer');
        
    }

}