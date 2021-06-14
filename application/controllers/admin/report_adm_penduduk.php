<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class report_adm_penduduk extends Admin_Controller{

    private $_folder = 'report_adm_penduduk';
    private $_mainTitle = 'Report Data Administrasi Penduduk';

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

    function index11(){

        $this->breadcrumbcomponent->add('Home', base_url());
        $this->breadcrumbcomponent->add('Admin', base_url('admin'));  
        $this->breadcrumbcomponent->add($this->_mainTitle, base_url('admin/'.$this->_folder.'/'));
        $breadcrumb = $this->breadcrumbcomponent->output();
        
        $formdata['buku_peraturan_desa'] = array(
            "countdata" => $this->Report_adm_umum_m->countDataVerifForm('buku_peraturan_desa')->result_array(),
            "form_name" => "Buku Peraturan Desa",
        );

        $formdata['buku_keputusan_kepala_desa'] = array(
            "countdata" => $this->Report_adm_umum_m->countDataVerifForm('buku_keputusan_kepala_desa')->result_array(),
            "form_name" => "Buku Keputusan Kepala Desa",
        );

        $formdata['buku_inventaris_kekayaan_desa'] = array(
            "countdata" => $this->Report_adm_umum_m->countDataVerifForm('buku_inventaris_kekayaan_desa')->result_array(),
            "form_name" => "Buku Inventaris Kekayaan Desa",
        );

        $formdata['buku_lemdes_berdes'] = array(
            "countdata" => $this->Report_adm_umum_m->countDataVerifForm('buku_lemdes_berdes')->result_array(),
            "form_name" => "Buku Lembaran Desa Dan Berita Desa",
        );

        $formdata['buku_aparat_pemerintah_desa'] = array(
            "countdata" => $this->Report_adm_umum_m->countDataVerifForm('buku_aparat_pemerintah_desa')->result_array(),
            "form_name" => "Buku Aparat Pemerintah Desa",
        );

        $formdata['buku_tnh_kas_desa'] = array(
            "countdata" => $this->Report_adm_umum_m->countDataVerifForm('buku_tnh_kas_desa')->result_array(),
            "form_name" => "Buku Tanah Kas Desa",
        );

        $formdata['buku_tnh_desa'] = array(
            "countdata" => $this->Report_adm_umum_m->countDataVerifForm('buku_tnh_desa')->result_array(),
            "form_name" => "Buku Tanah Di Desa",
        );

        $formdata['buku_agenda'] = array(
            "countdata" => $this->Report_adm_umum_m->countDataVerifForm('buku_agenda')->result_array(),
            "form_name" => "Buku Agenda",
        );

        $formdata['buku_ekspedisi'] = array(
            "countdata" => $this->Report_adm_umum_m->countDataVerifForm('buku_ekspedisi')->result_array(),
            "form_name" => "Buku Ekspedisi",
        );


        $data = array(
            
            'breadcrumb' => $breadcrumb,
            'data' => $this->Report_adm_umum_m->getReportAdm()->result(),
            'data_table' => $formdata,
            'title' => 'Report Administrasi Umum',
            'uri' => $this->uri->segment_array(),

        );

        
        $this->load->view('admin/partials/header');
        $this->load->view('admin/partials/content_sidebar');
        $this->load->view('admin/partials/content_navbar');
        $this->load->view('admin/report_adm_umum/index',$data);
        $this->load->view('admin/partials/content_footer');
        $this->load->view('admin/partials/footer');
        
    }

}