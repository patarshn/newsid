<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_ktp_kk extends Admin_Controller {

    private $_table = 'ktp_kk';
    private $_folder = 'buku_ktp_kk';
    private $_mainTitle = 'Buku Kartu Tanda Penduduk dan Kartu Keluarga';

    function __construct()
	{
        parent::__construct();
        $this->load->model('Main_m');
        $this->load->library('breadcrumbcomponent'); 
    }    

    function rulesStore() {
        return [
            ['field' => 'nik','label' => 'Nomor Induk Penduduk (NIK)', 'rules' => 'required'],
            ['field' => 'nkk','label' => 'Nomor Kartu Keluarga (KK)', 'rules' => 'required'],
            ['field' => 'tahun_ektp','label' => 'Tahun Dikeluarkannya E_KTP', 'rules' => 'required'],
            ['field' => 'nama','label' => 'Nama Lengkap', 'rules' => 'required'],
            ['field' => 'jenis_kelamin','label' => 'Jenis Kelamin', 'rules' => 'required'],
            ['field' => 'tempat_lahir','label' => 'Tempat Lahir', 'rules' => 'required'],
            ['field' => 'tanggal_lahir','label' => 'Tanggal Lahir', 'rules' => 'required'],
            ['field' => 'goldar','label' => 'Golongan Darah', 'rules' => 'required'],
            ['field' => 'agama','label' => 'Agama', 'rules' => 'required'],
            ['field' => 'pendidikan','label' => 'Pendidikan', 'rules' => 'required'],
            ['field' => 'pekerjaan','label' => 'Pekerjaan', 'rules' => 'required'],
            ['field' => 'alamat','label' => 'Alamat', 'rules' => 'required'],
            ['field' => 'rt','label' => 'RT', 'rules' => 'required'],
            ['field' => 'rw','label' => 'RW', 'rules' => 'required'],
            ['field' => 'dusun','label' => 'Nama Dusun', 'rules' => 'required'],
            ['field' => 'baca_huruf','label' => 'Dapat Membaca Huruf', 'rules' => 'required'],
            ['field' => 'status_perkawinan','label' => 'Status Perkawinan', 'rules' => 'required'],
            ['field' => 'tmpt_tgl_dikeluarkan','label' => 'Tempat dan Tanggal di Keluarkan E-KTP', 'rules' => 'required'],
            ['field' => 'hub_keluarga','label' => 'Hubungan Keluarga', 'rules' => 'required'],
            ['field' => 'kedudukan_dikeluarga','label' => 'Kedudukan di Keluarga', 'rules' => 'required'],
            ['field' => 'wn','label' => 'Kewarganegaraan', 'rules' => 'required'],
            ['field' => 'ayah','label' => 'Nama Ayah', 'rules' => 'required'],
            ['field' => 'ibu','label' => 'Nama Ibu', 'rules' => 'required'],
            ['field' => 'tgl_tinggal_desa','Tanggal Mulai Tinggal di Desa' => 'Tempat Lahir', 'rules' => 'required'],
            ['field' => 'ket','label' => 'Keterangan'],
           ];
    }
    
    function rulesUpdate(){
        return [
            ['field' => 'id','label' => 'id', 'rules' => 'required'],
            ['field' => 'nik','label' => 'Nomor Induk Penduduk (NIK)', 'rules' => 'required'],
            ['field' => 'nkk','label' => 'Nomor Kartu Keluarga (KK)', 'rules' => 'required'],
            ['field' => 'tahun_ektp','label' => 'Tahun Dikeluarkannya E_KTP', 'rules' => 'required'],
            ['field' => 'nama','label' => 'Nama Lengkap', 'rules' => 'required'],
            ['field' => 'jenis_kelamin','label' => 'Jenis Kelamin', 'rules' => 'required'],
            ['field' => 'tempat_lahir','label' => 'Tempat Lahir', 'rules' => 'required'],
            ['field' => 'tanggal_lahir','label' => 'Tanggal Lahir', 'rules' => 'required'],
            ['field' => 'goldar','label' => 'Golongan Darah', 'rules' => 'required'],
            ['field' => 'agama','label' => 'Agama', 'rules' => 'required'],
            ['field' => 'pendidikan','label' => 'Pendidikan', 'rules' => 'required'],
            ['field' => 'pekerjaan','label' => 'Pekerjaan', 'rules' => 'required'],
            ['field' => 'alamat','label' => 'Alamat', 'rules' => 'required'],
            ['field' => 'rt','label' => 'RT', 'rules' => 'required'],
            ['field' => 'rw','label' => 'RW', 'rules' => 'required'],
            ['field' => 'dusun','label' => 'Nama Dusun', 'rules' => 'required'],
            ['field' => 'baca_huruf','label' => 'Dapat Membaca Huruf', 'rules' => 'required'],
            ['field' => 'status_perkawinan','label' => 'Status Perkawinan', 'rules' => 'required'],
            ['field' => 'tmpt_tgl_dikeluarkan','label' => 'Tempat dan Tanggal di Keluarkan E-KTP', 'rules' => 'required'],
            ['field' => 'hub_keluarga','label' => 'Hubungan Keluarga', 'rules' => 'required'],
            ['field' => 'kedudukan_dikeluarga','label' => 'Kedudukan di Keluarga', 'rules' => 'required'],
            ['field' => 'wn','label' => 'Kewarganegaraan', 'rules' => 'required'],
            ['field' => 'ayah','label' => 'Nama Ayah', 'rules' => 'required'],
            ['field' => 'ibu','label' => 'Nama Ibu', 'rules' => 'required'],
            ['field' => 'tgl_tinggal_desa','Tanggal Mulai Tinggal di Desa' => 'Tempat Lahir', 'rules' => 'required'],
            ['field' => 'ket','label' => 'Keterangan'],
           ];
    }

    function rulesDestroy(){
        return [
            ['field' => 'rowdelete[]',
            'label' => 'rowdelete',
            'rules' => 'required']
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
                'nik' => $_POST['nik'],
                'nkk' => $_POST['nkk'],
                'tahun_ektp' => $_POST['tahun_ektp'],
                'nama' => $_POST['nama'],
                'jenis_kelamin' => $_POST['jenis_kelamin'],
                'status_perkawinan' => $_POST['status_perkawinan'],
                'tempat_lahir' => $_POST['tempat_lahir'],
                'tanggal_lahir' => $_POST['tanggal_lahir'],
                'goldar' => $_POST['goldar'],
                'agama' => $_POST['agama'],
                'pendidikan' => $_POST['pendidikan'],
                'pekerjaan' => $_POST['pekerjaan'],
                'tmpt_tgl_dikeluarkan' => $_POST['tmpt_tgl_dikeluarkan'],
                'wn' => $_POST['wn'],
                'alamat' => $_POST['alamat'],
                'rt' => $_POST['rt'],
                'rw' => $_POST['rw'],
                'dusun' => $_POST['dusun'],
                'baca_huruf' => $_POST['baca_huruf'],
                'hub_keluarga' => $_POST['hub_keluarga'],
                'kedudukan_dikeluarga' => $_POST['kedudukan_dikeluarga'],
                'ayah' => $_POST['ayah'],
                'ibu' => $_POST['ibu'],
                'tgl_tinggal_desa' => $_POST['tgl_tinggal_desa'],
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
                'nik' => $_POST['nik'],
                'nkk' => $_POST['nik'],
                'tahun_ektp' => $_POST['tahun_ektp'],
                'nama' => $_POST['nama'],
                'jenis_kelamin' => $_POST['jenis_kelamin'],
                'status_perkawinan' => $_POST['status_perkawinan'],
                'tempat_lahir' => $_POST['tempat_lahir'],
                'tanggal_lahir' => $_POST['tanggal_lahir'],
                'goldar' => $_POST['goldar'],
                'agama' => $_POST['agama'],
                'pendidikan' => $_POST['pendidikan'],
                'pekerjaan' => $_POST['pekerjaan'],
                'tmpt_tgl_dikeluarkan' => $_POST['tmpt_tgl_dikeluarkan'],
                'wn' => $_POST['wn'],
                'alamat' => $_POST['alamat'],
                'rt' => $_POST['rt'],
                'rw' => $_POST['rw'],
                'dusun' => $_POST['dusun'],
                'baca_huruf' => $_POST['baca_huruf'],
                'hub_keluarga' => $_POST['hub_keluarga'],
                'kedudukan_dikeluarga' => $_POST['kedudukan_dikeluarga'],
                'ayah' => $_POST['ayah'],
                'ibu' => $_POST['ibu'],
                'tgl_tinggal_desa' => $_POST['tgl_tinggal_desa'],
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



}