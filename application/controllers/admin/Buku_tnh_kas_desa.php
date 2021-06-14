<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_tnh_kas_desa extends Admin_Controller {

    private $_table = 'buku_tnh_kas_desa';
    private $_folder = 'buku_tnh_kas_desa';
    private $_mainTitle = 'Buku Tanah Kas Desa';

    function __construct() {
        parent::__construct();
        $this->load->model('Main_m');
        $this->load->library('breadcrumbcomponent');
        
    }

    function rulesStore() {
        return [
            ['field' => 'asal_tnh_kas','label' => 'asal_tnh_kas', 'rules' => 'required'],
            ['field' => 'no_serti_letterc_persil','label' => 'no_serti_letterc_persil', 'rules' => 'required'],
            ['field' => 'luas','label' => 'luas', 'rules' => 'required'],
            ['field' => 'kelas','label' => 'kelas', 'rules' => 'required'],
            ['field' => 'peroleh_asli_milik_desa','label' => 'peroleh_asli_milik_desa', 'rules' => 'required'],
            ['field' => 'bantuan_pem','label' => 'bantuan_pem', 'rules' => 'required'],
            ['field' => 'bantuan_prov','label' => 'bantuan_prov', 'rules' => 'required'],
            ['field' => 'bantuan_kab_kota','label' => 'bantuan_kab_kota', 'rules' => 'required'],
            ['field' => 'peroleh_lain','label' => 'peroleh_lain', 'rules' => 'required'],
            ['field' => 'tgl_peroleh','label' => 'tgl_peroleh', 'rules' => 'required'],
            ['field' => 'jenis_sawah','label' => 'jenis_sawah', 'rules' => 'required'],
            ['field' => 'jenis_tegal','label' => 'jenis_tegal', 'rules' => 'required'],
            ['field' => 'jenis_kebun','label' => 'jenis_kebun', 'rules' => 'required'],
            ['field' => 'jenis_tambak','label' => 'jenis_tambak', 'rules' => 'required'],
            ['field' => 'jenis_darat','label' => 'jenis_darat', 'rules' => 'required'],
            ['field' => 'patok_ada','label' => 'patok_ada', 'rules' => 'required'],
            ['field' => 'patok_tdkada','label' => 'patok_tdkada', 'rules' => 'required'],
            ['field' => 'papan_ada','label' => 'papan_ada', 'rules' => 'required'],
            ['field' => 'papan_tdkada','label' => 'papan_tdkada', 'rules' => 'required'],
            ['field' => 'lokasi','label' => 'lokasi', 'rules' => 'required'],
            ['field' => 'peruntukkan','label' => 'peruntukkan', 'rules' => 'required'],
            ['field' => 'ket','label' => 'ket', 'rules' => 'required'],
        ];
    }

    function rulesUpdate() {
        return [
            ['field' => 'asal_tnh_kas','label' => 'asal_tnh_kas', 'rules' => 'required'],
            ['field' => 'no_serti_letterc_persil','label' => 'no_serti_letterc_persil', 'rules' => 'required'],
            ['field' => 'luas','label' => 'luas', 'rules' => 'required'],
            ['field' => 'kelas','label' => 'kelas', 'rules' => 'required'],
            ['field' => 'peroleh_asli_milik_desa','label' => 'peroleh_asli_milik_desa', 'rules' => 'required'],
            ['field' => 'bantuan_pem','label' => 'bantuan_pem', 'rules' => 'required'],
            ['field' => 'bantuan_prov','label' => 'bantuan_prov', 'rules' => 'required'],
            ['field' => 'bantuan_kab_kota','label' => 'bantuan_kab_kota', 'rules' => 'required'],
            ['field' => 'peroleh_lain','label' => 'peroleh_lain', 'rules' => 'required'],
            ['field' => 'tgl_peroleh','label' => 'tgl_peroleh', 'rules' => 'required'],
            ['field' => 'jenis_sawah','label' => 'jenis_sawah', 'rules' => 'required'],
            ['field' => 'jenis_tegal','label' => 'jenis_tegal', 'rules' => 'required'],
            ['field' => 'jenis_kebun','label' => 'jenis_kebun', 'rules' => 'required'],
            ['field' => 'jenis_tambak','label' => 'jenis_tambak', 'rules' => 'required'],
            ['field' => 'jenis_darat','label' => 'jenis_darat', 'rules' => 'required'],
            ['field' => 'patok_ada','label' => 'patok_ada', 'rules' => 'required'],
            ['field' => 'patok_tdkada','label' => 'patok_tdkada', 'rules' => 'required'],
            ['field' => 'papan_ada','label' => 'papan_ada', 'rules' => 'required'],
            ['field' => 'papan_tdkada','label' => 'papan_tdkada', 'rules' => 'required'],
            ['field' => 'lokasi','label' => 'lokasi', 'rules' => 'required'],
            ['field' => 'peruntukkan','label' => 'peruntukkan', 'rules' => 'required'],
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
                    'asal_tnh_kas' => $_POST['asal_tnh_kas'],
                    'no_serti_letterc_persil' => $_POST['no_serti_letterc_persil'],
                    'luas' => $_POST['luas'],
                    'kelas' => $_POST['kelas'],
                    'peroleh_asli_milik_desa' => $_POST['peroleh_asli_milik_desa'],
                    'bantuan_pem' => $_POST['bantuan_pem'],
                    'bantuan_prov' => $_POST['bantuan_prov'],
                    'bantuan_kab_kota' => $_POST['bantuan_kab_kota'],
                    'peroleh_lain' => $_POST['peroleh_lain'],
                    'tgl_peroleh' => $_POST['tgl_peroleh'],
                    'jenis_sawah' => $_POST['jenis_sawah'],
                    'jenis_tegal' => $_POST['jenis_tegal'],
                    'jenis_kebun' => $_POST['jenis_kebun'],
                    'jenis_tambak' => $_POST['jenis_tambak'],
                    'jenis_darat' => $_POST['jenis_darat'],
                    'patok_ada' => $_POST['patok_ada'],
                    'patok_tdkada' => $_POST['patok_tdkada'],
                    'papan_ada' => $_POST['papan_ada'],
                    'papan_tdkada' => $_POST['papan_tdkada'],
                    'lokasi' => $_POST['lokasi'],
                    'peruntukkan' => $_POST['peruntukkan'],
                    'mutasi' => $_POST['mutasi'],
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
                'asal_tnh_kas' => $_POST['asal_tnh_kas'],
                'no_serti_letterc_persil' => $_POST['no_serti_letterc_persil'],
                'luas' => $_POST['luas'],
                'kelas' => $_POST['kelas'],
                'peroleh_asli_milik_desa' => $_POST['peroleh_asli_milik_desa'],
                'bantuan_pem' => $_POST['bantuan_pem'],
                'bantuan_prov' => $_POST['bantuan_prov'],
                'bantuan_kab_kota' => $_POST['bantuan_kab_kota'],
                'peroleh_lain' => $_POST['peroleh_lain'],
                'tgl_peroleh' => $_POST['tgl_peroleh'],
                'jenis_sawah' => $_POST['jenis_sawah'],
                'jenis_tegal' => $_POST['jenis_tegal'],
                'jenis_kebun' => $_POST['jenis_kebun'],
                'jenis_tambak' => $_POST['jenis_tambak'],
                'jenis_darat' => $_POST['jenis_darat'],
                'patok_ada' => $_POST['patok_ada'],
                'patok_tdkada' => $_POST['patok_tdkada'],
                'papan_ada' => $_POST['papan_ada'],
                'papan_tdkada' => $_POST['papan_tdkada'],
                'lokasi' => $_POST['lokasi'],
                'peruntukkan' => $_POST['peruntukkan'],
                'mutasi' => $_POST['mutasi'],
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