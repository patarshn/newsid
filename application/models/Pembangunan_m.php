<?php

class Pembangunan_m extends MY_Model
{
    function __construct(){
		  parent::__construct(); 
    }
   
    
    public function getJoin(){
        $this->db->select('*');
        $this->db->from('rencana_pembangunan');
        $this->db->join('kegiatan_pembangunan', 'kegiatan_pembangunan.id_rencana = rencana_pembangunan.id');
        $status = $this->db->get();
        #print_r($status->result());
        return $status;
    }

    public function getAsc2($table,$tahun){
        if($tahun == null){
            $status = $this->db->order_by('id','asc')->get($table);
        }
        else{
            $status = $this->db->where($tahun)->order_by('id','asc')->get($table);
        }
        
        return $status;
    }


}
