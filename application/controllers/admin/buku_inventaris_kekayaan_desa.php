<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_inventaris_kekayaan_desa extends Admin_Controller {

    private $_table = 'buku_inventaris_kekayaan_desa';
    private $_folder = 'buku_inventaris_kekayaan_desa';
    private $_mainTitle = 'Buku Inventaris Dan Kekayaan Desa';

    function __construct() {
        parent::__construct();
        $this->load->model('Main_m');
        $this->load->library('breadcrumbcomponent');
        
    }

    function rulesStore() {
        return [
            ['field' => 'jenis_brng_bangunan','label' => 'Jenis Barang atau Bangunan', 'rules' => 'required'],
            ['field' => 'abb_dibeli_sendiri','label' => 'Asal Barang atau Bangunan', 'rules' => 'required'],
            ['field' => 'bantuan_pemeritah','label' => 'Asal Barang atau Bangunan', 'rules' => 'required'],
            ['field' => 'bantuan_prov','label' => 'Asal Barang atau Bangunan', 'rules' => 'required'],
            ['field' => 'bantuan_kab_kota','label' => 'Asal Barang atau Bangunan', 'rules' => 'required'],
            ['field' => 'abb_sumbangan','label' => 'Asal Barang atau Bangunan', 'rules' => 'required'],
            ['field' => 'baik_awalthn','label' => 'Keadaan Barang atau Bangunan Awal Tahun', 'rules' => 'required'],
            ['field' => 'rusak_awalthn','label' => 'Keadaan Barang atau Bangunan Awal Tahun', 'rules' => 'required'],
            ['field' => 'rusak_hps','label' => 'Penghapusan Barang dan Bangunan', 'rules' => 'required'],
            ['field' => 'dijual_hps','label' => 'Penghapusan Barang dan Bangunan', 'rules' => 'required'],
            ['field' => 'disumbangkan_hps','label' => 'Penghapusan Barang dan Bangunan', 'rules' => 'required'],
            ['field' => 'tgl_hapus','label' => 'Penghapusan Barang dan Bangunan', 'rules' => 'required'],
            ['field' => 'baik_akhirthn','label' => 'Keadaan Barang atau Bangunan Akhir Tahun', 'rules' => 'required'],
            ['field' => 'rusak_akhirthn','label' => 'Keadaan Barang atau Bangunan Akhir Tahun', 'rules' => 'required'],
            ['field' => 'ket','label' => 'ket', 'rules' => 'required'],
        ];
    }

    function rulesUpdate() {
        return [
            ['field' => 'jenis_brng_bangunan','label' => 'Jenis Barang Bangunan', 'rules' => 'required'],
            ['field' => 'abb_dibeli_sendiri','label' => 'Abb Dibeli Sendiri', 'rules' => 'required'],
            ['field' => 'bantuan_pemeritah','label' => 'Bantuan Pemerintah Singkat', 'rules' => 'required'],
            ['field' => 'bantuan_prov','label' => 'Bantuan Prov', 'rules' => 'required'],
            ['field' => 'bantuan_kab_kota','label' => 'Bantuan Kab Kota', 'rules' => 'required'],
            ['field' => 'abb_sumbangan','label' => 'Abb Sumbangan', 'rules' => 'required'],
            ['field' => 'baik_awalthn','label' => 'Baik Awalthn', 'rules' => 'required'],
            ['field' => 'rusak_awalthn','label' => 'Rusak Awalthn', 'rules' => 'required'],
            ['field' => 'rusak_hps','label' => 'Rusak Hps', 'rules' => 'required'],
            ['field' => 'dijual_hps','label' => 'Dijual Hps', 'rules' => 'required'],
            ['field' => 'disumbangkan_hps','label' => 'Disumbangkan Hps', 'rules' => 'required'],
            ['field' => 'tgl_hapus','label' => 'Tgl Hapus', 'rules' => 'required'],
            ['field' => 'baik_akhirthn','label' => 'Baik Akhirthn', 'rules' => 'required'],
            ['field' => 'rusak_akhirthn','label' => 'Rusak Akhirthn', 'rules' => 'required'],
            ['field' => 'ket','label' => 'ket', 'rules' => 'required'],
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
                    echo $this->upload->display_errors();
                    $callback = array(
                        'status' => 'error',
                        'message' => 'Mohon Maaf, file gagal diupload',
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
                    'abb_dibeli_sendiri' => $_POST['abb_dibeli_sendiri'],
                    'bantuan_pemeritah' => $_POST['bantuan_pemeritah'],
                    'bantuan_prov' => $_POST['bantuan_prov'],
                    'bantuan_kab_kota' => $_POST['bantuan_kab_kota'],
                    'abb_sumbangan' => $_POST['abb_sumbangan'],
                    'baik_awalthn' => $_POST['baik_awalthn'],
                    'rusak_awalthn' => $_POST['rusak_awalthn'],
                    'rusak_hps' => $_POST['rusak_hps'],
                    'dijual_hps' => $_POST['dijual_hps'],
                    'disumbangkan_hps' => $_POST['disumbangkan_hps'],
                    'tgl_hapus' => $_POST['tgl_hapus'],
                    'baik_akhirthn' => $_POST['baik_akhirthn'],
                    'rusak_akhirthn' => $_POST['rusak_akhirthn'],
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
                $berkas_lama = $this->destroy_file($where);
            }

            //jika tidak ada file baru
            else {
                $berkas = $_POST["old_file"];
            }

            $data = array(
                'jenis_brng_bangunan' => $_POST['jenis_brng_bangunan'],
                'abb_dibeli_sendiri' => $_POST['abb_dibeli_sendiri'],
                'bantuan_pemeritah' => $_POST['bantuan_pemeritah'],
                'bantuan_prov' => $_POST['bantuan_prov'],
                'bantuan_kab_kota' => $_POST['bantuan_kab_kota'],
                'abb_sumbangan' => $_POST['abb_sumbangan'],
                'baik_awalthn' => $_POST['baik_awalthn'],
                'rusak_awalthn' => $_POST['rusak_awalthn'],
                'rusak_hps' => $_POST['rusak_hps'],
                'dijual_hps' => $_POST['dijual_hps'],
                'disumbangkan_hps' => $_POST['disumbangkan_hps'],
                'tgl_hapus' => $_POST['tgl_hapus'],
                'baik_akhirthn' => $_POST['baik_akhirthn'],
                'rusak_akhirthn' => $_POST['rusak_akhirthn'],
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
            echo $this->upload->display_errors();
        }    
    }

    private function destroy_file($id) {
        $berkas_id =  $this->Main_m->get($this->_table,$id)->result();  
        foreach ($berkas_id as $b_id) {
            
            if(empty($b_id->berkas)){
                return true;
            }

            if (!unlink(FCPATH."uploads/".$this->_folder."/".$b_id->berkas)) {
                return false;
            }
            
        }
        return true;
    }
}
?>