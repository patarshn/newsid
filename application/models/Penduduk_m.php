<?php

class Penduduk_m extends MY_Model
{
    function __construct(){
		  parent::__construct(); 
    }
   
    
    public function getWhere(){
        $this->db->select('*');
        $this->db->from('ktp_kk');
        $this->db->where('hub_keluarga', 'kepala keluarga');
        $status = $this->db->get();
        #print_r($status->result());
        return $status;
    }

    public function getMutasiTahunBulan($bulan_tahun){
        $this->db->select('*');
        $this->db->from('mutasi_penduduk');
        $this->db->like('bulan_tahun', $bulan_tahun,'after');
        $status = $this->db->get();
        #print_r($status->result());
        return $status;
    }

}
