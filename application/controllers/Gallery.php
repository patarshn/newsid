<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends Frontend_Controller{

    function __construct()
	{
		parent::__construct();
    }    
    
    function index(){
        $jumbotron = array(
            'jumbotron' => base_url('assets/my/img/1.jpg'),
            'title' => 'Gallery'
        );

        $this->load->view('frontend/partials/header');
        $this->load->view('frontend/partials/content_navbar');
        $this->load->view('frontend/partials/content_jumbotron',$jumbotron);
        $this->load->view('frontend/gallery/index');
        $this->load->view('frontend/partials/content_footer');
        $this->load->view('frontend/partials/footer');
    }

}