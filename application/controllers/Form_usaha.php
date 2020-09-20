<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_usaha extends Frontend_Controller{
    
    private $_table = 'form_usaha';
    private $_folder = 'form';
    private $_docxName = 'form_usaha';
    private $_mainTitle = 'Form Keterangan Usaha';  
    private $_fileName = 'form_usaha';
   
    
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
            ['field' => 'nik', 'label' => 'NIK', 'rules' => 'required'],
            ['field' => 'nama', 'label' => 'NAMA', 'rules' => 'required'],
            ['field' => 'tempat_lahir', 'label' => 'TEMPAT_LAHIR', 'rules' => 'required'],
            ['field' => 'tanggal_lahir', 'label' => 'TANGGAL_LAHIR', 'rules' => 'required'],
            ['field' => 'jenis_kelamin', 'label' => 'JENIS_KELAMIN', 'rules' => 'required'],
            ['field' => 'kewarganegaraan', 'label' => 'KEWARGANEGARAAN', 'rules' => 'required'],
            ['field' => 'pekerjaan', 'label' => 'PEKERJAAN', 'rules' => 'required'],
            ['field' => 'alamat', 'label' => 'ALAMAT', 'rules' => 'required'],
            ['field' => 'rt', 'label' => 'RT', 'rules' => 'required'],
            ['field' => 'rw', 'label' => 'RW', 'rules' => 'required'],
            ['field' => 'pekon', 'label' => 'PEKON', 'rules' => 'required'],
            ['field' => 'kecamatan', 'label' => 'KECAMATAN', 'rules' => 'required'],
            ['field' => 'kabupaten', 'label' => 'KABUPATEN', 'rules' => 'required'],
            ['field' => 'nama_usaha', 'label' => 'NAMA_USAHA', 'rules' => 'required'],
            ['field' => 'alamat_usaha', 'label' => 'ALAMAT_USAHA', 'rules' => 'required'],
            ['field' => 'rt_usaha', 'label' => 'RT_USAHA', 'rules' => 'required'],
            ['field' => 'rw_usaha', 'label' => 'RW_USAHA', 'rules' => 'required'],
            ['field' => 'pekon_usaha', 'label' => 'PEKON_USAHA', 'rules' => 'required'],
            ['field' => 'kecamatan_usaha', 'label' => 'KECAMATAN_USAHA', 'rules' => 'required'],
            ['field' => 'kabupaten_usaha', 'label' => 'KABUPATEN_USAHA', 'rules' => 'required'],
            ['field' => 'persyaratan', 'label' => 'PERSYARATAN', 'rules' => 'required'],
            
            
            
            
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
                'nik' => $_POST['nik'],
                'nama' => $_POST['nama'],
                'tempat_lahir' => $_POST['tempat_lahir'],
                'tanggal_lahir' => $_POST['tanggal_lahir'],
                'jenis_kelamin' => $_POST['jenis_kelamin'],
                'kewarganegaraan' => $_POST['kewarganegaraan'],
                'pekerjaan' => $_POST['pekerjaan'],
                'alamat' => $_POST['alamat'],
                'rt' => $_POST['rt'],
                'rw' => $_POST['rw'],
                'pekon' => $_POST['pekon'],
                'kecamatan' => $_POST['kecamatan'],
                'kabupaten' => $_POST['kabupaten'],
                'nama_usaha' => $_POST['nama_usaha'],
                'alamat_usaha' => $_POST['alamat_usaha'],
                'rt_usaha' => $_POST['rt_usaha'],
                'rw_usaha' => $_POST['rw_usaha'],
                'pekon_usaha' => $_POST['pekon_usaha'],
                'kecamatan_usaha' => $_POST['kecamatan_usaha'],
                'kabupaten_usaha' => $_POST['kabupaten_usaha'],
                'persyaratan' => $_POST['persyaratan'],                                                             
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