<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Frontend_Controller{

    function __construct()
	{
		parent::__construct();
        $this->load->model('Carousel_m');
    }    
    
    function index(){

        $carousel = array(
            'carousel' => $this->Carousel_m->get(),
        );

        $this->load->view('frontend/partials/header');
        $this->load->view('frontend/partials/content_navbar');
        $this->load->view('frontend/partials/content_carousel',$carousel);
        //$this->load->view('frontend/home/index');
        $this->load->view('frontend/service/index');
        $this->load->view('frontend/partials/content_footer');
        $this->load->view('frontend/partials/footer');
    }

}