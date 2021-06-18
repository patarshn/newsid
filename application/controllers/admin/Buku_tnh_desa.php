<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

class Buku_tnh_desa extends Admin_Controller {

    private $_table = 'buku_tnh_desa';
    private $_folder = 'buku_tnh_desa';
    private $_mainTitle = 'Buku Tanah Di Desa';
    private $_exelName = 'buku_tnh_desa.xls';

    function __construct() {
        parent::__construct();
        $this->load->model('Main_m');
        $this->load->library('breadcrumbcomponent');
        
    }

    function rulesStore() {
        return [
            ['field' => 'nama_perorangan_bdn_hkm','label' => 'Nama Perorangan/Badan Hukum', 'rules' => 'required'],
            ['field' => 'jml','label' => 'Jumlah', 'rules' => 'required'],
            ['field' => 'sdh_serti_hm','label' => 'Luas Hak Milik', 'rules' => 'required'],
            ['field' => 'sdh_serti_hgb','label' => 'Luas Hak Guna Bangunan', 'rules' => 'required'],
            ['field' => 'sdh_serti_hp','label' => 'Luas Hak Pakai', 'rules' => 'required'],
            ['field' => 'sdh_serti_hgu','label' => 'Luas Hak Guna Usaha', 'rules' => 'required'],
            ['field' => 'sdh_serti_hpl','label' => 'Luas Hak Pengelolaan', 'rules' => 'required'],
            ['field' => 'blm_serti_ma','label' => 'Luas Hak Milik Adat', 'rules' => 'required'],
            ['field' => 'blm_serti_vi','label' => 'Luas Hak Verponding Indonesia', 'rules' => 'required'],
            ['field' => 'blm_serti_tn','label' => 'Luas Tanah Negara', 'rules' => 'required'],
            ['field' => 'non_pertanian_perumahan','label' => 'Luas Perumahan', 'rules' => 'required'],
            ['field' => 'non_pertanian_dagang_jasa','label' => 'Luas Perdagangan dan Jasa', 'rules' => 'required'],
            ['field' => 'non_pertanian_kantor','label' => 'Luas Perkantoran', 'rules' => 'required'],
            ['field' => 'non_pertanian_industri','label' => 'Luas Industri', 'rules' => 'required'],
            ['field' => 'non_pertanian_fasilitas_umum','label' => 'Luas Fasilitas Umum', 'rules' => 'required'],
            ['field' => 'pertanian_sawah','label' => 'Luas Sawah', 'rules' => 'required'],
            ['field' => 'pertanian_tegalan','label' => 'Luas Tegalan', 'rules' => 'required'],
            ['field' => 'pertanian_kebun','label' => 'Luas Perkebunan', 'rules' => 'required'],
            ['field' => 'pertanian_ternak','label' => 'Luas Peternakan/Perikanan', 'rules' => 'required'],
            ['field' => 'pertanian_hutan','label' => 'Luas Hutan Belukar', 'rules' => 'required'],
            ['field' => 'pertanian_hutan_lindung','label' => 'Luas Hutan Lebat/Lindung', 'rules' => 'required'],
            ['field' => 'pertanian_tanah_kosong','label' => 'Luas Tanah Kosong', 'rules' => 'required'],
            ['field' => 'pertanian_lain','label' => 'Luas Tanah Untuk Lain-Lain', 'rules' => 'required'],
        ];
    }

    function rulesUpdate() {
        return [
            ['field' => 'nama_perorangan_bdn_hkm','label' => 'Nama Perorangan/Badan Hukum', 'rules' => 'required'],
            ['field' => 'jml','label' => 'Jumlah', 'rules' => 'required'],
            ['field' => 'sdh_serti_hm','label' => 'Luas Hak Milik', 'rules' => 'required'],
            ['field' => 'sdh_serti_hgb','label' => 'Luas Hak Guna Bangunan', 'rules' => 'required'],
            ['field' => 'sdh_serti_hp','label' => 'Luas Hak Pakai', 'rules' => 'required'],
            ['field' => 'sdh_serti_hgu','label' => 'Luas Hak Guna Usaha', 'rules' => 'required'],
            ['field' => 'sdh_serti_hpl','label' => 'Luas Hak Pengelolaan', 'rules' => 'required'],
            ['field' => 'blm_serti_ma','label' => 'Luas Hak Milik Adat', 'rules' => 'required'],
            ['field' => 'blm_serti_vi','label' => 'Luas Hak Verponding Indonesia', 'rules' => 'required'],
            ['field' => 'blm_serti_tn','label' => 'Luas Tanah Negara', 'rules' => 'required'],
            ['field' => 'non_pertanian_perumahan','label' => 'Luas Perumahan', 'rules' => 'required'],
            ['field' => 'non_pertanian_dagang_jasa','label' => 'Luas Perdagangan dan Jasa', 'rules' => 'required'],
            ['field' => 'non_pertanian_kantor','label' => 'Luas Perkantoran', 'rules' => 'required'],
            ['field' => 'non_pertanian_industri','label' => 'Luas Industri', 'rules' => 'required'],
            ['field' => 'non_pertanian_fasilitas_umum','label' => 'Luas Fasilitas Umum', 'rules' => 'required'],
            ['field' => 'pertanian_sawah','label' => 'Luas Sawah', 'rules' => 'required'],
            ['field' => 'pertanian_tegalan','label' => 'Luas Tegalan', 'rules' => 'required'],
            ['field' => 'pertanian_kebun','label' => 'Luas Perkebunan', 'rules' => 'required'],
            ['field' => 'pertanian_ternak','label' => 'Luas Peternakan/Perikanan', 'rules' => 'required'],
            ['field' => 'pertanian_hutan','label' => 'Luas Hutan Belukar', 'rules' => 'required'],
            ['field' => 'pertanian_hutan_lindung','label' => 'Luas Hutan Lebat/Lindung', 'rules' => 'required'],
            ['field' => 'pertanian_tanah_kosong','label' => 'Luas Tanah Kosong', 'rules' => 'required'],
            ['field' => 'pertanian_lain','label' => 'Luas Tanah Untuk Lain-Lain', 'rules' => 'required'],
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

            if(!empty($_FILES["berkas"]["name"])){
                $berkas = $this->upload_file();
                if(!$berkas){
                    
                    $callback = array(
                        'status' => 'error',
                        'message' => $this->upload->display_errors(),
                    );
                    echo json_encode($callback);
                    exit;
                }
            }
            else{
                $berkas = "";
            }

                $_POST = $this->input->post();
                $data = array(
                    'nama_perorangan_bdn_hkm' => $_POST['nama_perorangan_bdn_hkm'],
                    'jml' => $_POST['jml'],
                    'sdh_serti_hm' => $_POST['sdh_serti_hm'],
                    'sdh_serti_hgb' => $_POST['sdh_serti_hgb'],
                    'sdh_serti_hp' => $_POST['sdh_serti_hp'],
                    'sdh_serti_hgu' => $_POST['sdh_serti_hgu'],
                    'sdh_serti_hpl' => $_POST['sdh_serti_hpl'],
                    'blm_serti_ma' => $_POST['blm_serti_ma'],
                    'blm_serti_vi' => $_POST['blm_serti_vi'],
                    'blm_serti_tn' => $_POST['blm_serti_tn'],
                    'non_pertanian_perumahan' => $_POST['non_pertanian_perumahan'],
                    'non_pertanian_dagang_jasa' => $_POST['non_pertanian_dagang_jasa'],
                    'non_pertanian_kantor' => $_POST['non_pertanian_kantor'],
                    'non_pertanian_industri' => $_POST['non_pertanian_industri'],
                    'non_pertanian_fasilitas_umum' => $_POST['non_pertanian_fasilitas_umum'],
                    'pertanian_sawah' => $_POST['pertanian_sawah'],
                    'pertanian_tegalan' => $_POST['pertanian_tegalan'],
                    'pertanian_kebun' => $_POST['pertanian_kebun'],
                    'pertanian_ternak' => $_POST['pertanian_ternak'],
                    'pertanian_hutan' => $_POST['pertanian_hutan'],
                    'pertanian_hutan_lindung' => $_POST['pertanian_hutan_lindung'],
                    'pertanian_mutasi' => $_POST['pertanian_mutasi'],
                    'pertanian_tanah_kosong' => $_POST['pertanian_tanah_kosong'],
                    'pertanian_lain' => $_POST['pertanian_lain'],
                    'ket' => $_POST['ket'],
                    'berkas' => $berkas,
                    'ver_kepala_desa' => "Pending",
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
            
            //jika ada file yang baru
            if(!empty($_FILES["berkas"]["name"])){
                $berkas = $this->upload_file();
                if(!$berkas){
                    $callback = array(
                        'status' => 'error',
                        'message' => $this->upload->display_errors(),
                    );
                    echo json_encode($callback);
                    exit;
                }
                $berkas_lama = $this->destroy_file($where);
            }

            //jika tidak ada file baru
            else {
                $berkas = $_POST["old_file"];
            }

            $data = array(
                'nama_perorangan_bdn_hkm' => $_POST['nama_perorangan_bdn_hkm'],
                'jml' => $_POST['jml'],
                'sdh_serti_hm' => $_POST['sdh_serti_hm'],
                'sdh_serti_hgb' => $_POST['sdh_serti_hgb'],
                'sdh_serti_hp' => $_POST['sdh_serti_hp'],
                'sdh_serti_hgu' => $_POST['sdh_serti_hgu'],
                'sdh_serti_hpl' => $_POST['sdh_serti_hpl'],
                'blm_serti_ma' => $_POST['blm_serti_ma'],
                'blm_serti_vi' => $_POST['blm_serti_vi'],
                'blm_serti_tn' => $_POST['blm_serti_tn'],
                'non_pertanian_perumahan' => $_POST['non_pertanian_perumahan'],
                'non_pertanian_dagang_jasa' => $_POST['non_pertanian_dagang_jasa'],
                'non_pertanian_kantor' => $_POST['non_pertanian_kantor'],
                'non_pertanian_industri' => $_POST['non_pertanian_industri'],
                'non_pertanian_fasilitas_umum' => $_POST['non_pertanian_fasilitas_umum'],
                'pertanian_sawah' => $_POST['pertanian_sawah'],
                'pertanian_tegalan' => $_POST['pertanian_tegalan'],
                'pertanian_kebun' => $_POST['pertanian_kebun'],
                'pertanian_ternak' => $_POST['pertanian_ternak'],
                'pertanian_hutan' => $_POST['pertanian_hutan'],
                'pertanian_hutan_lindung' => $_POST['pertanian_hutan_lindung'],
                'pertanian_mutasi' => $_POST['pertanian_mutasi'],
                'pertanian_tanah_kosong' => $_POST['pertanian_tanah_kosong'],
                'pertanian_lain' => $_POST['pertanian_lain'],
                'ket' => $_POST['ket'],
                'berkas' => $berkas,
                'ver_kepala_desa' => $_POST['ver_kepala_desa'], 
                'updated_by' => $this->session->userdata('username'),
                'updated_at' => date('Y-m-d H:i:s'),
                
            );

            if($_POST['ver_kepala_desa'] != $_POST['ver_kepala_desa_old']){
                $data['ver_kepala_desa_at'] = date('Y-m-d H:i:s');
            }

            if($this->Main_m->update($data,$this->_table,$where)){
                $this->session->set_flashdata('success_message', 'Pengisian form berhasil, terimakasih');
                $callback = array(
                    'status' => 'success',
                    'message' => 'Data berhasil diinput',
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

            if (!$this->destroy_file($where)) {
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
        if ($validation->run()) {
            $_POST = $this->input->post();
            $where = $_POST['rowdelete'];
            $data = array(              
                'ver_kepala_desa' => "Disetujui",                             
                'updated_by' => $this->session->userdata('username'),
                'updated_at' => date('Y-m-d H:i:s'),
                'ver_kepala_desa_at' => date('Y-m-d H:i:s'),
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
                'ver_kepala_desa' => "Ditolak",                             
                'updated_by' => $this->session->userdata('username'),
                'updated_at' => date('Y-m-d H:i:s'),
                'ver_kepala_desa_at' => date('Y-m-d H:i:s'),
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

    public function upload_file(){
        $config['upload_path']      = "./uploads/".$this->_folder."/"; //lokasi
        $config['allowed_types']    = 'pdf'; //file dizinka
        $config['file_name']        = $this->_folder.uniqid();
        $config['overwrite']        = true;
        $config['max_size']         = 2000; // 2MB

        $this->load->library('upload',$config);

        if ($this->upload->do_upload('berkas')) {
            return $this->upload->data("file_name");
        }
        else{
            return false;
        }    
    }

    private function destroy_file($id) {
        $berkas_id =  $this->Main_m->get($this->_table,$id)->result();  
        foreach ($berkas_id as $b_id) {
            
            if(empty($b_id->berkas)){
                return true;
            }

            if (!file_exists(FCPATH."uploads/".$this->_folder."/".$b_id->berkas)){
                return true;
            }

            if (!unlink(FCPATH."uploads/".$this->_folder."/".$b_id->berkas)) {
                return false;
            }
            
        }
        return true;
    }

    public function cetak(){
        $reader = IOFactory::createReader('Xls');
        $spreadsheet = $reader->load('./assets/buku_adm_umum/'.$this->_exelName);
        $data = $this->Main_m->get($this->_table,null)->result();
        $values = array();
        $i = 0;
        $no = 1;
        foreach($data as $d){
            $subvalues = array(
                $no++,
                $d->nama_perorangan_bdn_hkm,
                $d->jml,
                $d->sdh_serti_hm,
                $d->sdh_serti_hgb,
                $d->sdh_serti_hp,
                $d->sdh_serti_hgu,
                $d->sdh_serti_hpl,
                $d->blm_serti_ma,
                $d->blm_serti_vi,
                $d->blm_serti_tn,
                $d->non_pertanian_perumahan,
                $d->non_pertanian_dagang_jasa,
                $d->non_pertanian_kantor,
                $d->non_pertanian_industri,
                $d->non_pertanian_fasilitas_umum,
                $d->pertanian_sawah,
                $d->pertanian_tegalan,
                $d->pertanian_kebun,
                $d-> pertanian_ternak,
                $d->pertanian_hutan,
                $d->pertanian_hutan_lindung,
                $d->pertanian_mutasi,
                $d->pertanian_tanah_kosong,
                $d->pertanian_lain,
                $d->ket
            );
            $values[] = $subvalues;
            $i++;
        }

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->fromArray(
            $values,
            NULL,
            'A9'
        );

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,  
                ],
            ],
        ];

        $i = $i + 8;

        $sheet->getStyle('A9:Z'.$i)->applyFromArray($styleArray);
        $sheet->getStyle('A9:Z'.$i)->getAlignment()->setWrapText(true);
        $sheet->getStyle('A9:Z'.$i)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
        $sheet->getStyle('A9:Z'.$i)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        // foreach(range('A7','J') as $columnID) {
        //     $sheet->getColumnDimension($columnID)->setAutoSize(true);
        // }
        for($r = 9;$r <= $i;$r++){
            $sheet->getRowDimension((string)$r)->setRowHeight(-1);
        }
        $writer = new Xls($spreadsheet);

        $filename = $this->_exelName;

        header('Content-Description: File Transfer');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename='.$filename);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        $writer->save('php://output');
    }
}
?>