<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_kelahiran extends Admin_Controller{

    private $_table = 'form_kelahiran';
    private $_folder = 'form_kelahiran';
    private $_folderUpload = 'form_kelahiran';
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
            ['field' => 'id','label' => 'id','rules' => 'required'],
            ['field' => 'nama_anak', 'label' => 'Nama Anak', 'rules' => 'required'],
            ['field' => 'ke_anak', 'label' => 'Anak ke-', 'rules' => 'required'],
            ['field' => 'tempat_lahir_anak', 'label' => 'Tempat Lahir Anak', 'rules' => 'required'],
            ['field' => 'tanggal_lahir_anak', 'label' => 'Tanggal Lahir Anak', 'rules' => 'required'],
            ['field' => 'jenis_kelamin_anak', 'label' => 'Jenis Kelamin Anak', 'rules' => 'required'],
            ['field' => 'agama_anak', 'label' => 'Agama Anak', 'rules' => 'required'],
            ['field' => 'nik_ayah', 'label' => 'NIK Ayah', 'rules' => 'required|numeric|min_length[16]|max_length[16]'],
            ['field' => 'nama_ayah', 'label' => 'Nama Ayah', 'rules' => 'required'],
            ['field' => 'tempat_lahir_ayah', 'label' => 'Tempat Lahir Ayah', 'rules' => 'required'],
            ['field' => 'tanggal_lahir_ayah', 'label' => 'Tanggal Lahir Ayah', 'rules' => 'required'],
            ['field' => 'pekerjaan_ayah', 'label' => 'Pekerjaan Ayah', 'rules' => 'required'],
            ['field' => 'agama_ayah', 'label' => 'Agama Ayah', 'rules' => 'required'],
            ['field' => 'nik_ibu', 'label' => 'NIK Ibu', 'rules' => 'required|numeric|min_length[16]|max_length[16]'],
            ['field' => 'nama_ibu', 'label' => 'Nama Ibu', 'rules' => 'required'],
            ['field' => 'tempat_lahir_ibu', 'label' => 'Tempat Lahir Ibu', 'rules' => 'required'],
            ['field' => 'tanggal_lahir_ibu', 'label' => 'Tanggal Lahir Ibu', 'rules' => 'required'],
            ['field' => 'pekerjaan_ibu', 'label' => 'Pekerjaan Ibu', 'rules' => 'required'],
            ['field' => 'agama_ibu', 'label' => 'Agama Ibu', 'rules' => 'required'],
            ['field' => 'alamat', 'label' => 'Alamat', 'rules' => 'required'],
            ['field' => 'pekon', 'label' => 'Pekon', 'rules' => 'required'],
            ['field' => 'kecamatan', 'label' => 'Kecamatan', 'rules' => 'required'],
            ['field' => 'kabupaten', 'label' => 'Kabupaten', 'rules' => 'required'],
            ['field' => 'rt', 'label' => 'RT', 'rules' => 'required|numeric'],
            ['field' => 'rw', 'label' => 'RW', 'rules' => 'required|numeric'],
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

            $nik = $_POST['nik_ayah'];
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
        $template->setValue('nama_anak', $data->nama_anak);
        $template->setValue('tempat_lahir_anak', $data->tempat_lahir_anak);
        $template->setValue('tanggal_lahir_anak', longdate_indo($data->tanggal_lahir_anak));
        $template->setValue('jenis_kelamin_anak', $data->jenis_kelamin_anak);
        $template->setValue('agama_anak', $data->agama_anak);
        $template->setValue('ke_anak', $data->ke_anak);
        
        $template->setValue('nama_ayah', $data->nama_ayah);
        $template->setValue('nik_ayah', $data->nik_ayah);
        $template->setValue('tempat_lahir_ayah', $data->tempat_lahir_ayah);
        $template->setValue('tanggal_lahir_ayah', longdate_indo($data->tanggal_lahir_ayah));
        $template->setValue('agama_ayah', $data->agama_ayah);
        $template->setValue('pekerjaan_ayah', $data->pekerjaan_ayah);

        $template->setValue('nama_ibu', $data->nama_ibu);
        $template->setValue('nik_ibu', $data->nik_ibu);
        $template->setValue('tempat_lahir_ibu', $data->tempat_lahir_ibu);
        $template->setValue('tanggal_lahir_ibu', longdate_indo($data->tanggal_lahir_ibu));
        $template->setValue('agama_ibu', $data->agama_ibu);
        $template->setValue('pekerjaan_ibu', $data->pekerjaan_ibu);


        $template->setValue('alamat', $data->alamat);
        $template->setValue('rt', $data->rt);
        $template->setValue('rw', $data->rw);
        $template->setValue('pekon', $data->pekon);
        $template->setValue('kecamatan', $data->kecamatan);
        $template->setValue('kabupaten', $data->kabupaten);
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