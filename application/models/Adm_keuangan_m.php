<?php

class Adm_keuangan_m extends MY_Model
{
    function __construct(){
		  parent::__construct();
    }

    public function getkode_rekening($where){
        $table = 'apbd';    
        $status = $this->db->where($where)->order_by('kode_rekening1','asc')->order_by('kode_rekening2','asc')->order_by('kode_rekening3','asc')->order_by('kode_rekening4','asc')->get($table);
        
        return $status;
    }
}
