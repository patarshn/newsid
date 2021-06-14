<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_domisili extends Frontend_Controller{
    
    private $_table = 'form_domisili';
    private $_folder = 'form';
    private $_folderUpload = 'form_domisili';
    private $_docxName = 'form_domisili';
    private $_mainTitle = 'Form Domisili';  
    private $_fileName = 'form_domisili';
    
   
    
    function __construct()
	{
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Main_m');
        $_urlHome = base_url($this->_fileName);
    }    
    

    function rulesStore(){
        return [
            ['field' => 'nik', 'label' => 'NIK', 'rules' => 'required'],
            ['field' => 'nama', 'label' => 'NAMA', 'rules' => 'required'],
            ['field' => 'tempat_lahir', 'label' => 'TEMPAT LAHIR', 'rules' => 'required'],
            ['field' => 'tanggal_lahir', 'label' => 'TANGGAL LAHIR', 'rules' => 'required'],
            ['field' => 'kewarganegaraan', 'label' => 'KEWARGANEGARAAN', 'rules' => 'required'],
            ['field' => 'agama', 'label' => 'AGAMA', 'rules' => 'required'],
            ['field' => 'alamat', 'label' => 'ALAMAT', 'rules' => 'required'],
            ['field' => 'rt', 'label' => 'RT', 'rules' => 'required'],
            ['field' => 'rw', 'label' => 'RW', 'rules' => 'required'],
            ['field' => 'pekon', 'label' => 'PEKON', 'rules' => 'required'],
            ['field' => 'kecamatan', 'label' => 'KECAMATAN', 'rules' => 'required'],
            ['field' => 'kabupaten', 'label' => 'KABUPATEN', 'rules' => 'required'],
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
            $nik = $_POST['nik'];
            if(!empty($_FILES["file_ktp"]["name"])){
                $upload_path = "./uploads/".$this->_folderUpload."/"; //lokasi upload
                $file_name = 'ktp_'.$nik.'_'.date('YmdHis').'_'.uniqid();
                $berkas_tmp = $this->upload_file('file_ktp',$upload_path,$file_name);
                if(!$berkas_tmp){
                    #echo $this->upload->display_errors();
                    $callback = array(
                        'status' => 'error',
                        'message' => 'Mohon Maaf, file ktp gagal diupload'. $this->upload->display_errors(),
                    );
                    echo json_encode($callback);
                    exit;
                }
                $berkas['file_ktp'] = $berkas_tmp;
            }
            else{
                $berkas['file_ktp'] = "";
            }
            

            if(!empty($_FILES["file_kk"]["name"])){
                $upload_path = "./uploads/".$this->_folderUpload."/"; //lokasi upload
                $file_name = 'ktp_'.$nik.'_'.date('YmdHis').'_'.uniqid();
                $berkas_tmp = $this->upload_file('file_kk',$upload_path,$file_name);
                if(!$berkas_tmp){
                    #echo $this->upload->display_errors();
                    $callback = array(
                        'status' => 'error',
                        'message' => 'Mohon Maaf, file ktp gagal diupload'. $this->upload->display_errors(),
                    );
                    echo json_encode($callback);
                    exit;
                }
                $berkas['file_kk'] = $berkas_tmp;
            }
            else{
                $berkas['file_kk'] = "";
            }

            $data = array(
                'nik' => $_POST['nik'],
                'nama' => $_POST['nama'],
                'tempat_lahir' => $_POST['tempat_lahir'],
                'tanggal_lahir' => $_POST['tanggal_lahir'],
                'kewarganegaraan' => $_POST['kewarganegaraan'],
                'agama' => $_POST['agama'],
                'status_perkawinan' => $_POST['status_perkawinan'],
                'pekerjaan' => $_POST['pekerjaan'],
                'alamat' => $_POST['alamat'],
                'rt' => $_POST['rt'],
                'rw' => $_POST['rw'],
                'pekon' => $_POST['pekon'],
                'kecamatan' => $_POST['kecamatan'],
                'kabupaten' => $_POST['kabupaten'],
                'persyaratan' => $_POST['persyaratan'],
                'created_at' => date('Y-m-d H:i:s'),
                'berkas' => json_encode($berkas),
                'notelp' => $this->notelp($_POST['notelp'])
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