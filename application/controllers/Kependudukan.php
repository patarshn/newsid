<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kependudukan extends Frontend_Controller{

    function __construct()
	{
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('kependudukan_m');
        $this->load->library('form_validation');
    }    

    function rulesCheck(){
        return [
            ['field' => 'nik', 'label' => 'NIK Pemberi Kuasa', 'rules' => 'required|numeric|min_length[16]|max_length[16]'],
        ];
    }

    //ACTION
    public function nik($nik){
        $validation = $this->form_validation;
        $data = ['nik' => $nik];
        $validation->set_data($data);
        $validation->set_rules($this->rulesCheck());
        if($validation->run()){
            $datapenduduk = $this->kependudukan_m->getSingleNik($nik);
            if($datapenduduk){
                if(empty($datapenduduk)){
                    $callback = array(
                        'status' => 'error',
                        'message' => 'Data tidak ditemukan',
                    );
                }
                else{
    
                    $callback = array(
                        'status' => 'success',
                        'data' => $datapenduduk,
                        'message' => 'Data ditemukan',
                    );
                }
            }
            else{
                //$this->session->set_flashdata('error_message', 'Mohon maaf, pengisian form gagal');
                $callback = array(
                    'status' => 'error',
                    'message' => 'Data gagal dimuat',
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