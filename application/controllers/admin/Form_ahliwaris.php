<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_ahliwaris extends Admin_Controller{

    private $_table = 'form_ahliwaris';
    private $_folder = 'form_ahliwaris';
    private $_folderUpload = 'form_ahliwaris';
    private $_docxName = 'form_ahliwaris.docx';
    private $_mainTitle = 'Form Ahli Waris';

    function __construct()
	{
        parent::__construct();
        $this->load->model('Main_m');
        $this->load->library('breadcrumbcomponent'); 
    }    
    
    function rulesUpdate(){
        return [
            ['field' => 'id','label' => 'id','rules' => 'required'],
            ['field' => 'nik_1', 'label' => 'NIK Penerima Kuasa', 'rules' => 'required|numeric|min_length[16]|max_length[16]'],
            ['field' => 'nama_1', 'label' => 'Nama Penerima Kuasa', 'rules' => 'required'],
            ['field' => 'tempat_lahir_1', 'label' => 'Tempat Lahir Penerima Kuasa', 'rules' => 'required'],
            ['field' => 'tanggal_lahir_1', 'label' => 'Tanggal Lahir Penerima Kuasa', 'rules' => 'required'],
            ['field' => 'agama_1', 'label' => 'Agama Penerima Kuasa', 'rules' => 'required'],
            ['field' => 'pekerjaan_1', 'label' => 'Pekerjaan Penerima Kuasa', 'rules' => 'required'],
            ['field' => 'alamat_1', 'label' => 'Alamat Penerima Kuasa', 'rules' => 'required'],
            ['field' => 'rt_1', 'label' => 'RT Penerima Kuasa', 'rules' => 'required|numeric'],
            ['field' => 'rw_1', 'label' => 'RW Penerima Kuasa', 'rules' => 'required|numeric'],
            ['field' => 'pekon_1', 'label' => 'Pekon', 'rules' => 'required'],
            ['field' => 'kecamatan_1', 'label' => 'Kecamatan Penerima Kuasa', 'rules' => 'required'],
            ['field' => 'kabupaten_1', 'label' => 'Kabupaten Penerima Kuasa', 'rules' => 'required'],
            ['field' => 'nik_2', 'label' => 'NIK Pemberi Kuasa', 'rules' => 'required|min_length[16]|max_length[16]'],
            ['field' => 'nama_2', 'label' => 'Nama Pemberi Kuasa', 'rules' => 'required'],
            ['field' => 'tempat_lahir_2', 'label' => 'Tempat Lahir Pemberi Kuasa', 'rules' => 'required'],
            ['field' => 'tanggal_lahir_2', 'label' => 'Tanggal Lahir Pemberi Kuasa', 'rules' => 'required'],
            ['field' => 'agama_2', 'label' => 'Agama Pemberi Kuasa', 'rules' => 'required'],
            ['field' => 'pekerjaan_2', 'label' => 'Pekerjaan Pemberi Kuasa', 'rules' => 'required'],
            ['field' => 'alamat_2', 'label' => 'Alamat Pemberi Kuasa', 'rules' => 'required'],
            ['field' => 'rt_2', 'label' => 'RT Pemberi Kuasa', 'rules' => 'required|numeric'],
            ['field' => 'rw_2', 'label' => 'RW Pemberi Kuasa', 'rules' => 'required|numeric'],
            ['field' => 'pekon_2', 'label' => 'Pekon Pemberi Kuasa', 'rules' => 'required'],
            ['field' => 'kecamatan_2', 'label' => 'Kecamatan Pemberi Kuasa', 'rules' => 'required'],
            ['field' => 'kabupaten_2', 'label' => 'Kabupaten Pemberi Kuasa', 'rules' => 'required'],
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

            $nik = $_POST['nik_1'];
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
                'nik_1' => $_POST['nik_1'],
                'nama_1' => $_POST['nama_1'],
                'tempat_lahir_1' => $_POST['tempat_lahir_1'],
                'tanggal_lahir_1' => $_POST['tanggal_lahir_1'],
                'agama_1' => $_POST['agama_1'],
                'pekerjaan_1' => $_POST['pekerjaan_1'],
                'alamat_1' => $_POST['alamat_1'],
                'rt_1' => $_POST['rt_1'],
                'rw_1' => $_POST['rw_1'],
                'pekon_1' => $_POST['pekon_1'],
                'kecamatan_1' => $_POST['kecamatan_1'],
                'kabupaten_1' => $_POST['kabupaten_1'],
                'nik_2' => $_POST['nik_2'],
                'nama_2' => $_POST['nama_2'],
                'tempat_lahir_2' => $_POST['tempat_lahir_2'],
                'tanggal_lahir_2' => $_POST['tanggal_lahir_2'],
                'agama_2' => $_POST['agama_2'],
                'pekerjaan_2' => $_POST['pekerjaan_2'],
                'alamat_2' => $_POST['alamat_2'],
                'rt_2' => $_POST['rt_2'],
                'rw_2' => $_POST['rw_2'],
                'pekon_2' => $_POST['pekon_2'],
                'kecamatan_2' => $_POST['kecamatan_2'],
                'kabupaten_2' => $_POST['kabupaten_2'],
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
        $template->setValue('nama_1', $data->nama_1);
        $template->setValue('tempat_lahir_1', $data->tempat_lahir_1);
        $template->setValue('tanggal_lahir_1', longdate_indo($data->tanggal_lahir_1));
        $template->setValue('nik_1', $data->nik_1);
        $template->setValue('agama_1', $data->agama_1);
        $template->setValue('pekerjaan_1', $data->pekerjaan_1);
        $template->setValue('rt_1', $data->rt_1);
        $template->setValue('rt_1', $data->rt_1);
        $template->setValue('pekon_1', $data->pekon_1);
        $template->setValue('kecamatan_1', $data->kecamatan_1);
        $template->setValue('kabupaten_1', $data->kabupaten_1);
        $template->setValue('nama_2', $data->nama_2);
        $template->setValue('tempat_lahir_2', $data->tempat_lahir_2);
        $template->setValue('tanggal_lahir_2', longdate_indo($data->tanggal_lahir_2));
        $template->setValue('nik_2', $data->nik_2);
        $template->setValue('agama_2', $data->agama_2);
        $template->setValue('pekerjaan_2', $data->pekerjaan_2);
        $template->setValue('rt_2', $data->rt_2);
        $template->setValue('rt_2', $data->rt_2);
        $template->setValue('pekon_2', $data->pekon_2);
        $template->setValue('kecamatan_2', $data->kecamatan_2);
        $template->setValue('kabupaten_2', $data->kabupaten_2);
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