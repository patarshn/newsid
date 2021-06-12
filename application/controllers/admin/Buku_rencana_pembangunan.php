<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_rencana_pembangunan extends Admin_Controller {

    private $_table = 'rencana_pembangunan';
    private $_folder = 'buku_rencana_pembangunan';
    private $_mainTitle = 'Buku Rencana Kerja Pembangunan';

    function __construct()
	{ 
        parent::__construct();
        $this->load->model('Main_m');
        $this->load->library('breadcrumbcomponent'); 
    }    

    function rulesDestroy(){
        return [
            ['field' => 'rowdelete[]',
            'label' => 'rowdelete',
            'rules' => 'required']
        ];
    }

    function rulesStore() {
        return [
            ['field' => 'nama_proyek','label' => 'Nama Proyek/Kegiatan', 'rules' => 'required'],
            ['field' => 'tahun','label' => 'Tahun Rencana Pembangunan', 'rules' => 'required'],
            ['field' => 'lokasi','label' => 'Lokasi', 'rules' => 'required'],
            ['field' => 'biaya_pemerintah','label' => 'Biaya Pemerintah', 'rules' => 'required'],
            ['field' => 'biaya_prov','label' => 'Biaya Provinsi', 'rules' => 'required'],
            ['field' => 'biaya_kab','label' => 'Biaya Kabupaten', 'rules' => 'required'],
            ['field' => 'biaya_swadaya','label' => 'Biaya Swadaya', 'rules' => 'required'],
            ['field' => 'jumlah','label' => 'Jumlah Biaya', 'rules' => 'required'],
            ['field' => 'pelaksana','label' => 'Pelaksana Kegiatan', 'rules' => 'required'],
            ['field' => 'manfaat','label' => 'Manfaat Pembangunan', 'rules' => 'required'],
            ['field' => 'ket','label' => 'Keterangan'],
           ];
    }

    function rulesUpdate() {
        return [
            ['field' => 'id','label' => 'id', 'rules' => 'required'],
            ['field' => 'tahun','label' => 'Tahun Rencana Pembangunan', 'rules' => 'required'],
            ['field' => 'nama_proyek','label' => 'Nama Proyek/Kegiatan', 'rules' => 'required'],
            ['field' => 'lokasi','label' => 'Lokasi', 'rules' => 'required'],
            ['field' => 'biaya_pemerintah','label' => 'Biaya Pemerintah', 'rules' => 'required'],
            ['field' => 'biaya_prov','label' => 'Biaya Provinsi', 'rules' => 'required'],
            ['field' => 'biaya_kab','label' => 'Biaya Kabupaten', 'rules' => 'required'],
            ['field' => 'biaya_swadaya','label' => 'Biaya Swadaya', 'rules' => 'required'],
            ['field' => 'jumlah','label' => 'Jumlah Biaya', 'rules' => 'required'],
            ['field' => 'pelaksana','label' => 'Pelaksana Kegiatan', 'rules' => 'required'],
            ['field' => 'manfaat','label' => 'Manfaat Pembangunan', 'rules' => 'required'],
            ['field' => 'ket','label' => 'Keterangan'],
           ];
    }

    function index(){
            
            $this->breadcrumbcomponent->add('Home', base_url());
            $this->breadcrumbcomponent->add('Admin', base_url('admin'));  
            $this->breadcrumbcomponent->add($this->_mainTitle, base_url('admin/'.$this->_folder.'/'));

            $breadcrumb = $this->breadcrumbcomponent->output();
            $data = array(
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

    function detail($id){
        
        $this->breadcrumbcomponent->add('Home', base_url());
        $this->breadcrumbcomponent->add('Admin', base_url('admin')); 
        $this->breadcrumbcomponent->add($this->_mainTitle, base_url('admin/'.$this->_folder.'/')); 
        $this->breadcrumbcomponent->add('Detail', base_url('admin/'.$this->_folder.'/detail/'));
        $this->breadcrumbcomponent->add($id, base_url('admin/'.$this->_folder.'/detail/'.$id));

        $breadcrumb = $this->breadcrumbcomponent->output();
        $where = ['id'=>$id];
        $data = array(
            'breadcrumb' => $breadcrumb,
            'data' => $this->Main_m->get($this->_table,$where)->result(),
            'title' => "Detail ".$this->_mainTitle,
            'uri' => $this->uri->segment_array(),
            'folder' => $this->_folder,
        );

        $this->load->view('admin/partials/header');
        $this->load->view('admin/partials/content_sidebar');
        $this->load->view('admin/partials/content_navbar');
        $this->load->view('admin/'.$this->_folder.'/detail',$data);
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
                'tahun' => $_POST['tahun'],
                'nama_proyek' => $_POST['nama_proyek'],
                'tahun'=>$_POST['tahun'],
                'lokasi' => $_POST['lokasi'],
                'biaya_pemerintah' => $_POST['biaya_pemerintah'],
                'biaya_prov' => $_POST['biaya_prov'],
                'biaya_kab' => $_POST['biaya_kab'],
                'biaya_swadaya' => $_POST['biaya_swadaya'],
                'jumlah' => $_POST['jumlah'],
                'pelaksana' => $_POST['pelaksana'],
                'manfaat' => $_POST['manfaat'],
                'ket' => $_POST['ket'],
                'created_at' => date('Y-m-d H:i:s'),
                
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

    function edit($id){
            
        $this->breadcrumbcomponent->add('Home', base_url());
        $this->breadcrumbcomponent->add('Admin', base_url('admin')); 
        $this->breadcrumbcomponent->add($this->_mainTitle, base_url('admin/'.$this->_folder.'/')); 
        $this->breadcrumbcomponent->add('Edit', base_url('admin/'.$this->_folder.'/edit/'));
        $this->breadcrumbcomponent->add($id, base_url('admin/'.$this->_folder.'/edit/'.$id));

        $breadcrumb = $this->breadcrumbcomponent->output();
        $where = ['id'=>$id];
        $data = array(
            'breadcrumb' => $breadcrumb,
            'data' => $this->Main_m->get($this->_table,$where)->result(),
            'title' => "Edit ".$this->_mainTitle,
            'uri' => $this->uri->segment_array(),
            'folder' => $this->_folder,
        );

        $this->load->view('admin/partials/header');
        $this->load->view('admin/partials/content_sidebar');
        $this->load->view('admin/partials/content_navbar');
        $this->load->view('admin/'.$this->_folder.'/edit',$data);
        $this->load->view('admin/partials/content_footer');
        $this->load->view('admin/partials/footer');
    }

    public function update(){
        $validation = $this->form_validation;
        $validation->set_rules($this->rulesUpdate());
        if($validation->run()){
            $_POST = $this->input->post();
            $id = $_POST['id'];
            $where = ['id'=>$id];
            $data = array(
                'tahun' => $_POST['tahun'],
                'nama_proyek' => $_POST['nama_proyek'],
                'tahun'=>$_POST['tahun'],
                'lokasi' => $_POST['lokasi'],
                'biaya_pemerintah' => $_POST['biaya_pemerintah'],
                'biaya_prov' => $_POST['biaya_prov'],
                'biaya_kab' => $_POST['biaya_kab'],
                'biaya_swadaya' => $_POST['biaya_swadaya'],
                'jumlah' => $_POST['jumlah'],
                'pelaksana' => $_POST['pelaksana'],
                'manfaat' => $_POST['manfaat'],
                'ket' => $_POST['ket'],
                'updated_at' => date('Y-m-d H:i:s'),
                
            );
                       
            if($this->Main_m->update($data,$this->_table,$where)){
                $this->session->set_flashdata('success_message', 'Edit form berhasil, terimakasih');
                $callback = array(
                    'status' => 'success',
                    'message' => 'Data berhasil diupdate',
                    'redirect' => base_url().'admin/'.$this->_folder,
                );
            }
            else{
                $this->session->set_flashdata('error_message', 'Mohon maaf, pengisian form gagal');
                $callback = array(
                    'status' => 'error',
                    'message' => 'Mohon Maaf, Update data gagal disimpan',
                );
            }
        }
        else{
            $this->session->set_flashdata('error_message', validation_errors());
            $callback = array(
                'status' => 'error',
                'message' => validation_errors(),
            );          
        }
        echo json_encode($callback);
    }

    public function destroy(){
        $validation = $this->form_validation;
        $validation->set_rules($this->rulesDestroy());
        if($validation->run()){
            $_POST = $this->input->post();
            $rowdetele = $_POST['rowdelete'];
            $lastrow = count($rowdetele);
            $count = 1;
            $where = "";
            foreach($rowdetele as $r){
                if($count == $lastrow){
                    $where.= "id = ".$r;
                }
                else{
                    $where.= "id = ".$r." OR ";
                }
                $count++;
            }
            if($this->Main_m->destroy($this->_table,$where)){
                
                $this->session->set_flashdata('success_message', 'Delete form berhasil, terimakasih');
                $callback = array(
                    'status' => 'success',
                    'message' => 'Data berhasil dihapus',
                    'redirect' => base_url().'admin/'.$this->_folder,
                );
            }
            else{
                $this->session->set_flashdata('error_message', 'Mohon maaf, delete form gagal');
                $callback = array(
                    'status' => 'error',
                    'message' => 'Mohon Maaf, Pengisian form gagal',
                );
            }
        }
        else{
            $this->session->set_flashdata('error_message', validation_errors());
            $callback = array(
                'status' => 'error',
                'message' => validation_errors(),
                'redirect' => base_url().'admin/'.$this->_folder,
            );          
        }
        echo json_encode($callback);
    }

    function cetak(){
        $tahun = $this->input->post('tahun');
        $where = ['tahun'=>$tahun];
        $data=$this->Main_m->get($this->_table,$where)->result();
        echo var_dump($data);
    }

}