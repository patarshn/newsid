<?php

class Kependudukan_m extends MY_Model
{
    private $_table = 'ktp_kk';
    var $table = 'ktp_kk'; //nama tabel dari database
    var $column_order = array(null, 'nkk','nik','nama','rt','rw','created_at'); //field yang ada di table user
    var $column_search = array('nkk','nik','nama','rt','rw','created_at'); //field yang diizin untuk pencarian 
    var $order = array('id' => 'asc'); // default order 
    function __construct(){
		  parent::__construct();
    }

    public function getSingleNik($nik = null){
        return $this->db->where('nik',$nik)->get($this->_table)->row();
    }

    /*
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
    */
    


 
    private function _get_datatables_query()
    {
         
        $this->db->from($this->table);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                 
                if($i===0) // looping awal
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

}
