<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_penghasilan extends Frontend_Controller{
    
    private $_table = 'form_penghasilan';
    private $_folder = 'form';
    private $_docxName = 'form_penghasilan';
    private $_mainTitle = 'Form KTP Sementara';  
    private $_fileName = 'form_penghasilan';
   
    
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
            ['field' => 'nik_anak', 'label' => 'NIK_ANAK', 'rules' => 'required'],
            ['field' => 'nama_anak', 'label' => 'NAMA_ANAK', 'rules' => 'required'],
            ['field' => 'tempat_lahir_anak', 'label' => 'TEMPAT_LAHIR_ANAK', 'rules' => 'required'],
            ['field' => 'tanggal_lahir_anak', 'label' => 'TANGGAL_LAHIR_ANAK', 'rules' => 'required'],
            ['field' => 'kewarganegaraan_anak', 'label' => 'KEWARGANEGARAAN_ANAK', 'rules' => 'required'],
            ['field' => 'nik_orangtua', 'label' => 'NIK_ORANGTUA', 'rules' => 'required'],
            ['field' => 'nama_orangtua', 'label' => 'NAMA_ORANGTUA', 'rules' => 'required'],
            ['field' => 'tempat_lahir_orangtua', 'label' => 'TEMPAT_LAHIR_ORANGTUA', 'rules' => 'required'],
            ['field' => 'tanggal_lahir_orangtua', 'label' => 'TANGGAL_LAHIR_ORANGTUA', 'rules' => 'required'],
            ['field' => 'pekerjaan_orangtua', 'label' => 'PEKERJAAN_ORANGTUA', 'rules' => 'required'],
            ['field' => 'penghasilan_orangtua', 'label' => 'PENGHASILAN_ORANGTUA', 'rules' => 'required'],
            ['field' => 'penghasilan_orangtua2', 'label' => 'PENGHASILAN_ORANGTUA2', 'rules' => 'required'],
            ['field' => 'alamat', 'label' => 'ALAMAT', 'rules' => 'required'],
            ['field' => 'rt', 'label' => 'RT', 'rules' => 'required'],
            ['field' => 'rw', 'label' => 'RW', 'rules' => 'required'],
            ['field' => 'pekon', 'label' => 'PEKON', 'rules' => 'required'],
            ['field' => 'kecamatan', 'label' => 'KECAMATAN', 'rules' => 'required'],
            ['field' => 'kabupaten', 'label' => 'KABUPATEN', 'rules' => 'required'],
            
            
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
                'nik_anak' => $_POST['nik_anak'],
                'nama_anak' => $_POST['nama_anak'],
                'tempat_lahir_anak' => $_POST['tempat_lahir_anak'],
                'tanggal_lahir_anak' => $_POST['tanggal_lahir_anak'],
                'kewarganegaraan_anak' => $_POST['kewarganegaraan_anak'],
                'nik_orangtua' => $_POST['nik_orangtua'],
                'nama_orangtua' => $_POST['nama_orangtua'],
                'tempat_lahir_orangtua' => $_POST['tempat_lahir_orangtua'],
                'tanggal_lahir_orangtua' => $_POST['tanggal_lahir_orangtua'],
                'pekerjaan_orangtua' => $_POST['pekerjaan_orangtua'],
                'penghasilan_orangtua' => $_POST['penghasilan_orangtua'],
                'penghasilan_orangtua2' => $_POST['penghasilan_orangtua2'],
                'alamat' => $_POST['alamat'],
                'rt' => $_POST['rt'],
                'rw' => $_POST['rw'],
                'pekon' => $_POST['pekon'],
                'kecamatan' => $_POST['kecamatan'],
                'kabupaten' => $_POST['kabupaten'],                
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