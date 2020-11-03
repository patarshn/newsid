<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_peraturan_desa extends Admin_Controller {

    private $_table = 'Buku_peraturan_desa';
    private $_folder = 'Buku_peraturan_desa';
    private $_mainTitle = 'Buku Peraturan Desa';

    function __construct() {
        parent::__construct();
        $this->load->model('Main_m');
        $this->load->library('breadcrumbcomponent');
        
    }

    function rulesStore() {
        return [
            ['field' => 'jenis_peraturan_desa','label' => 'Jenis Peraturan Desa', 'rules' => 'required'],
            ['field' => 'no_dan_tgl_ditetapkan','label' => 'Nomor dan Tanggal Ditetapkan', 'rules' => 'required'],
            ['field' => 'tentang','label' => 'Tentang', 'rules' => 'required'],
            ['field' => 'uraian_singkat','label' => 'Uraian Singkat', 'rules' => 'required'],
            ['field' => 'tgl_kesepakatan_peraturan_desa','label' => 'Tanggal Kesepakatan Peraturan Desa', 'rules' => 'required'],
            ['field' => 'no_dan_tgl_dilaporkan','label' => 'Nomor dan Tanggal Dilaporkan', 'rules' => 'required'],
            ['field' => 'no_dan_tgl_diundangkan_dalam_lembaran_desa','label' => 'Nomor dan Tanggal Diundangkan Dalam Lembaran Desa ', 'rules' => 'required'],
            ['field' => 'no_dan_tgl_diundangkan_dalam_berita_desa','label' => 'Nomor dan Tanggal Diundangkan Dalam Berita Desa', 'rules' => 'required'],
            ['field' => 'ket','label' => 'Keterangan', 'rules' => 'required'],
        ];
    }

    function index(){
        $this->breadcrumbcomponent->add('Home', base_url());
        $this->breadcrumbcomponent->add('Admin', base_url('admin'));  
        $this->breadcrumbcomponent->add($this->_mainTitle, base_url('admin/'.$this->_folder.'/'));

        $breadcrumb = $this->breadcrumbcomponent->output();
        $data = array (
            'breadcrumb' => $breadcrumb,
            'data' => $this->Main_m->get($this->_table,null)->result(),
            'title' => $this->_mainTitle,
            'uri' => $this->uri->segment_array(),
            'folder' => $this->_folder,
        );

        $this->load->view('admin/partials/header');
        $this->load->view('admin/partials/content_sidebar');
        $this->load->view('admin/partials/content_navbar');
        $this->load->view('admin/'.$this->_folder.'/index',$data);
        $this->load->view('admin/partials/content_footer');
        $this->load->view('admin/partials/footer');  
    }

    function add(){
        
        $this->breadcrumbcomponent->add('Home', base_url());
        $this->breadcrumbcomponent->add('Admin', base_url('admin')); 
        $this->breadcrumbcomponent->add($this->_mainTitle, base_url('admin/'.$this->_folder.'/')); 
        $this->breadcrumbcomponent->add('Add', base_url('admin/'.$this->_folder.'/add'));

        $breadcrumb = $this->breadcrumbcomponent->output();
        $data = array(
            'breadcrumb' => $breadcrumb,
            'title' => "Tambah Data ".$this->_mainTitle,
            'uri' => $this->uri->segment_array(),
            'folder' => $this->_folder,
        );

        $this->load->view('admin/partials/header');
        $this->load->view('admin/partials/content_sidebar');
        $this->load->view('admin/partials/content_navbar');
        $this->load->view('admin/'.$this->_folder.'/add',$data);
        $this->load->view('admin/partials/content_footer');
        $this->load->view('admin/partials/footer');
    }

    public function store(){
        $validation = $this->form_validation;
        $validation->set_rules($this->rulesStore());
        if($validation->run()){
            $_POST = $this->input->post();
            $data = array(
                'jenis_peraturan_desa' => $_POST['jenis_peraturan_desa'],
                'no_dan_tgl_ditetapkan' => $_POST['no_dan_tgl_ditetapkan'],
                'tentang' => $_POST['tentang'],
                'uraian_singkat' => $_POST['uraian_singkat'],
                'tgl_kesepakatan_peraturan_desa' => $_POST['tgl_kesepakatan_peraturan_desa'],
                'no_dan_tgl_dilaporkan' => $_POST['no_dan_tgl_dilaporkan'],
                'no_dan_tgl_diundangkan_dalam_lembaran_desa' => $_POST['no_dan_tgl_diundangkan_dalam_lembaran_desa'],
                'no_dan_tgl_diundangkan_dalam_berita_desa' => $_POST['no_dan_tgl_diundangkan_dalam_berita_desa'],
                'ket' => $_POST['ket'],
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' =>  $this->session->userdata('username'),
                
            );
            if($this->Main_m->store($data,$this->_table)){
                $this->session->set_flashdata('success_message', 'Pengisian form berhasil, terimakasih');
                $callback = array(
                    'status' => 'success',
                    'message' => 'Data berhasil diinput',
                    'redirect' => base_url().'admin/'.$this->_folder,
                );
            }
            else{
                //$this->session->set_flashdata('error_message', 'Mohon maaf, pengisian form gagal');
                $callback = array(
                    'status' => 'error',
                    'message' => 'Mohon Maaf, Pengisian form gagal',
                );
            }
        }
        else{
            //$this->session->set_flashdata('error_message', validation_errors());
            $callback = array(
                'status' => 'error',
                'message' => validation_errors(),
            );
        }
        echo json_encode($callback);
    }

    
}
?>