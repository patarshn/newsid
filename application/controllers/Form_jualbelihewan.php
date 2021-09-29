<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_jualbelihewan extends Frontend_Controller{
    
    private $_table = 'form_jualbelihewan';
    private $_folder = 'form';
    private $_folderUpload = 'form_jualbelihewan';
    private $_docxName = 'form_jualbelihewan';
    private $_mainTitle = 'Form Jual Beli Hewan';  
    private $_fileName = 'form_jualbelihewan';
   
    
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
            ['field' => 'nik_1', 'label' => 'NIK Pembeli', 'rules' => 'required|numeric|min_length[16]|max_length[16]'],
            ['field' => 'nama_1', 'label' => 'Nama Pembeli', 'rules' => 'required'],
            ['field' => 'tempat_lahir_1', 'label' => 'Tempat Lahir Pembeli', 'rules' => 'required'],
            ['field' => 'tanggal_lahir_1', 'label' => 'Tanggal Lahir Pembeli', 'rules' => 'required'],
            ['field' => 'pekerjaan_1', 'label' => 'Pekerjaan Pembeli', 'rules' => 'required'],
            ['field' => 'alamat_1', 'label' => 'Alamat Pembeli', 'rules' => 'required'],
            ['field' => 'rt_1', 'label' => 'RT Pembeli', 'rules' => 'required|numeric'],
            ['field' => 'rw_1', 'label' => 'RW Pembeli', 'rules' => 'required|numeric'],
            ['field' => 'pekon_1', 'label' => 'Pekon Pembeli', 'rules' => 'required'],
            ['field' => 'kecamatan_1', 'label' => 'Kecamatan Pembeli', 'rules' => 'required'],
            ['field' => 'kabupaten_1', 'label' => 'Kabupaten Pembeli', 'rules' => 'required'],
            ['field' => 'nik_2', 'label' => 'NIK Penjual', 'rules' => 'required|numeric|min_length[16]|max_length[16]'],
            ['field' => 'nama_2', 'label' => 'Nama Penjual', 'rules' => 'required'],
            ['field' => 'tempat_lahir_2', 'label' => 'Tempat Lahir Penjual', 'rules' => 'required'],
            ['field' => 'tanggal_lahir_2', 'label' => 'Tanggal Lahir Penjual', 'rules' => 'required'],
            ['field' => 'pekerjaan_2', 'label' => 'Pekerjaan Penjual', 'rules' => 'required'],
            ['field' => 'alamat_2', 'label' => 'Alamat Penjual', 'rules' => 'required'],
            ['field' => 'rt_2', 'label' => 'RT Penjual', 'rules' => 'required|numeric'],
            ['field' => 'rw_2', 'label' => 'RW Penjual', 'rules' => 'required|numeric'],
            ['field' => 'pekon_2', 'label' => 'Pekon Penjual', 'rules' => 'required'],
            ['field' => 'kecamatan_2', 'label' => 'Kecamatan Penjual', 'rules' => 'required'],
            ['field' => 'kabupaten_2', 'label' => 'Kabupaten Penjual', 'rules' => 'required'],
            ['field' => 'keterangan', 'label' => 'Keterangan', 'rules' => 'required'],
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
            $nik = $_POST['nik_1'];
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
                'nik_1' => $_POST['nik_1'],
                'nama_1' => $_POST['nama_1'],
                'tempat_lahir_1' => $_POST['tempat_lahir_1'],
                'tanggal_lahir_1' => $_POST['tanggal_lahir_1'],
                'pekerjaan_1' => $_POST['pekerjaan_1'],
                'alamat_1' => $_POST['alamat_1'],
                'rt_1' => $_POST['rt_1'],
                'rw_1' => $_POST['rw_1'],
                'pekon_1' => $_POST['pekon_1'],
                'kecamatan_1' => $_POST['kecamatan_1'],
                'kabupaten_1' => $_POST['kabupaten_1'],
                'nik_2' => $_POST['nik_2'],
                'nama_2' => $_POST['nama_2'],
                'tempat_lahir_2' => $_POST['tempat_lahir_2'],
                'tanggal_lahir_2' => $_POST['tanggal_lahir_2'],
                'pekerjaan_2' => $_POST['pekerjaan_2'],
                'alamat_2' => $_POST['alamat_2'],
                'rt_2' => $_POST['rt_2'],
                'rw_2' => $_POST['rw_2'],
                'pekon_2' => $_POST['pekon_2'],
                'kecamatan_2' => $_POST['kecamatan_2'],
                'kabupaten_2' => $_POST['kabupaten_2'],
                'keterangan' => $_POST['keterangan'],                                                       
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