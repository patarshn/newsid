<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_kematian extends Frontend_Controller{
    
    private $_table = 'form_kematian';
    private $_folder = 'form';
    private $_folderUpload = 'form_kematian';
    private $_docxName = 'form_kematian';
    private $_mainTitle = 'Form Keterangan Kematian';  
    private $_fileName = 'form_kematian';
   
    
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
            ['field' => 'nik', 'label' => 'NIK', 'rules' => 'required|numeric|min_length[16]|max_length[16]'],
            ['field' => 'nama', 'label' => 'Nama', 'rules' => 'required'],
            ['field' => 'usia', 'label' => 'Usia', 'rules' => 'required'],
            ['field' => 'agama', 'label' => 'Agama', 'rules' => 'required'],
            ['field' => 'alamat', 'label' => 'Alamat', 'rules' => 'required'],
            ['field' => 'rt', 'label' => 'RT', 'rules' => 'required|numeric'],
            ['field' => 'rw', 'label' => 'RW', 'rules' => 'required|numeric'],
            ['field' => 'pekon', 'label' => 'Pekon', 'rules' => 'required'],
            ['field' => 'kecamatan', 'label' => 'Kecamatan', 'rules' => 'required'],
            ['field' => 'kabupaten', 'label' => 'Kabupaten', 'rules' => 'required'],
            ['field' => 'tanggal_kematian', 'label' => 'Tanggal Kematian', 'rules' => 'required'],
            ['field' => 'tempat_kematian', 'label' => 'Tempat Kematian', 'rules' => 'required'],
            ['field' => 'waktu_kematian', 'label' => 'Waktu Kematian', 'rules' => 'required'],
            ['field' => 'penyebab_kematian', 'label' => 'Penyebab Kematian', 'rules' => 'required'],
            ['field' => 'tanggal_pemakaman', 'label' => 'Tanggal Pemakaman', 'rules' => 'required'],
            ['field' => 'waktu_pemakaman', 'label' => 'Waktu Pemakaman', 'rules' => 'required'],
            ['field' => 'tempat_pemakaman', 'label' => 'Tempat Pemakaman', 'rules' => 'required'],
            ['field' => 'notelp', 'label' => 'No Telp/WA', 'rules' => 'required|numeric'],
            
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
                $berkas_tmp = $this->upload_image('file_ktp',$upload_path,$file_name);
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
                $berkas_tmp = $this->upload_image('file_kk',$upload_path,$file_name);
                if(!$berkas_tmp){
                    echo $this->upload->display_errors();
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
                'usia' => $_POST['usia'],
                'agama' => $_POST['agama'],
                'alamat' => $_POST['alamat'],
                'rt' => $_POST['rt'],
                'rw' => $_POST['rw'],
                'pekon' => $_POST['pekon'],
                'kecamatan' => $_POST['kecamatan'],
                'kabupaten' => $_POST['kabupaten'],
                'tanggal_kematian' => $_POST['tanggal_kematian'],
                'tempat_kematian' => $_POST['tempat_kematian'],
                'waktu_kematian' => $_POST['waktu_kematian'],
                'penyebab_kematian' => $_POST['penyebab_kematian'],
                'tanggal_pemakaman' => $_POST['tanggal_pemakaman'],
                'waktu_pemakaman' => $_POST['waktu_pemakaman'],
                'tempat_pemakaman' => $_POST['tempat_pemakaman'],
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