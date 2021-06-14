<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_tm_jampersal extends Frontend_Controller{
    
    private $_table = 'form_tm_jampersal';
    private $_folder = 'form';
    private $_folderUpload = 'form_tm_jampersal';
    private $_docxName = 'form_tm_jampersal';
    private $_mainTitle = 'Form Jaminan Persasilan';  
    private $_fileName = 'form_tm_jampersal';
   
    
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
            ['field' => 'nik_l', 'label' => 'NIK_L', 'rules' => 'required'],
            ['field' => 'nama_l', 'label' => 'NAMA_L', 'rules' => 'required'],
            ['field' => 'tempat_lahir_l', 'label' => 'TEMPAT_LAHIR_L', 'rules' => 'required'],
            ['field' => 'tanggal_lahir_l', 'label' => 'TANGGAL_LAHIR_L', 'rules' => 'required'],
            ['field' => 'agama_l', 'label' => 'AGAMA_L', 'rules' => 'required'],
            ['field' => 'pekerjaan_l', 'label' => 'PEKERJAAN_L', 'rules' => 'required'],
            ['field' => 'alamat_l', 'label' => 'ALAMAT_L', 'rules' => 'required'],
            ['field' => 'rt_l', 'label' => 'RT_L', 'rules' => 'required'],
            ['field' => 'rw_l', 'label' => 'RW_L', 'rules' => 'required'],
            ['field' => 'pekon_l', 'label' => 'PEKON_L', 'rules' => 'required'],
            ['field' => 'kecamatan_l', 'label' => 'KECAMATAN_L', 'rules' => 'required'],
            ['field' => 'kabupaten_l', 'label' => 'KABUPATEN_L', 'rules' => 'required'],
            ['field' => 'nik_p', 'label' => 'NIK_P', 'rules' => 'required'],
            ['field' => 'nama_p', 'label' => 'NAMA_P', 'rules' => 'required'],
            ['field' => 'tempat_lahir_p', 'label' => 'TEMPAT_LAHIR_P', 'rules' => 'required'],
            ['field' => 'tanggal_lahir_p', 'label' => 'TANGGAL_LAHIR_P', 'rules' => 'required'],
            ['field' => 'agama_p', 'label' => 'AGAMA_P', 'rules' => 'required'],
            ['field' => 'pekerjaan_p', 'label' => 'PEKERJAAN_P', 'rules' => 'required'],
            ['field' => 'alamat_p', 'label' => 'ALAMAT_P', 'rules' => 'required'],
            ['field' => 'rt_p', 'label' => 'RT_P', 'rules' => 'required'],
            ['field' => 'rw_p', 'label' => 'RW_P', 'rules' => 'required'],
            ['field' => 'pekon_p', 'label' => 'PEKON_P', 'rules' => 'required'],
            ['field' => 'kecamatan_p', 'label' => 'KECAMATAN_P', 'rules' => 'required'],
            ['field' => 'kabupaten_p', 'label' => 'KABUPATEN_P', 'rules' => 'required'],
            
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
            $nik = $_POST['nik_l'];
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
                'nik_l' => $_POST['nik_l'],
                'nama_l' => $_POST['nama_l'],
                'tempat_lahir_l' => $_POST['tempat_lahir_l'],
                'tanggal_lahir_l' => $_POST['tanggal_lahir_l'],
                'agama_l' => $_POST['agama_l'],
                'pekerjaan_l' => $_POST['pekerjaan_l'],
                'alamat_l' => $_POST['alamat_l'],
                'rt_l' => $_POST['rt_l'],
                'rw_l' => $_POST['rw_l'],
                'pekon_l' => $_POST['pekon_l'],
                'kecamatan_l' => $_POST['kecamatan_l'],
                'kabupaten_l' => $_POST['kabupaten_l'],
                'nik_p' => $_POST['nik_p'],
                'nama_p' => $_POST['nama_p'],
                'tempat_lahir_p' => $_POST['tempat_lahir_p'],
                'tanggal_lahir_p' => $_POST['tanggal_lahir_p'],
                'agama_p' => $_POST['agama_p'],
                'pekerjaan_p' => $_POST['pekerjaan_p'],
                'alamat_p' => $_POST['alamat_p'],
                'rt_p' => $_POST['rt_p'],
                'rw_p' => $_POST['rw_p'],
                'pekon_p' => $_POST['pekon_p'],
                'kecamatan_p' => $_POST['kecamatan_p'],
                'kabupaten_p' => $_POST['kabupaten_p'],
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