<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_kelahiran extends Admin_Controller{

    private $_table = 'form_kelahiran';
    private $_folder = 'form_kelahiran';
    private $_docxName = 'form_kelahiran.docx';
    private $_mainTitle = 'Form Kelahiran';

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
                'nama_anak' => $_POST['nama_anak'],
                'ke_anak' => $_POST['ke_anak'],
                'tempat_lahir_anak' => $_POST['tempat_lahir_anak'],
                'tanggal_lahir_anak' => $_POST['tanggal_lahir_anak'],
                'jenis_kelamin_anak' => $_POST['jenis_kelamin_anak'],
                'agama_anak' => $_POST['agama_anak'],
                'nik_ayah' => $_POST['nik_ayah'],
                'nama_ayah' => $_POST['nama_ayah'],
                'tempat_lahir_ayah' => $_POST['tempat_lahir_ayah'],
                'tanggal_lahir_ayah' => $_POST['tanggal_lahir_ayah'],
                'pekerjaan_ayah' => $_POST['pekerjaan_ayah'],
                'agama_ayah' => $_POST['agama_ayah'],
                'nik_ibu' => $_POST['nik_ibu'],
                'nama_ibu' => $_POST['nama_ibu'],
                'tempat_lahir_ibu' => $_POST['tempat_lahir_ibu'],
                'tanggal_lahir_ibu' => $_POST['tanggal_lahir_ibu'],
                'pekerjaan_ibu' => $_POST['pekerjaan_ibu'],
                'agama_ibu' => $_POST['agama_ibu'],
                'alamat' => $_POST['alamat'],
                'pekon' => $_POST['pekon'],
                'kecamatan' => $_POST['kecamatan'],
                'kabupaten' => $_POST['kabupaten'],
                'rt' => $_POST['rt'],
                'rw' => $_POST['rw'],
                'verif_lurah' => $_POST['verif_lurah'],                               
                'updated_by' => $this->session->userdata('username'),
                'updated_at' => date('Y-m-d H:i:s'),
            );

            if($_POST['verif_lurah'] != $_POST['verif_lurah_old']){
                $data['verif_lurah_at'] = date('Y-m-d H:i:s');
            }
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
        $template->setValue('nama_anak', $data->nama_anak);
        $template->setValue('tempat_lahir_anak', $data->tempat_lahir_anak);
        $template->setValue('tanggal_lahir_anak', $data->tanggal_lahir_anak);
        $template->setValue('jenis_kelamin_anak', $data->jenis_kelamin_anak);
        $template->setValue('agama_anak', $data->agama_anak);
        $template->setValue('ke_anak', $data->ke_anak);
        
        $template->setValue('nama_ayah', $data->nama_ayah);
        $template->setValue('nik_ayah', $data->nik_ayah);
        $template->setValue('tempat_lahir_ayah', $data->tempat_lahir_ayah);
        $template->setValue('tanggal_lahir_ayah', $data->tanggal_lahir_ayah);
        $template->setValue('agama_ayah', $data->agama_ayah);
        $template->setValue('pekerjaan_ayah', $data->pekerjaan_ayah);

        $template->setValue('nama_ibu', $data->nama_ibu);
        $template->setValue('nik_ibu', $data->nik_ibu);
        $template->setValue('tempat_lahir_ibu', $data->tempat_lahir_ibu);
        $template->setValue('tanggal_lahir_ibu', $data->tanggal_lahir_ibu);
        $template->setValue('agama_ibu', $data->agama_ibu);
        $template->setValue('pekerjaan_ibu', $data->pekerjaan_ibu);


        $template->setValue('alamat', $data->alamat);
        $template->setValue('rt', $data->rt);
        $template->setValue('rw', $data->rw);
        $template->setValue('pekon', $data->pekon);
        $template->setValue('kecamatan', $data->kecamatan);
        $template->setValue('kabupaten', $data->kabupaten);
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