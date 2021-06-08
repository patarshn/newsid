<?php

class Report_adm_lain_m extends MY_Model
{
    public function getReportAdm(){
        $query = "SELECT id, verif_bpd, 'buku_agenda_surat_keluar' as table_name FROM buku_agenda_surat_keluar
            UNION SELECT id, verif_bpd, 'buku_agenda_surat_masuk' as table_name FROM buku_agenda_surat_masuk
            UNION SELECT id, verif_bpd, 'buku_ekspedisi_bpd' as table_name FROM buku_ekspedisi_bpd
            UNION SELECT id, verif_bpd, 'buku_data_inventaris_bpd' as table_name FROM buku_data_inventaris_bpd
            UNION SELECT id, verif_bpd, 'buku_laporan_keuangan' as table_name FROM buku_laporan_keuangan
            UNION SELECT id, verif_bpd, 'buku_data_anggota_bpd' as table_name FROM buku_data_anggota_bpd
            UNION SELECT id, verif_bpd, 'buku_data_kegiatan' as table_name FROM buku_data_kegiatan
            UNION SELECT id, verif_bpd, 'buku_data_aspirasi_masyarakat' as table_name FROM buku_data_aspirasi_masyarakat
            UNION SELECT id, verif_bpd, 'buku_data_peraturan_bpd' as table_name FROM buku_data_peraturan_bpd
            UNION SELECT id, verif_bpd, 'buku_data_peraturan_desa' as table_name FROM buku_data_peraturan_desa
            UNION SELECT id, verif_bpd, 'buku_keputusan_musyawarah' as table_name FROM buku_keputusan_musyawarah
            UNION SELECT id, verif_bpd, 'buku_keputusan_ppd' as table_name FROM buku_keputusan_ppd
            UNION SELECT id, verif_bpd, 'buku_rapat_bpd' as table_name FROM buku_rapat_bpd
            ";
        $status = $this->db->query($query);    
        return $status;
    }

    public function countDataVerifForm($table){
        $status = $this->db->select('verif_bpd, COUNT(verif_bpd) as total')->group_by('verif_bpd')->get($table);
        return $status;
    }
}