<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller{

    function __construct()
	{
        parent::__construct();
        $this->load->model('Main_m');
    }    
    
    function index(){

        #$formdata = $this->Main_m->countDataVerifForm('form_belummenikah')->result_array();
        #print_r($formdata);
/*
        $formdata = array(
            'form_ahliwaris' => array(
                "countdata" => $this->Main_m->countDataVerifForm('form_belummenikah')->result_array()
            ),
        );

        $formdata = array(
            'form_belummenikah' => array(
                "countdata" => $this->Main_m->countDataVerifForm('form_belummenikah')->result_array()
            ),
        );

        

        $formdata = array(
            'form_belummenikah' => array(
                "countdata" => $this->Main_m->countDataVerifForm('form_belummenikah')->result_array()
            ),
        );
        */

        $formdata['form_ahliwaris'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_ahliwaris')->result_array(),
            "form_name" => "Form Ahli Waris",
        );

        $formdata['form_belummenikah'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_belummenikah')->result_array(),
            "form_name" => "Form Belum Menikah",
        );
        
        $formdata['form_covid'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_covid')->result_array(),
            "form_name" => "Form Covid",
        );

        $formdata['form_jualbelihewan'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_jualbelihewan')->result_array(),
            "form_name" => "Form Jual Beli Hewan",
        );

        $formdata['form_kehilanganbarang'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_kehilanganbarang')->result_array(),
            "form_name" => "Form Kehilangan Barang",
        );

        $formdata['form_kelahiran'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_kelahiran')->result_array(),
            "form_name" => "Form Kelahiran",
        );

        $formdata['form_kematian'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_kematian')->result_array(),
            "form_name" => "Form Kematian",
        );

        $formdata['form_ktpsementara'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_ktpsementara')->result_array(),
            "form_name" => "Form KTP Sementara",
        );

        $formdata['form_kuasa'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_kuasa')->result_array(),
            "form_name" => "Form Kuasa",
        );

        $formdata['form_pasjalan'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_pasjalan')->result_array(),
            "form_name" => "Form PAS Jalan",
        );

        $formdata['form_penghasilan'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_penghasilan')->result_array(),
            "form_name" => "Form Penghasilan",
        );

        $formdata['form_pernyataannikah'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_pernyataannikah')->result_array(),
            "form_name" => "Form Pernyataan Nikah",
        );

        $formdata['form_skck'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_skck')->result_array(),
            "form_name" => "Form SKCK",
        );

        $formdata['form_statusperkawinan'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_statusperkawinan')->result_array(),
            "form_name" => "Form Status Perkawinan",
        );

        $formdata['form_suamiistri'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_suamiistri')->result_array(),
            "form_name" => "Form Suami Istri",
        );

        $formdata['form_tatin'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_tatin')->result_array(),
            "form_name" => "Form Tatin",
        );

        $formdata['form_tidakmampu'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_tidakmampu')->result_array(),
            "form_name" => "Form Keterangan Tidak Mampu",
        );

        $formdata['form_usaha'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_usaha')->result_array(),
            "form_name" => "Form Usaha",
        );
        $data = array(
            'data' => $formdata,
        );
        $this->load->view('admin/partials/header');
        $this->load->view('admin/partials/content_sidebar');
        $this->load->view('admin/partials/content_navbar');
        $this->load->view('admin/dashboard/index',$data);
        $this->load->view('admin/partials/content_footer');
        $this->load->view('admin/partials/footer');
    }


    function index2(){

        #$formdata = $this->Main_m->countDataVerifForm('form_belummenikah')->result_array();
        #print_r($formdata);
/*
        $formdata = array(
            'form_ahliwaris' => array(
                "countdata" => $this->Main_m->countDataVerifForm('form_belummenikah')->result_array()
            ),
        );

        $formdata = array(
            'form_belummenikah' => array(
                "countdata" => $this->Main_m->countDataVerifForm('form_belummenikah')->result_array()
            ),
        );

        

        $formdata = array(
            'form_belummenikah' => array(
                "countdata" => $this->Main_m->countDataVerifForm('form_belummenikah')->result_array()
            ),
        );
        */

        $formdata['form_ahliwaris'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_ahliwaris')->result_array(),
            "form_name" => "Form Ahli Waris",
        );

        $formdata['form_belummenikah'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_belummenikah')->result_array(),
            "form_name" => "Form Belum Menikah",
        );
        
        $formdata['form_covid'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_covid')->result_array(),
            "form_name" => "Form Covid",
        );

        $formdata['form_jualbelihewan'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_jualbelihewan')->result_array(),
            "form_name" => "Form Jual Beli Hewan",
        );

        $formdata['form_kehilanganbarang'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_kehilanganbarang')->result_array(),
            "form_name" => "Form Kehilangan Barang",
        );

        $formdata['form_kelahiran'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_kelahiran')->result_array(),
            "form_name" => "Form Kelahiran",
        );

        $formdata['form_kematian'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_kematian')->result_array(),
            "form_name" => "Form Kematian",
        );

        $formdata['form_ktpsementara'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_ktpsementara')->result_array(),
            "form_name" => "Form KTP Sementara",
        );

        $formdata['form_kuasa'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_kuasa')->result_array(),
            "form_name" => "Form Kuasa",
        );

        $formdata['form_pasjalan'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_pasjalan')->result_array(),
            "form_name" => "Form PAS Jalan",
        );

        $formdata['form_penghasilan'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_penghasilan')->result_array(),
            "form_name" => "Form Penghasilan",
        );

        $formdata['form_pernyataannikah'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_pernyataannikah')->result_array(),
            "form_name" => "Form Pernyataan Nikah",
        );

        $formdata['form_skck'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_skck')->result_array(),
            "form_name" => "Form SKCK",
        );

        $formdata['form_statusperkawinan'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_statusperkawinan')->result_array(),
            "form_name" => "Form Status Perkawinan",
        );

        $formdata['form_suamiistri'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_suamiistri')->result_array(),
            "form_name" => "Form Suami Istri",
        );

        $formdata['form_tatin'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_tatin')->result_array(),
            "form_name" => "Form Tatin",
        );

        $formdata['form_tidakmampu'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_tidakmampu')->result_array(),
            "form_name" => "Form Keterangan Tidak Mampu",
        );

        $formdata['form_usaha'] = array(
            "countdata" => $this->Main_m->countDataVerifForm('form_usaha')->result_array(),
            "form_name" => "Form Usaha",
        );
        $data = array(
            'data' => $formdata,
        );
        $this->load->view('admin/partials/header');
        $this->load->view('admin/partials/content_sidebar');
        $this->load->view('admin/partials/content_navbar');
        $this->load->view('admin/dashboard/indexcardmodel',$data);
        $this->load->view('admin/partials/content_footer');
        $this->load->view('admin/partials/footer');
    }
}