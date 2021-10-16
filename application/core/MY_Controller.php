<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin:*');
class MY_Controller extends CI_Controller {
    public function __construct()
    {	
        parent::__construct();
        
        
    }

    public function notelp($notelp) {
        // kadang ada penulisan no hp 0811 239 345
        $notelp = str_replace(" ","",$notelp);
        // kadang ada penulisan no hp (0274) 778787
        $notelp = str_replace("(","",$notelp);
        // kadang ada penulisan no hp (0274) 778787
        $notelp = str_replace(")","",$notelp);
        // kadang ada penulisan no hp 0811.239.345
        $notelp = str_replace(".","",$notelp);
        // kadang ada penulisan no hp +6211239345
        $notelp = str_replace("+","",$notelp);
        $hp =  $notelp;
        // cek apakah no hp mengandung karakter + dan 0-9
        if(!preg_match('/[^0-9]/',trim($notelp))){
            // cek apakah no hp karakter 1-3 adalah +62
            if(substr(trim($notelp), 0, 2)=='62'){
                $hp = trim($notelp);
            }
            // cek apakah no hp karakter 1 adalah 0
            elseif(substr(trim($notelp), 0, 1)=='0'){
                $hp = '62'.substr(trim($notelp), 1);
            }
        }
        return $hp;
    }

    protected function upload_image($inputname,$upload_path,$file_name){
        
        #$config['upload_path']      = "./uploads/".$this->_folder."/"; //lokasi
        $config['upload_path']      = $upload_path;
        $config['allowed_types']    = 'jpg|png|jpeg'; //file dizinka
        #$config['file_name']        = $this->_folder.uniqid();
        $config['file_name']        = $file_name;
        $config['overwrite']        = true;
        $config['max_size']         = 15*1024; // 2MB

        $this->load->library('upload',$config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload($inputname)) {
                $gbr = $this->upload->data();
                $gbr_width = $gbr['image_width'];
                $gbr_height = $gbr['image_height'];
                #echo $gbr_height." ".$gbr_width;
                $max_resolution = 1280; //720p = 1280 , 1080p = 1920
                if($gbr_height > $max_resolution OR $gbr_width > $max_resolution){
                    if($gbr_height >= $gbr_width){
                        $config2['height'] = $max_resolution;
                    }
                    else{
                        $config2['width'] = $max_resolution;
                    }
                    $config2['image_library']='gd2';
                    $config2['source_image']=$upload_path.$gbr['file_name'];
                    $config2['create_thumb']= FALSE;
                    $config2['maintain_ratio']= TRUE;
                    $config2['quality'] = '100%';
                    #$config2['new_image']='./assets/images/'.$gbr['file_name'];
    
                    $this->load->library('image_lib', $config2);
                    $this->image_lib->initialize($config2);
                    try{
                        $this->image_lib->resize();
                    }
                    catch(Exception $e){
                        $callback = array(
                            'status' => 'error',
                            'message' => $e,
                        );
                        
                        unlink($upload_path.$gbr['file_name']);
                        echo json_encode($callback);
                        exit();
                    }
                }

                $original_file = $upload_path.$gbr['file_name'];
                #$resized_file = $upload_path.'new/'.$gbr['file_name'];
                $resized_file = $upload_path.$gbr['file_name'];
                $max_file_size = '1000000'; // maximum file size, in bytes
                $gbr = $this->upload->data();
                $original_image = imagecreatefromjpeg($original_file);

                $image_quality = 100;
                $count = 0;
                $original_filesize = $gbr['file_size'];
                $quality_decrease = (int)($original_filesize/1000)*2;
                if($quality_decrease > 20){
                    $quality_decrease = 20;
                }
                try{
                    do {
                        $temp_stream = fopen('php://temp', 'w+');
                        $saved = imagejpeg($original_image, $temp_stream, $image_quality-=$quality_decrease);
                        rewind($temp_stream);
                        $fstat = fstat($temp_stream);
                        fclose($temp_stream);
                        $file_size = $fstat['size'];
                        $count++;
                    }
                    while (($file_size > $max_file_size));
                    imagejpeg($original_image, $resized_file, $image_quality + 1);
                }
                catch(Exception $e){
                    $callback = array(
                        'status' => 'error',
                        'message' => $e,
                    );
                    
                    unlink($upload_path.$gbr['file_name']);
                    echo json_encode($callback);
                    exit();
                }
                

                /*
                if (-1 == $image_quality) {
                    echo "Unable to get the file that small. Best I could do was $file_size bytes at image quality 0.\n";
                    }
                else {
                    echo "Successfully resized $original_file to $file_size bytes using image quality $image_quality. Resized file saved as $resized_file.\n";
                    imagejpeg($original_image, $resized_file, $image_quality + 1);
                }
                */
                #exit();
            return $this->upload->data("file_name");
        }
        else{
            return false;
        }    
    }

    
}

class Frontend_Controller extends MY_Controller {
    public function __construct()
    {	
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function upload_image($inputname,$upload_path,$file_name){
        
        #$config['upload_path']      = "./uploads/".$this->_folder."/"; //lokasi
        $config['upload_path']      = $upload_path;
        $config['allowed_types']    = 'jpg|png|jpeg'; //file dizinka
        #$config['file_name']        = $this->_folder.uniqid();
        $config['file_name']        = $file_name;
        $config['overwrite']        = true;
        $config['max_size']         = 15*1024; // 2MB
        
        #$ext = pathinfo($_FILES[$inputname]['name'],PATHINFO_EXTENSION);
        $mime = mime_content_type($_FILES[$inputname]['tmp_name']);
        #echo var_dump($mime);
        #exit();

        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        
        if ($this->upload->do_upload($inputname)) {
                $gbr = $this->upload->data();
                $gbr_width = $gbr['image_width'];
                $gbr_height = $gbr['image_height'];
                #echo $gbr_height." ".$gbr_width;
                $max_resolution = 1280; //720p = 1280 , 1080p = 1920
                if($gbr_height > $max_resolution OR $gbr_width > $max_resolution){
                    if($gbr_height >= $gbr_width){
                        $config2['height'] = $max_resolution;
                    }
                    else{
                        $config2['width'] = $max_resolution;
                    }
                    $config2['image_library']='gd2';
                    $config2['source_image']=$upload_path.$gbr['file_name'];
                    $config2['create_thumb']= FALSE;
                    $config2['maintain_ratio']= TRUE;
                    $config2['quality'] = '100%';
                    #$config2['new_image']='./assets/images/'.$gbr['file_name'];
    
                    $this->load->library('image_lib', $config2);
                    $this->image_lib->initialize($config2);
                    try{
                        $this->image_lib->resize();
                    }
                    catch(Exception $e){
                        $callback = array(
                            'status' => 'error',
                            'message' => $e,
                        );
                        
                        unlink($upload_path.$gbr['file_name']);
                        echo json_encode($callback);
                        exit();
                    }
                }

                $original_file = $upload_path.$gbr['file_name'];
                #$resized_file = $upload_path.'new/'.$gbr['file_name'];
                $resized_file = $upload_path.$gbr['file_name'];
                $max_file_size = '500000'; // maximum file size, in bytes
                $gbr = $this->upload->data();
                #$original_image = imagecreatefromjpeg($original_file);
                if($mime == "image/jpeg"){
                    $original_image = imagecreatefromjpeg($original_file);
                }
                else if($mime == "image/png"){
                    $original_image = imagecreatefrompng($original_file);
                }
                else{
                    $callback = array(
                        'status' => 'error',
                        'message' => 'File harus berekstensi png/jpg/jpeg',
                    );
                    
                    unlink($upload_path.$gbr['file_name']);
                    echo json_encode($callback);
                    exit();
                }
                

                $image_quality = 100;
                $count = 0;
                $original_filesize = $gbr['file_size'];
                $quality_decrease = (int)($original_filesize/1000)*2;
                if($quality_decrease > 20){
                    $quality_decrease = 20;
                }
                #$quality_decrease = 20;
                try{
                    do {
                        $temp_stream = fopen('php://temp', 'w+');
                        $saved = imagejpeg($original_image, $temp_stream, $image_quality-=$quality_decrease);
                        rewind($temp_stream);
                        $fstat = fstat($temp_stream);
                        fclose($temp_stream);
                        $file_size = $fstat['size'];
                        $count++;
                    }
                    while (($file_size > $max_file_size));
                    imagejpeg($original_image, $resized_file, $image_quality + 1);
                }
                catch(Exception $e){
                    $callback = array(
                        'status' => 'error',
                        'message' => $e,
                    );
                    
                    unlink($upload_path.$gbr['file_name']);
                    echo json_encode($callback);
                    exit();
                }
                

                /*
                if (-1 == $image_quality) {
                    echo "Unable to get the file that small. Best I could do was $file_size bytes at image quality 0.\n";
                    }
                else {
                    echo "Successfully resized $original_file to $file_size bytes using image quality $image_quality. Resized file saved as $resized_file.\n";
                    imagejpeg($original_image, $resized_file, $image_quality + 1);
                }
                */
                #exit();
            return $this->upload->data("file_name");
        }
        else{
            return false;
        }    
    }

    public function destroy_file($id) {
        $berkas_id =  $this->Main_m->get($this->_table,$id)->result();  
        foreach ($berkas_id as $b_id) {
            
            if(empty($b_id->berkas)){
                return true;
            }

            if (!unlink(FCPATH."uploads/".$this->_folder."/".$b_id->berkas)) {
                return false;
            }
            
        }
        return true;
    }
}

class Backend_Controller extends MY_Controller {
    public function __construct()
    {	
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_message('required', 'field %s harus diisi');
        $this->load->helper('indonesia_date_helper');
        if($this->session->userdata('login') != TRUE){
            redirect(base_url());
        }
    }
}

class Admin_Controller extends Backend_Controller {
    public function __construct()
    {	
        parent::__construct();
        if($this->session->userdata('role') != 'admin'){
            redirect(base_url());
        }
    }
}


class RT_Controller extends Backend_Controller {
    public function __construct()
    {	
        parent::__construct();
        if($this->session->userdata('role') != 'rt'){
            redirect(base_url());
        }
    }
}


class RW_Controller extends Backend_Controller {
    public function __construct()
    {	
        parent::__construct();
        if($this->session->userdata('role') != 'rw'){
            redirect(base_url());
        }
    }
}