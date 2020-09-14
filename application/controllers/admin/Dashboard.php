<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller{

    function __construct()
	{
		parent::__construct();
    }    
    
    function index(){

        $this->load->view('admin/partials/header');
        $this->load->view('admin/partials/content_sidebar');
        $this->load->view('admin/partials/content_navbar');
        $this->load->view('admin/dashboard/index');
        $this->load->view('admin/partials/content_footer');
        $this->load->view('admin/partials/footer');
    }

}