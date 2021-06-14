<?php

class Report_adm_keuangan_m extends MY_Model
{
    public function getReportAdm(){
        $query = "SELECT id, ver_kepala_desa FROM buku_peraturan_desa
            UNION SELECT id, ver_kepala_desa FROM buku_keputusan_kepala_desa
            UNION SELECT id, ver_kepala_desa FROM buku_inventaris_kekayaan_desa
            UNION SELECT id, ver_kepala_desa FROM buku_lemdes_berdes
            UNION SELECT id, ver_kepala_desa FROM buku_aparat_pemerintah_desa
            UNION SELECT id, ver_kepala_desa FROM buku_tnh_kas_desa
            UNION SELECT id, ver_kepala_desa FROM buku_tnh_desa
            UNION SELECT id, ver_kepala_desa FROM buku_agenda
            UNION SELECT id, ver_kepala_desa FROM buku_ekspedisi
            ";
        $status = $this->db->query($query);    
        return $status;
    }

    public function countDataVerifForm($table){
        $status = $this->db->select('ver_kepala_desa, COUNT(ver_kepala_desa) as total')->group_by('ver_kepala_desa')->get($table);
        return $status;
    }
}