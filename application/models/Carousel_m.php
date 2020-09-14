<?php

class Carousel_m extends MY_Model
{
    private $_table = 'carousel';

    function __construct(){
		  parent::__construct();
    }
    
    public function get($id = null){
        if($id == null){
            return $this->db->get($this->_table)->result();
        }
        else{
            return $this->db->where('id',$id)->get($this->_table)->result();
        }
    }

    public function store($d){
        $data['image'] = $d['uploadimage'];
        $data['title'] = $d['titleimage'];
        $data['description'] = $d['descriptionimage'];
        $status = $this->db->insert($this->_table,$data) ? true:false;
        return $status;
    }

    public function update($d){
        $data['id'] = $d['id']; 
        $data['image'] = $d['uploadimage'];
        $data['title'] = $d['titleimage'];
        $data['description'] = $d['descriptionimage'];
        $status = $this->db->where('id',$data['id'])->update($this->_table,$data) ? true:false;
        return $status;
    }

}
