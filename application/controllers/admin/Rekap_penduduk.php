<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap_penduduk extends Admin_Controller {

    private $_table = 'rekap_penduduk';
    private $_folder = 'rekap_penduduk';
    private $_mainTitle = 'Data Rekapitulasi Jumlah Penduduk';

    function __construct()
	{
        parent::__construct();
        $this->load->model('Main_m');
        $this->load->library('breadcrumbcomponent'); 
    }   
    
    function rulesStore() {
        return [
            ['field' => 'nik','label' => 'Nomor Induk Penduduk (NIK)', 'rules' => 'required'],
            ['field' => 'nama','label' => 'Nama Lengkap', 'rules' => 'required'],
            ['field' => 'jk','label' => 'Jenis Kelamin', 'rules' => 'required'],
            ['field' => 'tmpt_tgl_lahir','label' => 'Tempat dan Tanggal Lahir', 'rules' => 'required'],
            ['field' => 'kebangsaan','label' => 'Kebangsaan', 'rules' => 'required'],
            ['field' => 'keturunan','label' => 'Keturunan', 'rules' => 'required'],
            ['field' => 'pekerjaan','label' => 'Pekerjaan', 'rules' => 'required'],
            ['field' => 'datang_dari','label' => 'Datang Dari', 'rules' => 'required'],
            ['field' => 'maksud_tujuan','label' => 'Maksud dan Tujuan', 'rules' => 'required'],
            ['field' => 'nama_alamat_datang','label' => 'Nama dan Alamat yang Didatangi', 'rules' => 'required'],
            ['field' => 'tgl_datang','label' => 'Tanggal Kedatangan', 'rules' => 'required'],
            ['field' => 'tgl_pergi','label' => 'Tanggal Kepergian', 'rules' => 'required'],
            ['field' => 'ket','label' => 'Keterangan', 'rules' => 'required'],
           ];
    } 
    
    function rulesUpdate(){
        return [
            ['field' => 'id','label' => 'id', 'rules' => 'required'],
            ['field' => 'nik','label' => 'Nomor Induk Penduduk (NIK)', 'rules' => 'required'],
            ['field' => 'nama','label' => 'Nama Lengkap', 'rules' => 'required'],
            ['field' => 'jk','label' => 'Jenis Kelamin', 'rules' => 'required'],
            ['field' => 'tmpt_tgl_lahir','label' => 'Tempat dan Tanggal Lahir', 'rules' => 'required'],
            ['field' => 'kebangsaan','label' => 'Kebangsaan', 'rules' => 'required'],
            ['field' => 'keturunan','label' => 'Keturunan', 'rules' => 'required'],
            ['field' => 'pekerjaan','label' => 'Pekerjaan', 'rules' => 'required'],
            ['field' => 'datang_dari','label' => 'Datang Dari', 'rules' => 'required'],
            ['field' => 'maksud_tujuan','label' => 'Maksud dan Tujuan', 'rules' => 'required'],
            ['field' => 'nama_alamat_datang','label' => 'Nama dan Alamat yang Didatangi', 'rules' => 'required'],
            ['field' => 'tgl_datang','label' => 'Tanggal Kedatangan', 'rules' => 'required'],
            ['field' => 'tgl_pergi','label' => 'Tanggal Kepergian', 'rules' => 'required'],
            ['field' => 'ket','label' => 'Keterangan', 'rules' => 'required'],
           ];
    }

    function rulesDestroy(){
        return [
            ['field' => 'rowdelete[]',
            'label' => 'rowdelete',
            'rules' => 'required']
        ];
    }

    function index(){
            
            $this->breadcrumbcomponent->add('Home', base_url());
            $this->breadcrumbcomponent->add('Admin', base_url('admin'));  
            $this->breadcrumbcomponent->add($this->_mainTitle, base_url('admin/'.$this->_folder.'/'));

            $breadcrumb = $this->breadcrumbcomponent->output();
            $data = array(
                'breadcrumb' => $breadcrumb,
                'data' => $this->Main_m->get($this->_table,null)->result(),
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

    function detail($id){
        
        $this->breadcrumbcomponent->add('Home', base_url());
        $this->breadcrumbcomponent->add('Admin', base_url('admin')); 
        $this->breadcrumbcomponent->add($this->_mainTitle, base_url('admin/'.$this->_folder.'/')); 
        $this->breadcrumbcomponent->add('Detail', base_url('admin/'.$this->_folder.'/detail/'));
        $this->breadcrumbcomponent->add($id, base_url('admin/'.$this->_folder.'/detail/'.$id));

        $breadcrumb = $this->breadcrumbcomponent->output();
        $where = ['id'=>$id];
        $data = array(
            'breadcrumb' => $breadcrumb,
            'data' => $this->Main_m->get($this->_table,$where)->result(),
            'title' => "Detail ".$this->_mainTitle,
            'uri' => $this->uri->segment_array(),
            'folder' => $this->_folder,
        );

        $this->load->view('admin/partials/header');
        $this->load->view('admin/partials/content_sidebar');
        $this->load->view('admin/partials/content_navbar');
        $this->load->view('admin/'.$this->_folder.'/detail',$data);
        $this->load->view('admin/partials/content_footer');
        $this->load->view('admin/partials/footer');
    }

    function add(){
        
        $this->breadcrumbcomponent->add('Home', base_url());
        $this->breadcrumbcomponent->add('Admin', base_url('admin')); 
        $this->breadcrumbcomponent->add($this->_mainTitle, base_url('admin/'.$this->_folder.'/')); 
        $this->breadcrumbcomponent->add('Add', base_url('admin/'.$this->_folder.'/add'));

        $breadcrumb = $this->breadcrumbcomponent->output();
        $data = array(
            'breadcrumb' => $breadcrumb,
            'title' => "Tambah Data ".$this->_mainTitle,
            'uri' => $this->uri->segment_array(),
            'folder' => $this->_folder,
        );

        $this->load->view('admin/partials/header');
        $this->load->view('admin/partials/content_sidebar');
        $this->load->view('admin/partials/content_navbar');
        $this->load->view('admin/'.$this->_folder.'/add',$data);
        $this->load->view('admin/partials/content_footer');
        $this->load->view('admin/partials/footer');
    }

   



}