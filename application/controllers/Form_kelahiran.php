<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_kelahiran extends Frontend_Controller{
    
    private $_table = 'form_kelahiran';
    private $_folder = 'form';
    private $_folderUpload = 'form_kelahiran';
    private $_docxName = 'form_kelahiran';
    private $_mainTitle = 'Form Kelahiran';  
    private $_fileName = 'form_kelahiran';
   
    
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
            ['field' => 'nama_anak', 'label' => 'Nama Anak', 'rules' => 'required'],
            ['field' => 'ke_anak', 'label' => 'Anak ke-', 'rules' => 'required'],
            ['field' => 'tempat_lahir_anak', 'label' => 'Tempat Lahir Anak', 'rules' => 'required'],
            ['field' => 'tanggal_lahir_anak', 'label' => 'Tanggal Lahir Anak', 'rules' => 'required'],
            ['field' => 'jenis_kelamin_anak', 'label' => 'Jenis Kelamin Anak', 'rules' => 'required'],
            ['field' => 'agama_anak', 'label' => 'Agama Anak', 'rules' => 'required'],
            ['field' => 'nik_ayah', 'label' => 'NIK Ayah', 'rules' => 'required|numeric|min_length[16]|max_length[16]'],
            ['field' => 'nama_ayah', 'label' => 'Nama Ayah', 'rules' => 'required'],
            ['field' => 'tempat_lahir_ayah', 'label' => 'Tempat Lahir Ayah', 'rules' => 'required'],
            ['field' => 'tanggal_lahir_ayah', 'label' => 'Tanggal Lahir Ayah', 'rules' => 'required'],
            ['field' => 'pekerjaan_ayah', 'label' => 'Pekerjaan Ayah', 'rules' => 'required'],
            ['field' => 'agama_ayah', 'label' => 'Agama Ayah', 'rules' => 'required'],
            ['field' => 'nik_ibu', 'label' => 'NIK Ibu', 'rules' => 'required|numeric|min_length[16]|max_length[16]'],
            ['field' => 'nama_ibu', 'label' => 'Nama Ibu', 'rules' => 'required'],
            ['field' => 'tempat_lahir_ibu', 'label' => 'Tempat Lahir Ibu', 'rules' => 'required'],
            ['field' => 'tanggal_lahir_ibu', 'label' => 'Tanggal Lahir Ibu', 'rules' => 'required'],
            ['field' => 'pekerjaan_ibu', 'label' => 'Pekerjaan Ibu', 'rules' => 'required'],
            ['field' => 'agama_ibu', 'label' => 'Agama Ibu', 'rules' => 'required'],
            ['field' => 'alamat', 'label' => 'Alamat', 'rules' => 'required'],
            ['field' => 'pekon', 'label' => 'Pekon', 'rules' => 'required'],
            ['field' => 'kecamatan', 'label' => 'Kecamatan', 'rules' => 'required'],
            ['field' => 'kabupaten', 'label' => 'Kabupaten', 'rules' => 'required'],
            ['field' => 'rt', 'label' => 'RT', 'rules' => 'required|numeric'],
            ['field' => 'rw', 'label' => 'RW', 'rules' => 'required|numeric'],
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
            $nik = $_POST['nik_ayah'];
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
                'nama_anak' => $_POST['nama_anak'],
                'ke_anak' => $_POST['ke_anak'],
                'tempat_lahir_anak' => $_POST['tempat_lahir_anak'],
                'tanggal_lahir_anak' => $_POST['tanggal_lahir_anak'],
                'jenis_kelamin_anak' => $_POST['jenis_kelamin_anak'],
                'agama_anak' => $_POST['agama_anak'],
                'nik_ayah' => $_POST['nik_ayah'],
                'nama_ayah' => $_POST['nama_ayah'],
                'tempat_lahir_ayah' => $_POST['tempat_lahir_ayah'],
                'tanggal_lahir_ayah' => $_POST['tanggal_lahir_ayah'],
                'pekerjaan_ayah' => $_POST['pekerjaan_ayah'],
                'agama_ayah' => $_POST['agama_ayah'],
                'nik_ibu' => $_POST['nik_ibu'],
                'nama_ibu' => $_POST['nama_ibu'],
                'tempat_lahir_ibu' => $_POST['tempat_lahir_ibu'],
                'tanggal_lahir_ibu' => $_POST['tanggal_lahir_ibu'],
                'pekerjaan_ibu' => $_POST['pekerjaan_ibu'],
                'agama_ibu' => $_POST['agama_ibu'],
                'alamat' => $_POST['alamat'],
                'pekon' => $_POST['pekon'],
                'kecamatan' => $_POST['kecamatan'],
                'kabupaten' => $_POST['kabupaten'],
                'rt' => $_POST['rt'],
                'rw' => $_POST['rw'],                
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