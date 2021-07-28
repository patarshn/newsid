<?php

class Report_adm_penduduj_m extends MY_Model
{
    public function getReportAdm2(){
        $query = "SELECT COUNT(*) FROM buku_peraturan_desa
        UNION SELECT id, ver_kepala_desa,'buku_keputusan_kepala_desa' as table_name FROM buku_keputusan_kepala_desa
        UNION SELECT id, ver_kepala_desa,'buku_inventaris_kekayaan_desa' as table_name FROM buku_inventaris_kekayaan_desa
        UNION SELECT id, ver_kepala_desa,'buku_lemdes_berdes' as table_name FROM buku_lemdes_berdes
        UNION SELECT id, ver_kepala_desa,'buku_aparat_pemerintah_desa' as table_name FROM buku_aparat_pemerintah_desa
        UNION SELECT id, ver_kepala_desa,'buku_tnh_kas_desa' as table_name FROM buku_tnh_kas_desa
        UNION SELECT id, ver_kepala_desa,'buku_tnh_desa' as table_name FROM buku_tnh_desa
        UNION SELECT id, ver_kepala_desa,'buku_agenda' as table_name FROM buku_agenda
        UNION SELECT id, ver_kepala_desa,'buku_ekspedisi' as table_name FROM buku_ekspedisi
        ";
        $status = $this->db->query($query);    
        return $status;
    }

    public function countDataVerifForm($table){
        $status = $this->db->select('ver_kepala_desa, COUNT(ver_kepala_desa) as total')->group_by('ver_kepala_desa')->get($table);
        return $status;
    }

    public function countKtp_kk($table){
      $status = $this->db->count_all('ktp_kk');
    }

    public function getReportAdm(){
      $query = "SELECT COUNT(*) FROM ktp_kk
      UNION SELECT COUNT(*) FROM ktp_kk
      UNION SELECT COUNT(*) FROM mutasi_penduduk
      UNION SELECT COUNT(*) FROM rekap_penduduk
      UNION SELECT COUNT(*) FROM penduduk_sementara
      ";
      $status = $this->db->query($query);    
      return $status;
  }
}
