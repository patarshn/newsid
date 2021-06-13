<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_data_inventaris_bpd extends Admin_Controller {

    private $_table = 'buku_data_inventaris_bpd';
    private $_folder = 'buku_data_inventaris_bpd';
    private $_mainTitle = 'Buku Data Inventaris BPD';
    private $_docxName = 'buku_data_inventaris_bpd.docx';

    function __construct() {
        parent::__construct();
        $this->load->model('Main_m');
        $this->load->library('breadcrumbcomponent');
        
    }

    function rulesStore() {
        return [
            ['field' => 'jenis_brng_bangunan','label' => 'Jenis Barang Bangunan', 'rules' => 'required'],
            ['field' => 'abb_apb_desa','label' => 'Asal Barang Bangunan APB Desa', 'rules' => 'required'],
            ['field' => 'bantuan_pemerintah','label' => 'Bantuan Pemerintah', 'rules' => 'required'],
            ['field' => 'bantuan_prov','label' => 'Bantuan Prov', 'rules' => 'required'],
            ['field' => 'bantuan_kab_kota','label' => 'Bantuan Kab Kota', 'rules' => 'required'],
            ['field' => 'abb_sumbangan','label' => 'Asal Barang Bangunan Sumbangan', 'rules' => 'required'],
            ['field' => 'awalthn_baik','label' => 'Awal Tahun Baik', 'rules' => 'required'],
            ['field' => 'awalthn_rusak','label' => 'Awal Tahun Rusak', 'rules' => 'required'],
            ['field' => 'hps_rusak','label' => 'Hapus Rusak', 'rules' => 'required'],
            ['field' => 'hps_dijual','label' => 'Hapus Dijual', 'rules' => 'required'],
            ['field' => 'hps_disumbangkan','label' => 'Hapus Disumbangkan', 'rules' => 'required'],
            ['field' => 'tgl_hapus','label' => 'Tanggal Hapus', 'rules' => 'required'],
            ['field' => 'akhirthn_baik','label' => 'Akhir Tahun Baik', 'rules' => 'required'],
            ['field' => 'akhirthn_rusak','label' => 'Akhir Tahun Rusak', 'rules' => 'required'],
            ['field' => 'ket','label' => 'Keterangan', 'rules' => 'required'],
        ];
    }

    function rulesUpdate() {
        return [
            ['field' => 'id','label' => 'id', 'rules' => 'required'],
            ['field' => 'jenis_brng_bangunan','label' => 'Jenis Barang Bangunan', 'rules' => 'required'],
            ['field' => 'abb_apb_desa','label' => 'Asal Barang Bangunan APB Desa', 'rules' => 'required'],
            ['field' => 'bantuan_pemerintah','label' => 'bantuan_pemerintah', 'rules' => 'required'],
            ['field' => 'bantuan_prov','label' => 'bantuan_prov', 'rules' => 'required'],
            ['field' => 'bantuan_kab_kota','label' => 'bantuan_kab_kota', 'rules' => 'required'],
            ['field' => 'abb_sumbangan','label' => 'Asal Barang Bangunan Sumbangan', 'rules' => 'required'],
            ['field' => 'awalthn_baik','label' => 'Awal Tahun Baik', 'rules' => 'required'],
            ['field' => 'awalthn_rusak','label' => 'Awal Tahun Rusak', 'rules' => 'required'],
            ['field' => 'hps_rusak','label' => 'Hapus Rusak', 'rules' => 'required'],
            ['field' => 'hps_dijual','label' => 'Hapus Dijual', 'rules' => 'required'],
            ['field' => 'hps_disumbangkan','label' => 'Hapus Disumbangkan', 'rules' => 'required'],
            ['field' => 'tgl_hapus','label' => 'Tanggal Hapus', 'rules' => 'required'],
            ['field' => 'akhirthn_baik','label' => 'Akhir Tahun Baik', 'rules' => 'required'],
            ['field' => 'akhirthn_rusak','label' => 'Akhir Tahun Rusak', 'rules' => 'required'],
            ['field' => 'ket','label' => 'Keterangan', 'rules' => 'required'],
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
                    'jenis_brng_bangunan' => $_POST['jenis_brng_bangunan'],
                    'abb_apb_desa' => $_POST['abb_apb_desa'],
                    'bantuan_pemerintah' => $_POST['bantuan_pemerintah'],
                    'bantuan_prov' => $_POST['bantuan_prov'],
                    'bantuan_kab_kota' => $_POST['bantuan_kab_kota'],
                    'abb_sumbangan' => $_POST['abb_sumbangan'],
                    'awalthn_baik' => $_POST['awalthn_baik'],
                    'awalthn_rusak' => $_POST['awalthn_rusak'],
                    'hps_rusak' => $_POST['hps_rusak'],
                    'hps_dijual' => $_POST['hps_dijual'],
                    'hps_disumbangkan' => $_POST['hps_disumbangkan'],
                    'tgl_hapus' => $_POST['tgl_hapus'],
                    'akhirthn_baik' => $_POST['akhirthn_baik'],
                    'akhirthn_rusak' => $_POST['akhirthn_rusak'],
                    'ket' => $_POST['ket'],
                    'berkas' => $berkas,
                    'verif_bpd' => "Pending",
                    'updated_at' => date('Y-m-d H:i:s'),
                    'updated_by' => $this->session->userdata('username'), 
      
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
                'jenis_brng_bangunan' => $_POST['jenis_brng_bangunan'],
                'abb_apb_desa' => $_POST['abb_apb_desa'],
                'bantuan_pemerintah' => $_POST['bantuan_pemerintah'],
                'bantuan_prov' => $_POST['bantuan_prov'],
                'bantuan_kab_kota' => $_POST['bantuan_kab_kota'],
                'abb_sumbangan' => $_POST['abb_sumbangan'],
                'awalthn_baik' => $_POST['awalthn_baik'],
                'awalthn_rusak' => $_POST['awalthn_rusak'],
                'hps_rusak' => $_POST['hps_rusak'],
                'hps_dijual' => $_POST['hps_dijual'],
                'hps_disumbangkan' => $_POST['hps_disumbangkan'],
                'tgl_hapus' => $_POST['tgl_hapus'],
                'akhirthn_baik' => $_POST['akhirthn_baik'],
                'akhirthn_rusak' => $_POST['akhirthn_rusak'],
                'ket' => $_POST['ket'],
                'berkas' => $berkas,
                'verif_bpd' => $_POST['verif_bpd'],
                'updated_by' => $this->session->userdata('username'), 
                'updated_at' => date('Y-m-d H:i:s'),
                
            );

            if($_POST['verif_bpd'] != $_POST['verif_bpd_old']){
                $data['verif_bpd_at'] = date('Y-m-d H:i:s');
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
                'verif_bpd' => "Disetujui",                             
                'updated_by' => $this->session->userdata('username'),
                'updated_at' => date('Y-m-d H:i:s'),
                'verif_bpd_at' => date('Y-m-d H:i:s'),
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
                'verif_bpd' => "Ditolak",                             
                'updated_by' => $this->session->userdata('username'),
                'updated_at' => date('Y-m-d H:i:s'),
                'verif_bpd_at' => date('Y-m-d H:i:s'),
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
        $config['upload_path']      = "./administrasilainnya/".$this->_folder."/"; //lokasi
        $config['allowed_types']    = 'pdf'; //file dizinkan
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

            if (!file_exists($b_id->berkas)){
                return true;
            }

            if (!unlink(FCPATH."administrasilainnya/".$this->_folder."/".$b_id->berkas)) {
                return false;
            }
            
        }
        return true;
    }

    public function cetak(){
        $data = $this->Main_m->get($this->_table,null)->result();
        $today = date('Y-m-d');
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $templateProcessor = $phpWord->loadTemplate('./assets/buku_adm_lain/'.$this->_docxName);
        $values = array();
        $no = 1;
        foreach($data as $d){
            $subvalues = array(
                'no' => $no++,
                'jenis_brng_bangunan' => $d->jenis_brng_bangunan,
                'abb_apb_desa' => $d->abb_apb_desa,
                'bantuan_pemerintah' => $d->bantuan_pemerintah,
                'bantuan_prov' => $d->bantuan_prov,
                'bantuan_kab_kota' => $d->bantuan_kab_kota,
                'abb_sumbangan'=> $d->abb_sumbangan,
                'awalthn_baik' => $d->awalthn_baik,
                'awalthn_rusak' => $d->awalthn_rusak,
                'hps_rusak' => $d->hps_rusak,
                'hps_dijual' => $d->hps_dijual,
                'hps_disumbangkan' => $d->hps_disumbangkan,
                'tgl_hapus'=> $d->tgl_hapus,
                'akhirthn_baik' => $d->akhirthn_baik,
                'akhirthn_rusak' => $d->akhirthn_rusak,
                'ket'=> $d->ket
            );
            $values[] = $subvalues;
        }
        $templateProcessor->cloneRowAndSetValues('no', $values);
        $temp_filename = $this->_docxName;
        $templateProcessor->saveAs($temp_filename);
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
?>