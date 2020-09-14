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


}
