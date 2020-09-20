<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_tatin extends Frontend_Controller{
    
    private $_table = 'form_tatin';
    private $_folder = 'form';
    private $_docxName = 'form_tatin';
    private $_mainTitle = 'Form TATIN';  
    private $_fileName = 'form_tatin';
   
    
    function __construct()
	{
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Main_m');
        
    }    
    

    function rulesStore(){
        return [
            ['field' => 'nik_p', 'label' => 'NIK_P', 'rules' => 'required'],
            ['field' => 'nama_p', 'label' => 'NAMA_P', 'rules' => 'required'],
            ['field' => 'tempat_lahir_p', 'label' => 'TEMPAT_LAHIR_P', 'rules' => 'required'],
            ['field' => 'tanggal_lahir_p', 'label' => 'TANGGAL_LAHIR_P', 'rules' => 'required'],
            ['field' => 'binbinti_p', 'label' => 'BINBINTI_P', 'rules' => 'required'],
            ['field' => 'pekerjaan_p', 'label' => 'PEKERJAAN_P', 'rules' => 'required'],
            ['field' => 'alamat_p', 'label' => 'ALAMAT_P', 'rules' => 'required'],
            ['field' => 'rt_p', 'label' => 'RT_P', 'rules' => 'required'],
            ['field' => 'rw_p', 'label' => 'RW_P', 'rules' => 'required'],
            ['field' => 'pekon_p', 'label' => 'PEKON_P', 'rules' => 'required'],
            ['field' => 'kecamatan_p', 'label' => 'KECAMATAN_P', 'rules' => 'required'],
            ['field' => 'kabupaten_p', 'label' => 'KABUPATEN_P', 'rules' => 'required'],
            ['field' => 'nik_l', 'label' => 'NIK_L', 'rules' => 'required'],
            ['field' => 'nama_l', 'label' => 'NAMA_L', 'rules' => 'required'],
            ['field' => 'tempat_lahir_l', 'label' => 'TEMPAT_LAHIR_L', 'rules' => 'required'],
            ['field' => 'tanggal_lahir_l', 'label' => 'TANGGAL_LAHIR_L', 'rules' => 'required'],
            ['field' => 'binbinti_l', 'label' => 'BINBINTI_L', 'rules' => 'required'],
            ['field' => 'pekerjaan_l', 'label' => 'PEKERJAAN_L', 'rules' => 'required'],
            ['field' => 'alamat_l', 'label' => 'ALAMAT_L', 'rules' => 'required'],
            ['field' => 'rt_l', 'label' => 'RT_L', 'rules' => 'required'],
            ['field' => 'rw_l', 'label' => 'RW_L', 'rules' => 'required'],
            ['field' => 'pekon_l', 'label' => 'PEKON_L', 'rules' => 'required'],
            ['field' => 'kecamatan_l', 'label' => 'KECAMATAN_L', 'rules' => 'required'],
            ['field' => 'kabupaten_l', 'label' => 'KABUPATEN_L', 'rules' => 'required'],            
            
            
        ];
    }

    function index(){

        $data = array(
            "jumbotron" => "",
            "title" => $this->_mainTitle,
            "filename" => $this->_fileName,
        );

        $this->load->view('frontend/partials/header');
        $this->load->view('frontend/partials/content_navbar');
        $this->load->view('frontend/partials/content_jumbotron',$data);
        $this->load->view('frontend/'.$this->_folder.'/'.$this->_fileName);
        $this->load->view('frontend/partials/content_footer');
        $this->load->view('frontend/partials/footer');
    }


    //ACTION
    public function store(){
        $validation = $this->form_validation;
        $validation->set_rules($this->rulesStore());
        if($validation->run()){
            $_POST = $this->input->post();
            $data = array(
                'nik_p' => $_POST['nik_p'],
                'nama_p' => $_POST['nama_p'],
                'tempat_lahir_p' => $_POST['tempat_lahir_p'],
                'tanggal_lahir_p' => $_POST['tanggal_lahir_p'],
                'binbinti_p' => $_POST['binbinti_p'],
                'pekerjaan_p' => $_POST['pekerjaan_p'],
                'alamat_p' => $_POST['alamat_p'],
                'rt_p' => $_POST['rt_p'],
                'rw_p' => $_POST['rw_p'],
                'pekon_p' => $_POST['pekon_p'],
                'kecamatan_p' => $_POST['kecamatan_p'],
                'kabupaten_p' => $_POST['kabupaten_p'],
                'nik_l' => $_POST['nik_l'],
                'nama_l' => $_POST['nama_l'],
                'tempat_lahir_l' => $_POST['tempat_lahir_l'],
                'tanggal_lahir_l' => $_POST['tanggal_lahir_l'],
                'binbinti_l' => $_POST['binbinti_l'],
                'pekerjaan_l' => $_POST['pekerjaan_l'],
                'alamat_l' => $_POST['alamat_l'],
                'rt_l' => $_POST['rt_l'],
                'rw_l' => $_POST['rw_l'],
                'pekon_l' => $_POST['pekon_l'],
                'kecamatan_l' => $_POST['kecamatan_l'],
                'kabupaten_l' => $_POST['kabupaten_l'],                            
                'created_at' => date('Y-m-d H:i:s'),
            );
            if($this->Main_m->store($data,$this->_table)){
                $this->session->set_flashdata('success_message', 'Pengisian form berhasil, terimakasih');
                $callback = array(
                    'status' => 'success',
                    'message' => 'Data berhasil diinput',
                    'redirect' => base_url($this->_fileName),
                );
            }
            else{
                //$this->session->set_flashdata('error_message', 'Mohon maaf, pengisian form gagal');
                $callback = array(
                    'status' => 'error',
                    'message' => 'Mohon Maaf, Pengisian form gagal',
                );
            }
        }
        else{
            //$this->session->set_flashdata('error_message', validation_errors());
            $callback = array(
                'status' => 'error',
                'message' => validation_errors(),
            );
        }
        echo json_encode($callback);
    }

}