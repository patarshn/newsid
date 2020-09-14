<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kependudukan extends Frontend_Controller{

    function __construct()
	{
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('kependudukan_m');
    }    

    //ACTION
    public function nik($nik){
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
        echo json_encode($callback);
    }

}