<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_tidakmampu extends Admin_Controller{

    private $_table = 'form_tidakmampu';
    private $_folder = 'form_tidakmampu';
    private $_docxName = 'form_tidakmampu.docx';
    private $_mainTitle = 'Form Keterangan Tidak Mampu';

    function __construct()
	{
        parent::__construct();
        $this->load->model('Main_m');
        $this->load->library('breadcrumbcomponent'); 
    }    
    
    function rulesUpdate(){
        return [
            ['field' => 'id',
            'label' => 'id',
            'rules' => 'required'],
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
                'id' => $_POST['id'],
                'nik_orangtua' => $_POST['nik_orangtua'],
                'nama_orangtua' => $_POST['nama_orangtua'],
                'tempat_lahir_orangtua' => $_POST['tempat_lahir_orangtua'],
                'tanggal_lahir_orangtua' => $_POST['tanggal_lahir_orangtua'],
                'kewarganegaraan_orangtua' => $_POST['kewarganegaraan_orangtua'],
                'agama_orangtua' => $_POST['agama_orangtua'],
                'pekerjaan_orangtua' => $_POST['pekerjaan_orangtua'],
                'nik_anak' => $_POST['nik_anak'],
                'nama_anak' => $_POST['nama_anak'],
                'tempat_lahir_anak' => $_POST['tempat_lahir_anak'],
                'tanggal_lahir_anak' => $_POST['tanggal_lahir_anak'],
                'kewarganegaraan_anak' => $_POST['kewarganegaraan_anak'],
                'agama_anak' => $_POST['agama_anak'],
                'pekerjaan_anak' => $_POST['pekerjaan_anak'],
                'alamat' => $_POST['alamat'],
                'rt' => $_POST['rt'],
                'rw' => $_POST['rw'],
                'pekon' => $_POST['pekon'],
                'kecamatan' => $_POST['kecamatan'],
                'kabupaten' => $_POST['kabupaten'],
                'persyaratan' => $_POST['persyaratan'],                
                'verif_lurah' => $_POST['verif_lurah'],                
                'updated_by' => $this->session->userdata('username'),
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
                    'message' => 'Mohon Maaf, Pengisian form gagal',
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

    function cetak($id){
        $where = ['id'=>$id];
        $data = $this->Main_m->get($this->_table,$where)->row();
        $today = date('Y-m-d');
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $template = $phpWord->loadTemplate('./assets/form/'.$this->_docxName);
        $template->setValue('nama', $data->nama);
        $template->setValue('nik', $data->nik);
        $template->setValue('tempat_lahir', $data->tempat_lahir);
        $template->setValue('tanggal_lahir', $data->tanggal_lahir);
        $template->setValue('jenis_kelamin', $data->jenis_kelamin);
        $template->setValue('kewarganegaraan', $data->kewarganegaraan);
        $template->setValue('agama', $data->agama);
        $template->setValue('golongan_darah', $data->golongan_darah);
        $template->setValue('status_perkawinan', $data->status_perkawinan);
        $template->setValue('pekerjaan', $data->pekerjaan);
        $template->setValue('alamat', $data->alamat);
        $template->setValue('rt', $data->rt);
        $template->setValue('rw', $data->rw);
        $template->setValue('pekon', $data->pekon);
        $template->setValue('kecamatan', $data->kecamatan);
        $template->setValue('masa_berlaku', $data->masa_berlaku);
        $template->setValue('today', $today);
        $temp_filename = $this->_docxName;
        $template->saveAs($temp_filename);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.$temp_filename);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($temp_filename));
        flush();
        readfile($temp_filename);
        unlink($temp_filename);
        exit;    
    }

}