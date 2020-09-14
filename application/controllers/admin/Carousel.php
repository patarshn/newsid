<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carousel extends Admin_Controller{

    function __construct()
	{
        parent::__construct();
        $this->load->model('Carousel_M');
    }
    
    function rulesStore(){
        return [
            ['field' => 'uploadimagename',
            'label' => 'Upload Image',
            'rules' => 'required'],
        ];
    }

    
    
    function index(){
        
        $content = array(
            "uri" => $this->print_uri(),
            "carousel" => $this->Carousel_M->get(),
        );
        
        $this->load->view('admin/partials/header');
        $this->load->view('admin/partials/content_sidebar');
        $this->load->view('admin/partials/content_navbar');
        $this->load->view('admin/carousel/index',$content);
        $this->load->view('admin/partials/content_footer');
        $this->load->view('admin/partials/footer');
    }

    function add(){
        $this->load->view('admin/partials/header');
        $this->load->view('admin/partials/content_sidebar');
        $this->load->view('admin/partials/content_navbar');
        $this->load->view('admin/carousel/add');
        $this->load->view('admin/partials/content_footer');
        $this->load->view('admin/partials/footer');
    }

    function edit($id){
        
        $content = array(
            "uri" => $this->print_uri(),
            "carousel" => $this->Carousel_M->get($id),
        );

        $this->load->view('admin/partials/header');
        $this->load->view('admin/partials/content_sidebar');
        $this->load->view('admin/partials/content_navbar');
        $this->load->view('admin/carousel/edit',$content);
        $this->load->view('admin/partials/content_footer');
        $this->load->view('admin/partials/footer');
    }

    function destroy(){
        $_POST = $this->input->post(); 
        print_r($_POST['rowdelete']);

    }

    function store(){
        $validation = $this->form_validation;
        $validation->set_rules($this->rulesStore());
        if($validation->run()){
            if($_FILES['uploadimage']['name'] != ""){
                $filename = $_FILES['uploadimage']['name'];
                $filename = pathinfo($filename, PATHINFO_FILENAME);
                $_uploadImage = $this->Carousel_M->_uploadImage('uploadimage',$filename,'assets');
                if(!$_uploadImage || $_uploadImage == ""){
                    $callback = array(
                        'status' => 'error',
                        'message' => $this->upload->display_errors(),
                    );
                }
                else{
                    $_POST = $this->input->post();
                    $_POST['uploadimage'] = $_uploadImage;
                    if($this->Carousel_M->store($_POST)){
                        $this->session->set_flashdata('success_message', 'Pengisian form berhasil, terimakasih');
                        $callback = array(
                            'status' => 'success',
                            'message' => 'Data berhasil diinput',
                            'redirect' => base_url().'admin/carousel',
                        );
                    }
                    else{
                        $callback = array(
                            'status' => 'error',
                            'message' => 'Data gagal diinputkan',
                        );
                    }
                }
            }
            else{
                $callback = array(
                    'status' => 'error',
                    'message' => 'File belum dipilih',
                );
            }
        }
        else{
            $callback = array(
                'status' => 'error',
                'message' => validation_errors(),
            );
        }
        echo json_encode($callback);
    }

    function update(){
        $_POST = $this->input->post();
        $newimage = false;
        $_oldUploadImage = $_POST['uploadimagename1'];
        $_POST['uploadimage'] = $_oldUploadImage;
        if(isset($_POST['uploadimagename2'])){
            if($_FILES['uploadimage']['name'] != ""){
                $filename = $_FILES['uploadimage']['name'];
                $filename = pathinfo($filename, PATHINFO_FILENAME);
                $_uploadImage = $this->Carousel_M->_uploadImage('uploadimage',$filename,'assets');
                if(!$_uploadImage || $_uploadImage == ""){
                    $callback = array(
                        'status' => 'error',
                        'message' => $this->upload->display_errors(),
                    );
                    echo json_encode($callback);
                    return;
                }
                else{
                    $_POST['uploadimage'] = $_uploadImage;
                    $newimage = true;
                }
            }
        }
        if($this->Carousel_M->update($_POST)){
            if($newimage == true){
                $this->Carousel_M->_deleteImage($_oldUploadImage);
            }        
            $this->session->set_flashdata('success_message', 'Pengisian form berhasil, terimakasih');
            $callback = array(
                'status' => 'success',
                'message' => 'Data berhasil diinput',
                'redirect' => base_url().'admin/carousel',
            );
        }
        else{
            $callback = array(
                'status' => 'error',
                'message' => 'Data gagal diinputkan',
            );
        }

        echo json_encode($callback);
    }

}