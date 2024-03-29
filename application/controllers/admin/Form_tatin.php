<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_tatin extends Admin_Controller{

    private $_table = 'form_tatin';
    private $_folder = 'form_tatin';
    private $_folderUpload = 'form_tatin';
    private $_docxName = 'form_tatin.docx';
    private $_mainTitle = 'Form Keterangan Imunisasi';

    function __construct()
	{
        parent::__construct();
        $this->load->model('Main_m');
        $this->load->library('breadcrumbcomponent'); 
    }    
    
    function rulesUpdate(){
        return [
            ['field' => 'id','label' => 'id','rules' => 'required'],
            ['field' => 'nik_p', 'label' => 'NIK Istri', 'rules' => 'required|numeric|min_length[16]|max_length[16]'],
            ['field' => 'nama_p', 'label' => 'Nama Istri', 'rules' => 'required'],
            ['field' => 'tempat_lahir_p', 'label' => 'Tempat Lahir Istri', 'rules' => 'required'],
            ['field' => 'tanggal_lahir_p', 'label' => 'Tanggal Lahir Istri', 'rules' => 'required'],
            ['field' => 'binbinti_p', 'label' => 'Bin/Binti Istri', 'rules' => 'required'],
            ['field' => 'pekerjaan_p', 'label' => 'Pekerjaan Istri', 'rules' => 'required'],
            ['field' => 'alamat_p', 'label' => 'Alamat Istri', 'rules' => 'required'],
            ['field' => 'rt_p', 'label' => 'RT Istri', 'rules' => 'required|numeric'],
            ['field' => 'rw_p', 'label' => 'RW Istri', 'rules' => 'required|numeric'],
            ['field' => 'pekon_p', 'label' => 'Pekon Istri', 'rules' => 'required'],
            ['field' => 'kecamatan_p', 'label' => 'Kecamatan Istri', 'rules' => 'required'],
            ['field' => 'kabupaten_p', 'label' => 'Kabupaten Istri', 'rules' => 'required'],
            ['field' => 'nik_l', 'label' => 'NIK Suami', 'rules' => 'required|numeric|min_length[16]|max_length[16]'],
            ['field' => 'nama_l', 'label' => 'Nama Suami', 'rules' => 'required'],
            ['field' => 'tempat_lahir_l', 'label' => 'Tempat Lahir Suami', 'rules' => 'required'],
            ['field' => 'tanggal_lahir_l', 'label' => 'Tanggal Lahir Suami', 'rules' => 'required'],
            ['field' => 'binbinti_l', 'label' => 'Bin/Binti Suami', 'rules' => 'required'],
            ['field' => 'pekerjaan_l', 'label' => 'Pekerjaan Suami', 'rules' => 'required'],
            ['field' => 'alamat_l', 'label' => 'Alamat Suami', 'rules' => 'required'],
            ['field' => 'rt_l', 'label' => 'RT Suami', 'rules' => 'required|numeric'],
            ['field' => 'rw_l', 'label' => 'RW Suami', 'rules' => 'required|numeric'],
            ['field' => 'pekon_l', 'label' => 'Pekon Suami', 'rules' => 'required'],
            ['field' => 'kecamatan_l', 'label' => 'Kecamatan Suami', 'rules' => 'required'],
            ['field' => 'kabupaten_l', 'label' => 'Kabupaten Suami', 'rules' => 'required'],  
            ['field' => 'notelp', 'label' => 'No Telp/WA', 'rules' => 'required|numeric'],
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

            $nik = $_POST['nik_p'];
            if(!empty($_FILES["file_ktp"]["name"])){
                $upload_path = "./uploads/".$this->_folderUpload."/"; //lokasi upload
                $file_name = 'ktp_'.$nik.'_'.date('YmdHis').'_'.uniqid();
                $berkas_tmp = $this->upload_image('file_ktp',$upload_path,$file_name);
                if(!$berkas_tmp){
                    $callback = array(
                        'status' => 'error',
                        'message' => 'Mohon Maaf, file ktp gagal diupload <br>'.$this->upload->display_errors(),
                    );
                    echo json_encode($callback);
                    exit;
                }
                $berkas['file_ktp'] = $berkas_tmp;
                if(!$this->destroy_file_json($where,'file_ktp')){
                    $berkas['file_ktp'] = $_POST['file_kk_old'];
                }
            }
            else{
                $berkas['file_ktp'] = $_POST['file_ktp_old'];
            }
            

            if(!empty($_FILES["file_kk"]["name"])){
                $upload_path = "./uploads/".$this->_folderUpload."/"; //lokasi upload
                $file_name = 'kk_'.$nik.'_'.date('YmdHis').'_'.uniqid();
                $berkas_tmp = $this->upload_image('file_kk',$upload_path,$file_name);
                if(!$berkas_tmp){
                    $callback = array(
                        'status' => 'error',
                        'message' => 'Mohon Maaf, file kk gagal diupload <br>'.$this->upload->display_errors(),
                    );
                    echo json_encode($callback);
                    exit;
                }
                $berkas['file_kk'] = $berkas_tmp;
                if(!$this->destroy_file_json($where,'file_kk')){
                    $berkas['file_kk'] = $_POST['file_kk_old'];
                }
            }
            else{
                $berkas['file_kk'] = $_POST['file_kk_old'];
            }

            $data = array(
                'id' => $_POST['id'],
                'nik_p' => $_POST['nik_p'],
                'nama_p' => $_POST['nama_p'],
                'tempat_lahir_p' => $_POST['tempat_lahir_p'],
                'tanggal_lahir_p' => $_POST['tanggal_lahir_p'],
                'binbinti_p' => $_POST['binbinti_p'],
                'pekerjaan_p' => $_POST['pekerjaan_p'],
                'alamat_p' => $_POST['alamat_p'],
                'rt_p' => $_POST['rt_p'],
                'rw_p' => $_POST['rw_p'],
                'pekon_p' => $_POST['pekon_p'],
                'kecamatan_p' => $_POST['kecamatan_p'],
                'kabupaten_p' => $_POST['kabupaten_p'],
                'nik_l' => $_POST['nik_l'],
                'nama_l' => $_POST['nama_l'],
                'tempat_lahir_l' => $_POST['tempat_lahir_l'],
                'tanggal_lahir_l' => $_POST['tanggal_lahir_l'],
                'binbinti_l' => $_POST['binbinti_l'],
                'pekerjaan_l' => $_POST['pekerjaan_l'],
                'alamat_l' => $_POST['alamat_l'],
                'rt_l' => $_POST['rt_l'],
                'rw_l' => $_POST['rw_l'],
                'pekon_l' => $_POST['pekon_l'],
                'kecamatan_l' => $_POST['kecamatan_l'],
                'kabupaten_l' => $_POST['kabupaten_l'],
                'verif_lurah' => $_POST['verif_lurah'],                                           
                'updated_by' => $this->session->userdata('username'),
                'updated_at' => date('Y-m-d H:i:s'),
                'berkas' => json_encode($berkas),
                'notelp' => $this->notelp($_POST['notelp']),
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
            if (!$this->destroy_file_json($where)) {
                $callback = array(
                    'status' => 'error',
                    'message' => 'Mohon Maaf, Pengisian file gagal dihapus',
                );
                echo json_encode($callback);
                exit;
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

    
    public function setuju(){
        $validation = $this->form_validation;
        $validation->set_rules($this->rulesDestroy());
        if($validation->run()){
            $_POST = $this->input->post();
            $where = $_POST['rowdelete'];
            $data = array(              
                'verif_lurah' => "Disetujui",                             
                'updated_by' => $this->session->userdata('username'),
                'updated_at' => date('Y-m-d H:i:s'),
                'verif_lurah_at' => date('Y-m-d H:i:s'),
            );

            if($this->Main_m->setuju($data,$this->_table,$where)){
                $this->session->set_flashdata('success_message', 'Setujui data berhasil, terimakasih');
                $callback = array(
                    'status' => 'success',
                    'message' => 'Data berhasil diupdate',
                    'redirect' => base_url().'admin/'.$this->_folder,
                );
            }
            else{
                $this->session->set_flashdata('error_message', 'Mohon maaf, Penyetujuan data gagal');
                $callback = array(
                    'status' => 'error',
                    'message' => 'Mohon Maaf, Penyetujuan data gagal',
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

    public function tolak(){
        $validation = $this->form_validation;
        $validation->set_rules($this->rulesDestroy());
        if($validation->run()){
            $_POST = $this->input->post();
            $where = $_POST['rowdelete'];
            $data = array(              
                'verif_lurah' => "Ditolak",                             
                'updated_by' => $this->session->userdata('username'),
                'updated_at' => date('Y-m-d H:i:s'),
                'verif_lurah_at' => date('Y-m-d H:i:s'),
            );

            if($this->Main_m->setuju($data,$this->_table,$where)){
                $this->session->set_flashdata('success_message', 'Tolak data berhasil, terimakasih');
                $callback = array(
                    'status' => 'success',
                    'message' => 'Data berhasil diupdate',
                    'redirect' => base_url().'admin/'.$this->_folder,
                );
            }
            else{
                $this->session->set_flashdata('error_message', 'Mohon maaf, Tolak data gagal');
                $callback = array(
                    'status' => 'error',
                    'message' => 'Mohon Maaf, Tolak data gagal',
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

    function cetak($id){
        $where = ['id'=>$id];
        $data = $this->Main_m->get($this->_table,$where)->row();
        $today = date('Y-m-d');
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $template = $phpWord->loadTemplate('./assets/form/'.$this->_docxName);
        $template->setValue('nama_l', $data->nama_l);
        #$template->setValue('nik_l', $data->nik_l);
        $template->setValue('tempat_lahir_l', $data->tempat_lahir_l);
        $template->setValue('tanggal_lahir_l', longdate_indo($data->tanggal_lahir_l));
        $template->setValue('binbinti_l', $data->binbinti_l);
        #$template->setValue('jenis_kelamin_l', $data->jenis_kelamin_l);
        #$template->setValue('kewarganegaraan_l', $data->kewarganegaraan_l);
        #$template->setValue('agama_l', $data->agama_l);
        #$template->setValue('golongan_darah_l', $data->golongan_darah_l);
        #$template->setValue('status_perkawinan_l', $data->status_perkawinan_l);
        $template->setValue('pekerjaan_l', $data->pekerjaan_l);
        #$template->setValue('alamat', $data->alamat_l);
        $template->setValue('rt_l', $data->rt_l);
        $template->setValue('rw_l', $data->rw_l);
        $template->setValue('pekon_l', $data->pekon_l);
        $template->setValue('kecamatan_l', $data->kecamatan_l);
        $template->setValue('kabupaten_l', $data->kabupaten_l);

        $template->setValue('nama_p', $data->nama_p);
        #$template->setValue('nik_p', $data->nik_p);
        $template->setValue('tempat_lahir_p', $data->tempat_lahir_p);
        $template->setValue('tanggal_lahir_p', longdate_indo($data->tanggal_lahir_p));
        $template->setValue('binbinti_p', $data->binbinti_p);
        #$template->setValue('jenis_kelamin_p', $data->jenis_kelamin_p);
        #$template->setValue('kewarganegaraan_p', $data->kewarganegaraan_p);
        #$template->setValue('agama_p', $data->agama_p);
        #$template->setValue('golongan_darah_p', $data->golongan_darah_p);
        #$template->setValue('status_perkawinan_p', $data->status_perkawinan_p);
        $template->setValue('pekerjaan_p', $data->pekerjaan_p);
        #$template->setValue('alamat', $data->alamat_p);
        $template->setValue('rt_p', $data->rt_p);
        $template->setValue('rw_p', $data->rw_p);
        $template->setValue('pekon_p', $data->pekon_p);
        $template->setValue('kecamatan_p', $data->kecamatan_p);
        $template->setValue('kabupaten_p', $data->kabupaten_p);

        $template->setValue('today', longdate_indo($today));
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

    

    protected function destroy_file_json($where,$file_json_key = NULL) {
        $berkas_id =  $this->Main_m->get($this->_table,$where)->result();
        foreach ($berkas_id as $b_id) {
            if($file_json_key == NULL){
                $berkas = json_decode($b_id->berkas);
                if($b_id->berkas == NULL OR $b_id->berkas == "") continue;
                foreach($berkas as $b){
                    if(file_exists(FCPATH."uploads/".$this->_folder."/".$b)){
                        if (!unlink(FCPATH."uploads/".$this->_folder."/".$b)) {
                            continue;
                        }
                    }
                    
                }   
            }
            else{
                $berkas = json_decode($b_id->berkas,true);
                if($berkas[$file_json_key] == ""){
                    continue;
                }
                if(file_exists(FCPATH."uploads/".$this->_folder."/".$berkas[$file_json_key])){
                    if (!unlink(FCPATH."uploads/".$this->_folder."/".$berkas[$file_json_key])) {
                        return false;
                    }
                }
            }
        }
        return true;
    }

}