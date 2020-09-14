<?php

/**
 * 
 */
class MY_Model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}


	//UPLOAD

	function _uploadImage($inputname,$name,$path){
		
		$config['upload_path']          = $path;
    	$config['allowed_types']        = 'gif|jpg|png|jpeg';
    	$config['file_name']            = $name."-".uniqid();
    	$config['overwrite']			= true;
	    $config['max_size']             = 1024; // 1MB
	    // $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		$this->load->library('upload', $config);
	    $this->upload->initialize($config);
	    
		
	    if ($this->upload->do_upload($inputname)) {
			return $this->upload->data("file_name");
	    }
	    return false;
	    //return "default.jpg";
	}

	/*function _deleteImage($foldername,$name){
    	if ($name != "default.jpg" AND file_exists("assets/images/".$foldername."/".$name)) {
	    	//$filename = explode(".", $name)[0];
			if(!unlink("assets/images/".$foldername."/".$name)){
				return false;
			}
    	}
    	return true;
	}*/

	function _deleteImage($name){
    	if ($name != "default.jpg" AND file_exists("assets/".$name)) {
	    	//$filename = explode(".", $name)[0];
			if(!unlink("assets/".$name)){
				return false;
			}
    	}
    	return true;
	}
}