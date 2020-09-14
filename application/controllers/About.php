<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends Frontend_Controller{

    function __construct()
	{
		parent::__construct();
    }    
    
    function index(){

        $jumbotron = array(
            'jumbotron' => base_url('assets/my/img/1.jpg'),
            'title' => 'About'
        );

        $this->load->view('frontend/partials/header');
        $this->load->view('frontend/partials/content_navbar');
        $this->load->view('frontend/partials/content_jumbotron',$jumbotron);
        $this->load->view('frontend/about/index');
        $this->load->view('frontend/partials/content_footer');
        $this->load->view('frontend/partials/footer');
    }

}