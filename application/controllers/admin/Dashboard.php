<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller{

    function __construct()
	{
        parent::__construct();
        $this->load->model('Main_m');
    }    
    
    function index(){

        #$data = $this->Main_m->countDataVerifForm('form_belummenikah')->result_array();
        #print_r($data);
/*
        $data = array(
            'form_ahliwaris' => array(
                "countdata" => $this->Main_m->countDataVerifForm('form_belummenikah')->result_array()
            ),
        );

        $data = array(
            'form_belummenikah' => array(
                "countdata" => $this->Main_m->countDataVerifForm('form_belummenikah')->result_array()
            ),
        );

        

        $data = array(
            'form_belummenikah' => array(
                "countdata" => $this->Main_m->countDataVerifForm('form_belummenikah')->result_array()
            ),
        );
        */

        $data['form_ahliwaris'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_ahliwaris')->result_array()
        );

        $data['form_belummenikah'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_belummenikah')->result_array()
        );
        
        $data['form_covid'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_covid')->result_array()
        );

        $data['form_jualbelihewan'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_jualbelihewan')->result_array()
        );

        $data['form_kehilanganbarang'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_kehilanganbarang')->result_array()
        );

        $data['form_kelahiran'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_kelahiran')->result_array()
        );

        $data['form_kematian'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_kematian')->result_array()
        );

        $data['form_ktpsementara'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_ktpsementara')->result_array()
        );

        $data['form_kuasa'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_kuasa')->result_array()
        );

        $data['form_pasjalan'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_pasjalan')->result_array()
        );

        $data['form_penghasilan'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_penghasilan')->result_array()
        );

        $data['form_pernyataannikah'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_pernyataannikah')->result_array()
        );

        $data['form_skck'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_skck')->result_array()
        );

        $data['form_statusperkawinan'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_statusperkawinan')->result_array()
        );

        $data['form_suamiistri'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_suamiistri')->result_array()
        );

        $data['form_tatin'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_tatin')->result_array()
        );

        $data['form_tidakmampu'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_tidakmampu')->result_array()
        );

        $data['form_usaha'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_usaha')->result_array()
        );

        $this->load->view('admin/partials/header');
        $this->load->view('admin/partials/content_sidebar');
        $this->load->view('admin/partials/content_navbar');
        $this->load->view('admin/dashboard/index',$data);
        $this->load->view('admin/partials/content_footer');
        $this->load->view('admin/partials/footer');
    }

}