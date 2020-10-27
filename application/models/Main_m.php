<?php

class Main_m extends MY_Model
{
    function __construct(){
		  parent::__construct();
    }
    
    public function store($data,$table){
        $status = $this->db->insert($table,$data) ? true:false;
        return $status;
    }

    public function get($table,$where){
        if($where == null){
            $status = $this->db->get($table);
        }
        else{
            $status = $this->db->where($where)->get($table);
        }
        
        return $status;
    }

    public function update($data,$table,$where){
        $status = $this->db->where($where)->update($table,$data) ? true:false;
        return $status;
    }

    public function destroy($table,$where){
        $status = $this->db->where($where)->delete($table) ? true:false;
        return $status;
    }

    public function countDataVerifForm($table){
        $status = $this->db->select('verif_lurah, COUNT(verif_lurah) as total')->group_by('verif_lurah')->get($table);
        return $status;
    }

    public function setuju($data,$table,$where){
        $status = $this->db->where_in('id',$where)->update($table,$data) ? true:false;
        return $status;
    }

    public function tolak($data,$table,$where){
        $status = $this->db->where_in('id',$where)->update($table,$data) ? true:false;
        return $status;
    }

    public function getAllReport(){
        $query = "SELECT id,nik_1 as 'nik',nama_1 as 'nama',verif_lurah, verif_lurah_at,created_at, 'form_ahliwaris' as table_name FROM form_ahliwaris
            UNION SELECT id,nik,nama,verif_lurah, verif_lurah_at,created_at, 'form_belummenikah' as table_name FROM form_belummenikah
            UNION SELECT id,nik,nama,verif_lurah, verif_lurah_at,created_at, 'form_covid' as table_name FROM form_covid
            UNION SELECT id,nik_1,nama_1,verif_lurah, verif_lurah_at,created_at, 'form_jualbelihewan' as table_name FROM form_jualbelihewan
            UNION SELECT id,nik,nama,verif_lurah, verif_lurah_at,created_at, 'form_kehilanganbarang' as table_name FROM form_kehilanganbarang
            UNION SELECT id,nik_ibu,nama_ibu,verif_lurah, verif_lurah_at,created_at, 'form_kelahiran' as table_name FROM form_kelahiran
            UNION SELECT id,nik,nama,verif_lurah, verif_lurah_at,created_at, 'form_kematian' as table_name FROM form_kematian
            UNION SELECT id,nik,nama,verif_lurah, verif_lurah_at,created_at, 'form_ktpsementara' as table_name FROM form_ktpsementara
            UNION SELECT id,nik_1,nama_1,verif_lurah, verif_lurah_at,created_at, 'form_kuasa' as table_name FROM form_kuasa
            UNION SELECT id,nik,nama,verif_lurah, verif_lurah_at,created_at, 'form_pasjalan' as table_name FROM form_pasjalan
            UNION SELECT id,nik,nama,verif_lurah, verif_lurah_at,created_at, 'form_penghasilan' as table_name FROM form_penghasilan
            UNION SELECT id,nik_l,nama_l,verif_lurah, verif_lurah_at,created_at, 'form_pernyataannikah' as table_name FROM form_pernyataannikah
            UNION SELECT id,nik,nama,verif_lurah, verif_lurah_at,created_at, 'form_skck' as table_name FROM form_skck
            UNION SELECT id,nik,nama,verif_lurah, verif_lurah_at,created_at, 'form_statusperkawinan' as table_name FROM form_statusperkawinan
            UNION SELECT id,nik_l,nama_l,verif_lurah, verif_lurah_at,created_at, 'form_suamiistri' as table_name FROM form_suamiistri
            UNION SELECT id,nik_p,nama_p,verif_lurah, verif_lurah_at,created_at, 'form_tatin' as table_name FROM form_tatin
            UNION SELECT id,nik_orangtua,nama_orangtua,verif_lurah, verif_lurah_at,created_at, 'form_tidakmampu' as table_name FROM form_tidakmampu
            UNION SELECT id,nik,nama,verif_lurah, verif_lurah_at,created_at, 'form_usaha' as table_name FROM form_usaha
            ";

        $status = $this->db->query($query);    
        return $status;
    }

    public function getReport($nik){
        $query = "SELECT id,nik_1 as 'nik',nama_1 as 'nama',verif_lurah, verif_lurah_at,created_at, 'form_ahliwaris' as table_name FROM form_ahliwaris WHERE nik_1 = '$nik'
            UNION SELECT id,nik,nama,verif_lurah, verif_lurah_at,created_at, 'form_belummenikah' as table_name FROM form_belummenikah WHERE nik = '$nik'
            UNION SELECT id,nik,nama,verif_lurah, verif_lurah_at,created_at, 'form_covid' as table_name FROM form_covid WHERE nik = '$nik'
            UNION SELECT id,nik_1,nama_1,verif_lurah, verif_lurah_at,created_at, 'form_jualbelihewan' as table_name FROM form_jualbelihewan WHERE nik_1 = '$nik'
            UNION SELECT id,nik,nama,verif_lurah, verif_lurah_at,created_at, 'form_kehilanganbarang' as table_name FROM form_kehilanganbarang WHERE nik = '$nik'
            UNION SELECT id,nik_ibu,nama_ibu,verif_lurah, verif_lurah_at,created_at, 'form_kelahiran' as table_name FROM form_kelahiran WHERE nik_ibu = '$nik'
            UNION SELECT id,nik,nama,verif_lurah, verif_lurah_at,created_at, 'form_kematian' as table_name FROM form_kematian WHERE nik = '$nik'
            UNION SELECT id,nik,nama,verif_lurah, verif_lurah_at,created_at, 'form_ktpsementara' as table_name FROM form_ktpsementara WHERE nik = '$nik'
            UNION SELECT id,nik_1,nama_1,verif_lurah, verif_lurah_at,created_at, 'form_kuasa' as table_name FROM form_kuasa WHERE nik_1 = '$nik'
            UNION SELECT id,nik,nama,verif_lurah, verif_lurah_at,created_at, 'form_pasjalan' as table_name FROM form_pasjalan WHERE nik = '$nik'
            UNION SELECT id,nik,nama,verif_lurah, verif_lurah_at,created_at, 'form_penghasilan' as table_name FROM form_penghasilan WHERE nik = '$nik'
            UNION SELECT id,nik_l,nama_l,verif_lurah, verif_lurah_at,created_at, 'form_pernyataannikah' as table_name FROM form_pernyataannikah WHERE nik_l = '$nik'
            UNION SELECT id,nik,nama,verif_lurah, verif_lurah_at,created_at, 'form_skck' as table_name FROM form_skck WHERE nik = '$nik'
            UNION SELECT id,nik,nama,verif_lurah, verif_lurah_at,created_at, 'form_statusperkawinan' as table_name FROM form_statusperkawinan WHERE nik = '$nik'
            UNION SELECT id,nik_l,nama_l,verif_lurah, verif_lurah_at,created_at, 'form_suamiistri' as table_name FROM form_suamiistri WHERE nik_l = '$nik'
            UNION SELECT id,nik_p,nama_p,verif_lurah, verif_lurah_at,created_at, 'form_tatin' as table_name FROM form_tatin WHERE nik_p = '$nik'
            UNION SELECT id,nik_orangtua,nama_orangtua,verif_lurah, verif_lurah_at,created_at, 'form_tidakmampu' as table_name FROM form_tidakmampu WHERE nik_orangtua = '$nik'
            UNION SELECT id,nik,nama,verif_lurah, verif_lurah_at,created_at, 'form_usaha' as table_name FROM form_usaha WHERE nik = '$nik'
            ";

        $status = $this->db->query($query);    
        return $status;
    }

}
