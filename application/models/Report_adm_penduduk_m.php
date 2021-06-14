<?php

class Report_adm_penduduk_m extends MY_Model
{
    public function getReportAdm(){
        $query = "SELECT* FROM ktp_kk
        UNION SELECT* FROM mutasi_penduduk
        UNION SELECT* FROM penduduk_sementara
        UNION SELECT id, ver_kepala_desa,'buku_aparat_pemerintah_desa' as table_name FROM buku_aparat_pemerintah_desa
        UNION SELECT id, ver_kepala_desa,'buku_tnh_kas_desa' as table_name FROM buku_tnh_kas_desa
        UNION SELECT id, ver_kepala_desa,'buku_tnh_desa' as table_name FROM buku_tnh_desa
        UNION SELECT id, ver_kepala_desa,'buku_agenda' as table_name FROM buku_agenda
        UNION SELECT id, ver_kepala_desa,'buku_ekspedisi' as table_name FROM buku_ekspedisi
        ";
        $status = $this->db->query($query);    
        return $status;
    }

    public function countDataPenduduk($table){
        $status = $this->db->select('ver_kepala_desa, COUNT(ver_kepala_desa) as total')->group_by('ver_kepala_desa')->get($table);
        return $status;
    }

    public function getCountKk_Ktp()
    {
       $this->db->select_sum('ktp_kk');
       $query = $this->db->get('nik');
       if($query->num_rows()>0)
       {
         return $query->row()->ktp_kk;
       }
       else
       {
         return 0;
       }
    }

    public function getKk_ktp($table,$where){
      if($where == null){
          $status = $this->db->order_by('id','desc')->get($table);
      }
      else{
          $status = $this->db->where($where)->order_by('id','desc')->get($table);
      }
      
      return $status;
  }

}