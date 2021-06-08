<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_tidakmampu extends Frontend_Controller{
    
    private $_table = 'form_tidakmampu';
    private $_folder = 'form';
    private $_folderUpload = 'form_tidakmampu';
    private $_docxName = 'form_tidakmampu';
    private $_mainTitle = 'Form Keterangan Tidak Mampu';  
    private $_fileName = 'form_tidakmampu';
   
    
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
            ['field' => 'nik_orangtua', 'label' => 'NIK_ORANGTUA', 'rules' => 'required'],
            ['field' => 'nama_orangtua', 'label' => 'NAMA_ORANGTUA', 'rules' => 'required'],
            ['field' => 'tempat_lahir_orangtua', 'label' => 'TEMPAT_LAHIR_ORANGTUA', 'rules' => 'required'],
            ['field' => 'tanggal_lahir_orangtua', 'label' => 'TANGGAL_LAHIR_ORANGTUA', 'rules' => 'required'],
            ['field' => 'kewarganegaraan_orangtua', 'label' => 'KEWARGANEGARAAN_ORANGTUA', 'rules' => 'required'],
            ['field' => 'agama_orangtua', 'label' => 'AGAMA_ORANGTUA', 'rules' => 'required'],
            ['field' => 'pekerjaan_orangtua', 'label' => 'PEKERJAAN_ORANGTUA', 'rules' => 'required'],
            ['field' => 'nik_anak', 'label' => 'NIK_ANAK', 'rules' => 'required'],
            ['field' => 'nama_anak', 'label' => 'NAMA_ANAK', 'rules' => 'required'],
            ['field' => 'tempat_lahir_anak', 'label' => 'TEMPAT_LAHIR_ANAK', 'rules' => 'required'],
            ['field' => 'tanggal_lahir_anak', 'label' => 'TANGGAL_LAHIR_ANAK', 'rules' => 'required'],
            ['field' => 'kewarganegaraan_anak', 'label' => 'KEWARGANEGARAAN_ANAK', 'rules' => 'required'],
            ['field' => 'agama_anak', 'label' => 'AGAMA_ANAK', 'rules' => 'required'],
            ['field' => 'pekerjaan_anak', 'label' => 'PEKERJAAN_ANAK', 'rules' => 'required'],
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
            $nik = $_POST['nik_orangtua'];
            if(!empty($_FILES["file_ktp"]["name"])){
                $upload_path = "./uploads/".$this->_folderUpload."/"; //lokasi upload
                $file_name = 'ktp_'.$nik.'_'.date('YmdHis').'_'.uniqid();
                $berkas_tmp = $this->upload_file('file_ktp',$upload_path,$file_name);
                if(!$berkas_tmp){
                    echo $this->upload->display_errors();
                    $callback = array(
                        'status' => 'error',
                        'message' => 'Mohon Maaf, file ktp gagal diupload',
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
                    echo $this->upload->display_errors();
                    $callback = array(
                        'status' => 'error',
                        'message' => 'Mohon Maaf, file kk gagal diupload',
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
                'nik_orangtua' => $_POST['nik_orangtua'],
                'nama_orangtua' => $_POST['nama_orangtua'],
                'tempat_lahir_orangtua' => $_POST['tempat_lahir_orangtua'],
                'tanggal_lahir_orangtua' => $_POST['tanggal_lahir_orangtua'],
                'kewarganegaraan_orangtua' => $_POST['kewarganegaraan_orangtua'],
                'agama_orangtua' => $_POST['agama_orangtua'],
                'pekerjaan_orangtua' => $_POST['pekerjaan_orangtua'],
                'nik_anak' => $_POST['nik_anak'],
                'nama_anak' => $_POST['nama_anak'],
                'tempat_lahir_anak' => $_POST['tempat_lahir_anak'],
                'tanggal_lahir_anak' => $_POST['tanggal_lahir_anak'],
                'kewarganegaraan_anak' => $_POST['kewarganegaraan_anak'],
                'agama_anak' => $_POST['agama_anak'],
                'pekerjaan_anak' => $_POST['pekerjaan_anak'],
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