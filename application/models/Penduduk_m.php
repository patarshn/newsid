<?php

class Penduduk_m extends MY_Model
{
    function __construct(){
		  parent::__construct(); 
    }
   
    
    public function getWhere(){
        $this->db->select('*');
        $this->db->from('ktp_kk');
        $this->db->where('kedudukan_dikeluarga', 'kepala keluarga');
        $status = $this->db->get();
        #print_r($status->result());
        return $status;
    }



}
