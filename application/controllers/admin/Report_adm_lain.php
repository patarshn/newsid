<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_adm_lain extends Admin_Controller{

    private $_folder = 'report_adm_lain';
    private $_mainTitle = 'Report Administasi Lainnya';

    function __construct()
    {
        parent::__construct();
        $this->load->model('Report_adm_lain_m');        
        $this->load->library('breadcrumbcomponent'); 
    }    

    function index(){

        $this->breadcrumbcomponent->add('Home', base_url());
        $this->breadcrumbcomponent->add('Admin', base_url('admin'));  
        $this->breadcrumbcomponent->add($this->_mainTitle, base_url('admin/'.$this->_folder.'/'));
        $breadcrumb = $this->breadcrumbcomponent->output();
        
        $formdata['buku_agenda_surat_keluar'] = array(
            "countdata" => $this->Report_adm_lain_m->countDataVerifForm('buku_agenda_surat_keluar')->result_array(),
            "form_name" => "Buku Agenda Surat Keluar BPD",
        );

        $formdata['buku_agenda_surat_masuk'] = array(
            "countdata" => $this->Report_adm_lain_m->countDataVerifForm('buku_agenda_surat_masuk')->result_array(),
            "form_name" => "Buku Agenda Surat Masuk BPD",
        );

        $formdata['buku_ekspedisi_bpd'] = array(
            "countdata" => $this->Report_adm_lain_m->countDataVerifForm('buku_ekspedisi_bpd')->result_array(),
            "form_name" => "Buku Ekspedisi BPD",
        );

        $formdata['buku_data_inventaris_bpd'] = array(
            "countdata" => $this->Report_adm_lain_m->countDataVerifForm('buku_data_inventaris_bpd')->result_array(),
            "form_name" => "Buku Data Inventaris BPD",
        );

        $formdata['buku_laporan_keuangan'] = array(
            "countdata" => $this->Report_adm_lain_m->countDataVerifForm('buku_laporan_keuangan')->result_array(),
            "form_name" => "Buku Laporan Keuangan BPD",
        );

        $formdata['buku_data_anggota_bpd'] = array(
            "countdata" => $this->Report_adm_lain_m->countDataVerifForm('buku_data_anggota_bpd')->result_array(),
            "form_name" => "Buku Data Anggota BPD",
        );

        $formdata['buku_data_kegiatan'] = array(
            "countdata" => $this->Report_adm_lain_m->countDataVerifForm('buku_data_kegiatan')->result_array(),
            "form_name" => "Buku Data Kegiatan BPD",
        );

        $formdata['buku_data_aspirasi_masyarakat'] = array(
            "countdata" => $this->Report_adm_lain_m->countDataVerifForm('buku_data_aspirasi_masyarakat')->result_array(),
            "form_name" => "Buku Data Aspirasi Masyarakat",
        );

        $formdata['buku_data_peraturan_bpd'] = array(
            "countdata" => $this->Report_adm_lain_m->countDataVerifForm('buku_data_peraturan_bpd')->result_array(),
            "form_name" => "Buku Data Peraturan/Keputusan BPD",
        );

        $formdata['buku_data_peraturan_desa'] = array(
            "countdata" => $this->Report_adm_lain_m->countDataVerifForm('buku_data_peraturan_desa')->result_array(),
            "form_name" => "Buku Data Peraturan Desa",
        );

        $formdata['buku_keputusan_musyawarah'] = array(
            "countdata" => $this->Report_adm_lain_m->countDataVerifForm('buku_keputusan_musyawarah')->result_array(),
            "form_name" => "Buku Keputusan Musyawarah Desa",
        );

        $formdata['buku_keputusan_ppd'] = array(
            "countdata" => $this->Report_adm_lain_m->countDataVerifForm('buku_keputusan_ppd')->result_array(),
            "form_name" => "Buku Keputusan Perencanaan Pembangunan Desa",
        );

        $formdata['buku_rapat_bpd'] = array(
            "countdata" => $this->Report_adm_lain_m->countDataVerifForm('buku_rapat_bpd')->result_array(),
            "form_name" => "Buku Rapat BPD",
        );


        $data = array(
            
            'breadcrumb' => $breadcrumb,
            'data' => $this->Report_adm_lain_m->getReportAdm()->result(),
            'data_table' => $formdata,
            'title' => 'Report Administrasi Lainnya',
            'uri' => $this->uri->segment_array(),

        );

        
        $this->load->view('admin/partials/header');
        $this->load->view('admin/partials/content_sidebar');
        $this->load->view('admin/partials/content_navbar');
        $this->load->view('admin/report_adm_lain/index',$data);
        $this->load->view('admin/partials/content_footer');
        $this->load->view('admin/partials/footer');
        
    }
}