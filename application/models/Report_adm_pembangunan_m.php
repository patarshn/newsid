<?php

class Report_adm_pembangunan_m extends MY_Model
{
    public function getReportAdm(){
        $query = "SELECT id,'rencana_pembangunan' as table_name  FROM rencana_pembangunan
        UNION SELECT id,'kegiatan_pembangunan' as table_name FROM kegiatan_pembangunan
        UNION SELECT id,'inventaris_pembangunan' as table_name FROM inventaris_pembangunan
        UNION SELECT id,'kader_pemberdayaan' as table_name FROM kader_pemberdayaan
        ";
        $status = $this->db->query($query);    
        return $status;
    }

    public function countDataPembangunan($table){
        $status = $this->db->select('id, COUNT(id) as total')->group_by('id')->get($table);
        return $status;
    }

    public function hitungRpembangunan()
    {
       $this->db->select_sum('rencana_pembangunan');
       $query = $this->db->get('id');
       if($query->num_rows()>0)
       {
         return $query->row()->rencana_pembangunan;
       }
       else
       {
         return 0;
       }
    }

    function countRencanaPembangunan(){
        $query = $this->$db->query("SELECT * FROM rencana_pembangunan");
        $total = $query->num_rows();
        return $total;
        }
}