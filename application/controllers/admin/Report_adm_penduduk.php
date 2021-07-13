<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class report_adm_penduduk extends Admin_Controller{

    private $_folder = 'report_adm_penduduk';
    private $_mainTitle = 'Report Administrasi Penduduk';

    function __construct()
	{
        parent::__construct();
        $this->load->model('Report_adm_penduduk_m');
        $this->load->library('breadcrumbcomponent'); 
    }    

    function index(){
        $this->breadcrumbcomponent->add('Home', base_url());
        $this->breadcrumbcomponent->add('Admin', base_url('admin'));  
        $this->breadcrumbcomponent->add($this->_mainTitle, base_url('admin/'.$this->_folder.'/'));
        
        $breadcrumb = $this->breadcrumbcomponent->output();
        $getData = $this->Report_adm_penduduk_m->getKk_KTP($this->_table,null);
        $data = array(
            'breadcrumb' => $breadcrumb,
            'data' => $getData->result(),
            'title' => $this->_mainTitle,
            'uri' => $this->uri->segment_array(),
            'folder' => $this->_folder,
            'total' => count($getData->result()),
        );

        $this->load->view('admin/partials/header');
        $this->load->view('admin/partials/content_sidebar');
        $this->load->view('admin/partials/content_navbar');
        $this->load->view('admin/'.$this->_folder.'/index',$data);
        $this->load->view('admin/partials/content_footer');
        $this->load->view('admin/partials/footer');
    }

   
}