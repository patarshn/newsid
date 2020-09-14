<?php

class Kependudukan_m extends MY_Model
{
    private $_table = 'data_kependudukan';

    function __construct(){
		  parent::__construct();
    }

    public function getSingleNik($nik = null){
        return $this->db->where('nik',$nik)->get($this->_table)->row();
    }

    public function update(){
        $_POST = $this->input->post();
        $data['id_form_jualbeli'] = $_POST['id'];
        $data['nik'] = $_POST['nik'];
        $data['nama'] = $_POST['nama'];
        $data['alamat'] = $_POST['alamat'];
        $status = $this->db->where('id_form_ketjualbeli',$data['id_form_ketjualbeli'])->update($this->_table,$data) ? true:false;
        return $status;
    }

    public function destroy(){
        $_POST = $this->input->post();
        $rowdetele = $_POST['rowdelete'];
        foreach($rowdetele as $r){
            $status = $this->db->where('id_form_jualbeli',$r)->delete($this->_table) ? true:false;
        }
        return $status;
    }
    
}
